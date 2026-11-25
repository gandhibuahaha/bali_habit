<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Progress Anak and Belajar Bersama pages for the child the parent picked.
 *
 * The picked child comes from ?anak=<id>; it is remembered in the session so
 * pages that link back without an id (e.g. the story pages) keep the same child.
 * Stars are not counted yet: the rule for earning them is still open.
 */
class ChildProgressController extends Controller
{
    private const SESSION_KEY = 'active_child_id';

    private const STORY_SESSION_KEY = 'active_story';

    /**
     * The 4 demo stories the story pages know (same slugs and titles as
     * public/assets/js/halaman_baca.js). Replace with the stories table once
     * Story Management fills it.
     */
    private const STORY_TITLES = [
        'kedis-puuh' => 'I Alu Teken I Kedis Puuh',
        'lutung-kekua' => 'I Lutung teken I Kekua',
        'lelipi-selem' => 'Lelipi Selem Bukit',
        'lutung-pecalang' => 'I Lutung Dadi Pecalang',
    ];

    public function progress(Request $request): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $id = $child->child_id;
        $periods = [
            'hari-ini' => Carbon::today(),
            'minggu-ini' => Carbon::now()->startOfWeek(),
            'keseluruhan' => null,
        ];

        $summary = [];
        foreach ($periods as $period => $since) {
            $summary[$period] = [
                'cerita' => $this->countCompleted('story_progress', $id, $since),
                'misi' => $this->countCompleted('mission_attempts', $id, $since),
                'bintang' => 0,
            ];
        }

        $earnedBadgeIds = DB::table('child_badges')->where('child_id', $id)->pluck('badge_id')->flip();
        $badges = DB::table('badges')
            ->orderBy('minimum_stars')
            ->get()
            ->map(function ($badge) use ($earnedBadgeIds) {
                $badge->earned = $earnedBadgeIds->has($badge->badge_id);

                return $badge;
            });

        return view('user.progress_anak', compact('child', 'summary', 'badges'));
    }

    public function learn(Request $request): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $id = $child->child_id;

        $reflectionsTotal = DB::table('reflections')->groupBy('story_id')->selectRaw('story_id, COUNT(*) AS total')->pluck('total', 'story_id');
        $missionsTotal = DB::table('missions')->groupBy('story_id')->selectRaw('story_id, COUNT(*) AS total')->pluck('total', 'story_id');

        $reflectionsDone = $this->answeredInLatestAttempt('reflection_attempts', 'reflection_attempt_id', 'reflection_answers', $id);
        $missionsDone = $this->answeredInLatestAttempt('mission_attempts', 'mission_attempt_id', 'mission_answers', $id, onlyDone: true);

        $lastRead = DB::table('story_progress')->where('child_id', $id)->pluck('updated_at', 'story_id');

        $storyIds = $reflectionsTotal->keys()->merge($missionsTotal->keys())->merge($lastRead->keys())->unique();
        $storyProgress = $storyIds->mapWithKeys(fn ($storyId) => [$storyId => [
            'reflections_done' => (int) $reflectionsDone->get($storyId, 0),
            'reflections_total' => (int) $reflectionsTotal->get($storyId, 0),
            'missions_done' => (int) $missionsDone->get($storyId, 0),
            'missions_total' => (int) $missionsTotal->get($storyId, 0),
            'last_read' => $lastRead->has($storyId) ? Carbon::parse($lastRead->get($storyId)) : null,
        ]]);

        $noProgress = ['reflections_done' => 0, 'reflections_total' => 0, 'missions_done' => 0, 'missions_total' => 0, 'last_read' => null];

        return view('user.belajar_bersama', compact('child', 'storyProgress', 'noProgress'));
    }

    /**
     * Story pages (Halaman Baca, Refleksi, Misi, Rekap Cerita) for the picked child.
     * Opening a story (?cerita=<slug>) remembers it for the following pages.
     * Nothing is saved yet: that waits for the stories to exist in the database.
     */
    public function storyPage(Request $request, string $page): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $slug = $request->query('cerita');
        if (is_string($slug) && isset(self::STORY_TITLES[$slug])) {
            session([self::STORY_SESSION_KEY => $slug]);
        }

        $storyTitle = self::STORY_TITLES[session(self::STORY_SESSION_KEY)] ?? null;

        return view($page, compact('child', 'storyTitle'));
    }

    /**
     * The picked child of the logged-in parent, or a redirect to the child list.
     * An explicit ?anak=<id> that is not the parent's own child gives 404.
     */
    private function activeChild(Request $request): Child|RedirectResponse
    {
        $ownChildren = Child::where('parent_id', $request->user()->user_id);

        if ($request->filled('anak')) {
            $child = $ownChildren->findOrFail((int) $request->query('anak'));
        } else {
            $child = $ownChildren->find(session(self::SESSION_KEY));
        }

        if (! $child) {
            session()->forget(self::SESSION_KEY);

            return redirect()->route('children.index');
        }

        session([self::SESSION_KEY => $child->child_id]);

        return $child;
    }

    private function countCompleted(string $table, int $childId, ?Carbon $since): int
    {
        return DB::table($table)
            ->where('child_id', $childId)
            ->where('status', 'completed')
            ->when($since, fn ($query) => $query->where('completed_at', '>=', $since))
            ->count();
    }

    /**
     * Per story: how many answers the child gave in their latest attempt.
     * With $onlyDone, only answers marked done (answer = 1) count.
     *
     * @return Collection<string, int> keyed by story_id
     */
    private function answeredInLatestAttempt(string $attemptsTable, string $attemptKey, string $answersTable, int $childId, bool $onlyDone = false): Collection
    {
        $latestAttempts = DB::table($attemptsTable)
            ->where('child_id', $childId)
            ->orderByDesc('attempt_number')
            ->get(['story_id', $attemptKey])
            ->unique('story_id');

        $answered = DB::table($answersTable)
            ->whereIn($attemptKey, $latestAttempts->pluck($attemptKey))
            ->when($onlyDone, fn ($query) => $query->where('answer', true))
            ->groupBy($attemptKey)
            ->selectRaw("{$attemptKey}, COUNT(*) AS done")
            ->pluck('done', $attemptKey);

        return $latestAttempts->mapWithKeys(fn ($attempt) => [
            $attempt->story_id => (int) $answered->get($attempt->{$attemptKey}, 0),
        ]);
    }
}
