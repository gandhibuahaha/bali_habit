<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Carbon\CarbonInterface;
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

    /** Stars for one mission marked "Sudah". Every mission gives the same amount. */
    public const STARS_PER_MISSION = 2;

    /**
     * Stars earned per child: [child_id => stars]. Children without stars are left out.
     *
     * Star rule (the one place it lives; always reuse it):
     * - Stars come only from missions. Reflections give none.
     * - Each mission marked "Sudah" gives STARS_PER_MISSION stars, so the most a story
     *   can give is STARS_PER_MISSION x the number of missions the admin added to it.
     * - Per story, only the child's best finished try counts. A better try adds just
     *   the difference, a worse try takes nothing away, and a try that was never
     *   finished is ignored.
     * Stars are counted from the saved answers each time, never stored.
     *
     * With $before, only tries finished before that moment count: the stars the child
     * had then. "Stars gained today" = starTotals(...) - starTotals(..., start of today).
     *
     * @param  iterable<int>  $childIds
     * @return array<int, int>
     */
    public static function starTotals(iterable $childIds, ?CarbonInterface $before = null): array
    {
        return array_filter(array_map(
            fn (array $perStory) => array_sum($perStory) * self::STARS_PER_MISSION,
            self::bestMissionsDone($childIds, $before)
        ));
    }

    /**
     * Per child and story: the most missions marked "Sudah" in one finished try,
     * [child_id => [story_id => count]]. Stories with no "Sudah" are left out.
     * With $before, only tries finished before that moment count.
     *
     * @param  iterable<int>  $childIds
     * @return array<int, array<string, int>>
     */
    public static function bestMissionsDone(iterable $childIds, ?CarbonInterface $before = null): array
    {
        $childIds = collect($childIds)->values();
        if ($childIds->isEmpty()) {
            return [];
        }

        $donePerTry = self::finishedMissionTries()
            ->whereIn('a.child_id', $childIds)
            ->when($before, fn ($query) => $query->where('a.completed_at', '<', $before));

        $best = [];
        foreach (DB::query()->fromSub($donePerTry, 't')->groupBy('child_id', 'story_id')->selectRaw('child_id, story_id, MAX(done) AS best')->get() as $row) {
            $best[$row->child_id][$row->story_id] = (int) $row->best;
        }

        return $best;
    }

    /**
     * Finished mission tries with their "Sudah" count, one row each:
     * child_id, story_id, mission_attempt_id, attempt_number, done.
     * Tries with no "Sudah" at all are left out (they are worth 0 stars).
     * The base of the star rule: bestMissionsDone() and Rekap Cerita both build on it.
     */
    public static function finishedMissionTries(): Builder
    {
        return DB::table('mission_attempts as a')
            ->join('mission_answers as ans', 'ans.mission_attempt_id', '=', 'a.mission_attempt_id')
            ->where('a.status', 'completed')
            ->where('ans.answer', true)
            ->groupBy('a.mission_attempt_id', 'a.child_id', 'a.story_id', 'a.attempt_number')
            ->selectRaw('a.child_id, a.story_id, a.mission_attempt_id, a.attempt_number, COUNT(*) AS done');
    }

    /**
     * What each child did in the reflections and missions:
     * [child_id => ['refleksi_dijawab' => int, 'refleksi_benar' => int, 'misi_sudah' => int, 'bintang' => int]].
     * - Reflections: answered and correct in the latest finished try per story (shown only, no stars).
     * - Missions and stars: from the best finished try per story (the star rule above).
     * Children with nothing done are left out.
     *
     * @param  iterable<int>  $childIds
     * @return array<int, array{refleksi_dijawab: int, refleksi_benar: int, misi_sudah: int, bintang: int}>
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

        $empty = ['refleksi_dijawab' => 0, 'refleksi_benar' => 0, 'misi_sudah' => 0, 'bintang' => 0];
        $totals = [];
        foreach ($reflections as $row) {
            $totals[$row->child_id] = ['refleksi_dijawab' => (int) $row->answered, 'refleksi_benar' => (int) $row->correct] + $empty;
        }
        foreach (self::bestMissionsDone($childIds) as $childId => $perStory) {
            $done = array_sum($perStory);
            $totals[$childId] = ['misi_sudah' => $done, 'bintang' => $done * self::STARS_PER_MISSION] + ($totals[$childId] ?? $empty);
        }

        return $totals;
    }
}
