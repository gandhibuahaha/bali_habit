<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Admin activity log: what parents and children did, newest first, built from the
 * existing tables (no separate log table, D-12). Used by the admin Beranda ("Aktivitas
 * Pengguna Terbaru") and the "Aktivitas Pengguna" tab. Kid-profile edits show only
 * the latest edit per kid (D-30).
 *
 * Children deleted by their parent (Nonaktif) still show their past events.
 */
class ActivityLog
{
    private const PARENT = 'Orang Tua';

    private const CHILD = 'Anak';

    /** Avatar colours per role (classes from the original design). */
    private const COLORS = [
        self::PARENT => 'bg-emerald-50 text-[#10B981] border-emerald-100',
        self::CHILD => 'bg-amber-50 text-amber-600 border-amber-100',
    ];

    /**
     * The newest $limit events.
     *
     * @return Collection<int, array{name: string, role: string, initial: string, photo: ?string, action: string, time: string, colorClass: string}>
     */
    public static function latest(int $limit): Collection
    {
        // Each query returns: role, name, the event text pieces and its time.
        // Every one is limited to $limit, so merging them and keeping the newest
        // $limit gives exactly the newest $limit events overall.
        $queries = [
            // Parent registered.
            DB::table('users')->where('role', 'parent')
                ->select(['name', 'profile_picture as photo', 'created_at as time'])
                ->selectRaw("'register' as type, NULL as subject, NULL as done, NULL as total"),

            // Parent added a child.
            DB::table('children')->join('users', 'users.user_id', '=', 'children.parent_id')
                ->select(['users.name', 'users.profile_picture as photo', 'children.created_at as time', 'children.name as subject'])
                ->selectRaw("'child_added' as type, NULL as done, NULL as total"),

            // Parent deleted a child (the child is now Nonaktif).
            DB::table('children')->join('users', 'users.user_id', '=', 'children.parent_id')
                ->whereNotNull('children.deleted_at')
                ->select(['users.name', 'users.profile_picture as photo', 'children.deleted_at as time', 'children.name as subject'])
                ->selectRaw("'child_deleted' as type, NULL as done, NULL as total"),

            // Parent edited a child's profile (name, birth date, gender or photo), D-30.
            // Only the LATEST edit per child is known: children.updated_at. A delete also
            // sets updated_at (= deleted_at), so that case is left out here.
            DB::table('children')->join('users', 'users.user_id', '=', 'children.parent_id')
                ->whereColumn('children.updated_at', '>', 'children.created_at')
                ->where(fn (Builder $q) => $q->whereNull('children.deleted_at')
                    ->orWhereColumn('children.updated_at', '!=', 'children.deleted_at'))
                ->select(['users.name', 'users.profile_picture as photo', 'children.updated_at as time', 'children.name as subject'])
                ->selectRaw("'child_edited' as type, NULL as done, NULL as total"),

            // Child started / finished reading a story.
            self::storyQuery('started_at', 'story_started'),
            self::storyQuery('completed_at', 'story_completed')->whereNotNull('story_progress.completed_at'),

            // Child finished the missions of a story: "Sudah" answers / all answers.
            self::attemptQuery('mission_attempts', 'mission_attempt_id', 'mission', DB::table('mission_answers as ans')
                ->whereColumn('ans.mission_attempt_id', 'a.mission_attempt_id')
                ->selectRaw('COALESCE(SUM(ans.answer = 1), 0)')),

            // Child answered the reflection of a story: correct answers / all answers.
            self::attemptQuery('reflection_attempts', 'reflection_attempt_id', 'reflection', DB::table('reflection_answers as ans')
                ->join('reflections as r', 'r.reflection_id', '=', 'ans.reflection_id')
                ->whereColumn('ans.reflection_attempt_id', 'a.reflection_attempt_id')
                ->selectRaw('COALESCE(SUM(ans.answer = r.answer), 0)')),

            // Child earned a badge.
            DB::table('child_badges')
                ->join('children', 'children.child_id', '=', 'child_badges.child_id')
                ->join('badges', 'badges.badge_id', '=', 'child_badges.badge_id')
                ->select(['children.name', 'children.profile_picture as photo', 'child_badges.earned_at as time', 'badges.name as subject'])
                ->selectRaw("'badge' as type, NULL as done, NULL as total"),
        ];

        return collect($queries)
            ->flatMap(fn (Builder $query) => $query->orderByDesc('time')->limit($limit)->get())
            ->sortByDesc('time')
            ->take($limit)
            ->map(function (object $event) {
                $role = in_array($event->type, ['register', 'child_added', 'child_edited', 'child_deleted'], true) ? self::PARENT : self::CHILD;

                return [
                    'name' => $event->name,
                    'role' => $role,
                    'initial' => User::initialsOf($event->name),
                    // Profile photo of the person (parent or child), or null: the page shows the initial.
                    'photo' => $event->photo ? asset('storage/'.$event->photo) : null,
                    'action' => self::describe($event),
                    'time' => self::timeLabel(Carbon::parse($event->time)),
                    'colorClass' => self::COLORS[$role],
                ];
            })
            ->values();
    }

    /**
     * "Kemarin" for yesterday, otherwise e.g. "2 jam yang lalu".
     * Shared with the parent dashboard's "Aktivitas Terbaru".
     */
    public static function timeLabel(Carbon $time): string
    {
        return $time->isYesterday() ? 'Kemarin' : $time->locale('id')->diffForHumans();
    }

    private static function storyQuery(string $timeColumn, string $type): Builder
    {
        return DB::table('story_progress')
            ->join('children', 'children.child_id', '=', 'story_progress.child_id')
            ->leftJoin('stories', 'stories.story_id', '=', 'story_progress.story_id')
            ->select(['children.name', 'children.profile_picture as photo', "story_progress.{$timeColumn} as time"])
            ->selectRaw("COALESCE(stories.title, story_progress.story_id) as subject, '{$type}' as type, NULL as done, NULL as total");
    }

    private static function attemptQuery(string $attempts, string $key, string $type, Builder $doneCount): Builder
    {
        $answers = $type === 'mission' ? 'mission_answers' : 'reflection_answers';

        return DB::table("{$attempts} as a")
            ->join('children', 'children.child_id', '=', 'a.child_id')
            ->leftJoin('stories', 'stories.story_id', '=', 'a.story_id')
            ->where('a.status', 'completed')
            ->select(['children.name', 'children.profile_picture as photo', 'a.completed_at as time'])
            ->selectRaw("COALESCE(stories.title, a.story_id) as subject, '{$type}' as type")
            ->selectSub($doneCount, 'done')
            ->selectSub(DB::table("{$answers} as t")->whereColumn("t.{$key}", "a.{$key}")->selectRaw('COUNT(*)'), 'total');
    }

    private static function describe(object $event): string
    {
        $subject = $event->subject;

        return match ($event->type) {
            'register' => 'Mendaftar akun BaliHabit.',
            'child_added' => "Menambahkan profil anak '{$subject}'.",
            'child_edited' => "Mengubah profil anak '{$subject}'.",
            'child_deleted' => "Menghapus profil anak '{$subject}'.",
            'story_started' => "Mulai membaca cerita '{$subject}'.",
            'story_completed' => "Selesai membaca cerita '{$subject}'.",
            'mission' => "Menyelesaikan misi cerita '{$subject}' ({$event->done}/{$event->total} Sudah).",
            'reflection' => "Menjawab refleksi cerita '{$subject}' ({$event->done}/{$event->total} tepat).",
            'badge' => "Mendapatkan lencana '{$subject}'.",
        };
    }
}
