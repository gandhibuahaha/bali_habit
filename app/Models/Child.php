<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * A child profile owned by a parent account.
 * parent_id is not fillable: it is always set from the logged-in parent.
 * Deleting only marks deleted_at (soft delete): parent pages no longer see the
 * child, the admin still sees it as "Nonaktif" with all its progress.
 */
#[Fillable(['name', 'birth_date', 'gender', 'profile_picture'])]
class Child extends Model
{
    use SoftDeletes;

    protected $table = 'children';

    protected $primaryKey = 'child_id';

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id', 'user_id');
    }

    /**
     * Name for use inside a sentence ("Hebat, {short_name}!"): at most 20 letters,
     * then "…", so a very long name doesn't stretch the sentence over many lines.
     */
    protected function shortName(): Attribute
    {
        return Attribute::get(fn () => Str::limit((string) $this->name, 20, '…'));
    }

    /**
     * Stars earned per child: [child_id => stars]. Children without stars are left out.
     *
     * Rule (from the story flow):
     * - Refleksi: 1 star per correct answer (the child's answer equals reflections.answer).
     * - Misi: 1 star per mission marked "Sudah". The demo page gives missions their own
     *   values, but the missions table has no stars column yet.
     *
     * @param  iterable<int>  $childIds
     * @return array<int, int>
     */
    public static function starTotals(iterable $childIds): array
    {
        return array_filter(array_map(
            fn (array $totals) => $totals['refleksi_benar'] + $totals['misi_sudah'],
            self::learningTotals($childIds)
        ));
    }

    /**
     * What each child did in the reflections and missions:
     * [child_id => ['refleksi_dijawab' => int, 'refleksi_benar' => int, 'misi_sudah' => int]].
     * Only the latest completed attempt per child + story counts, so redoing a story
     * does not count twice. Children with nothing done are left out.
     *
     * @param  iterable<int>  $childIds
     * @return array<int, array{refleksi_dijawab: int, refleksi_benar: int, misi_sudah: int}>
     */
    public static function learningTotals(iterable $childIds): array
    {
        $childIds = collect($childIds)->values();
        if ($childIds->isEmpty()) {
            return [];
        }

        $latestCompleted = fn (string $attempts) => fn ($q) => $q
            ->selectRaw('MAX(latest.attempt_number)')
            ->from("{$attempts} as latest")
            ->whereColumn('latest.child_id', 'a.child_id')
            ->whereColumn('latest.story_id', 'a.story_id')
            ->where('latest.status', 'completed');

        $reflections = DB::table('reflection_answers as ans')
            ->join('reflection_attempts as a', 'a.reflection_attempt_id', '=', 'ans.reflection_attempt_id')
            ->join('reflections as r', 'r.reflection_id', '=', 'ans.reflection_id')
            ->whereIn('a.child_id', $childIds)
            ->where('a.status', 'completed')
            ->where('a.attempt_number', $latestCompleted('reflection_attempts'))
            ->groupBy('a.child_id')
            ->selectRaw('a.child_id, COUNT(*) AS answered, SUM(ans.answer = r.answer) AS correct')
            ->get();

        $missions = DB::table('mission_answers as ans')
            ->join('mission_attempts as a', 'a.mission_attempt_id', '=', 'ans.mission_attempt_id')
            ->whereIn('a.child_id', $childIds)
            ->where('a.status', 'completed')
            ->where('a.attempt_number', $latestCompleted('mission_attempts'))
            ->where('ans.answer', true)
            ->groupBy('a.child_id')
            ->selectRaw('a.child_id, COUNT(*) AS done')
            ->pluck('done', 'child_id');

        $empty = ['refleksi_dijawab' => 0, 'refleksi_benar' => 0, 'misi_sudah' => 0];
        $totals = [];
        foreach ($reflections as $row) {
            $totals[$row->child_id] = ['refleksi_dijawab' => (int) $row->answered, 'refleksi_benar' => (int) $row->correct] + $empty;
        }
        foreach ($missions as $childId => $done) {
            $totals[$childId] = ['misi_sudah' => (int) $done] + ($totals[$childId] ?? $empty);
        }

        return $totals;
    }
}
