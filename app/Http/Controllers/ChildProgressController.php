<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Story;
use App\Support\ActivityLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Progress Anak and Belajar Bersama pages for the child the parent picked.
 *
 * The picked child comes from ?anak=<id>; it is remembered in the session so
 * pages that link back without an id (e.g. the story pages) keep the same child.
 * Story pages (D-31): a story is picked on Halaman Baca (?cerita=<story_id>, from
 * Belajar Bersama) and then the pages open only in order: Baca -> Refleksi -> Misi ->
 * Rekap (a "story run" in the session). Anything else goes back to Belajar Bersama with
 * a "Pilih Cerita Dulu" popup. Baca counts reads (finishReading()), Refleksi and Misi
 * save the child's answers, Rekap shows them. Stars follow Child::starTotals().
 */
class ChildProgressController extends Controller
{
    private const SESSION_KEY = 'active_child_id';

    /** Session key of the story run: ['child' => id, 'story' => story_id, 'step' => highest unlocked step]. */
    private const RUN_KEY = 'story_flow';

    // Story run steps (D-31): each page needs at least its step.
    private const STEP_BACA = 1;

    private const STEP_REFLEKSI = 2;

    private const STEP_MISI = 3;

    private const STEP_REKAP = 4;

    private const MISSION_START_KEY = 'mission_started_at';

    private const REFLECTION_START_KEY = 'reflection_started_at';

    /** Session key of the one-time read tickets from Halaman Baca (see readingPage()). */
    private const READ_TICKETS_KEY = 'read_tickets';

    private const READ_TICKETS_MAX = 5;

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

        // Misi Selesai and stars follow the star rule (best finished try per story, D-20),
        // so redos never count twice and Misi Selesai x 2 = Total Bintang.
        // Keseluruhan = all; Hari Ini / Minggu Ini = gained in that period
        // (now minus what the child had at its start).
        $missionsDone = fn (?Carbon $before = null) => array_sum(Child::bestMissionsDone([$id], $before)[$id] ?? []);
        $totalMissions = $missionsDone();
        $totalStars = Child::starTotals([$id])[$id] ?? 0;

        $summary = [];
        foreach ($periods as $period => $since) {
            $summary[$period] = [
                'cerita' => $this->countCompleted('story_progress', $id, $since),
                'misi' => $since ? $totalMissions - $missionsDone($since) : $totalMissions,
                'bintang' => $since ? $totalStars - (Child::starTotals([$id], $since)[$id] ?? 0) : $totalStars,
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

        return view('user.progress_anak', compact('child', 'summary', 'badges', 'totalStars'));
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
        // Misi line: the best finished try per story, same as Rekap and the stars (D-27).
        $missionsDone = collect(Child::bestMissionsDone([$id])[$id] ?? []);

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

        // Published stories, same list as Story Management's StoryCatalogController.
        $stories = $this->publishedStories()
            ->orderBy('story_order')
            ->orderBy('title')
            ->get();

        $totalStars = Child::starTotals([$id])[$id] ?? 0;

        // Sent back from a story page that was opened without picking a story (D-31).
        $showPickStoryPopup = (bool) session('pick_story_first');

        return view('user.belajar_bersama', compact('child', 'stories', 'storyProgress', 'noProgress', 'totalStars', 'showPickStoryPopup'));
    }

    /**
     * Halaman Baca for the picked child. Picking a story (?cerita=<story_id>, only
     * published ones) starts the story run (D-31); without a run the page is blocked.
     *
     * Each visit gets a one-time read ticket (kept in the session with the child, the
     * story and when the page opened). "Lanjut Refleksi" on the last page sends it to
     * finishReading(), which counts the read at most once per ticket (D-28).
     */
    public function readingPage(Request $request): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $this->startRun($child, $request);
        $story = $this->runStory($child, self::STEP_BACA);
        if (! $story) {
            return $this->pickStoryFirst();
        }

        $readTicket = Str::random(40);
        $tickets = collect(session(self::READ_TICKETS_KEY, []))
            ->put($readTicket, [
                'child' => $child->child_id,
                'story' => $story->story_id,
                'opened_at' => now()->toDateTimeString(),
            ])
            ->take(-self::READ_TICKETS_MAX) // only the newest few (several tabs), so the session stays small
            ->all();
        session([self::READ_TICKETS_KEY => $tickets]);

        return view('user.halaman_baca', [
            'child' => $child,
            'storyTitle' => $story->title,
            'readTicket' => $readTicket,
        ]);
    }

    /**
     * "Lanjut Refleksi" on the last Baca page: counts one read of the story, then
     * goes to Halaman Refleksi. Safe against double taps, slow-internet retries,
     * re-sent forms and made-up requests:
     * - the ticket is used up here, so it can count only once; without a valid
     *   ticket nothing is counted (the kid still goes on to Refleksi);
     * - the route uses ->block(), so requests of the same session that arrive at
     *   the same moment run one after another and can't both use the ticket;
     * - the ticket's child must still be this parent's and the story still published;
     * - the counting itself is made of single atomic database statements (countRead()).
     */
    public function finishReading(Request $request): RedirectResponse
    {
        $ticket = $request->input('ticket');
        $tickets = session(self::READ_TICKETS_KEY, []);
        $visit = is_string($ticket) ? ($tickets[$ticket] ?? null) : null;

        if ($visit !== null) {
            unset($tickets[$ticket]); // used up
            session([self::READ_TICKETS_KEY => $tickets]);

            $child = Child::where('parent_id', $request->user()->user_id)->find($visit['child']);
            $story = $child ? $this->publishedStories()->find($visit['story']) : null;

            if ($child && $story) {
                $this->countRead($child->child_id, $story->story_id, $visit['opened_at']);

                // Reading done: Refleksi opens for the story that was really read (several tabs).
                $this->unlockStep($child->child_id, $story->story_id, self::STEP_REFLEKSI);
                session([self::SESSION_KEY => $child->child_id]);
            }
        }

        return redirect()->route('reflections.show');
    }

    /**
     * Halaman Refleksi: the open story's questions (Iya/Tidak), in the admin's order,
     * plus the "Riwayat Refleksi Terakhir" card from the latest finished try.
     */
    public function reflectionPage(Request $request): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $story = $this->runStory($child, self::STEP_REFLEKSI);
        if (! $story) {
            return $this->pickStoryFirst();
        }

        $questions = $this->storyQuestions($story->story_id)->map(fn ($question) => [
            'id' => (int) $question->reflection_id,
            'text' => $question->question,
        ]);
        if ($questions->isEmpty()) {
            // Nothing to answer: Misi may open straight away.
            $this->unlockStep($child->child_id, $story->story_id, self::STEP_MISI);
        }

        $last = $this->reflectionTries($child->child_id, $story->story_id)->orderByDesc('a.attempt_number')->first();
        $lastTry = $last ? $this->reflectionScore($last) + [
            'time' => ActivityLog::timeLabel(Carbon::parse($last->completed_at)),
        ] : null;

        // The try starts when the page opens; saveReflections() stores it as started_at.
        session([self::REFLECTION_START_KEY => now()->toDateTimeString()]);

        return view('user.halaman_refleksi', [
            'child' => $child,
            'storyTitle' => $story->title,
            'questions' => $questions,
            'lastTry' => $lastTry,
        ]);
    }

    /**
     * Saves one finished reflection try for the open child and story: a
     * reflection_attempts row plus one reflection_answers row per question
     * (1 = Iya, 0 = Tidak). Reflections give no stars (Child::starTotals()).
     * The page sends this once all questions are answered, then the kid goes to Misi.
     */
    public function saveReflections(Request $request): RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $story = $this->runStory($child, self::STEP_REFLEKSI);
        if (! $story) {
            return $this->pickStoryFirst();
        }

        $questionIds = $this->storyQuestions($story->story_id)->pluck('reflection_id')->map(fn ($id) => (int) $id);
        if ($questionIds->isEmpty()) {
            $this->unlockStep($child->child_id, $story->story_id, self::STEP_MISI);

            return redirect()->route('missions.show');
        }

        $answers = $this->validatedAnswers($request, $questionIds);
        $childId = $child->child_id;
        $storyId = $story->story_id;
        $startedAt = session(self::REFLECTION_START_KEY);

        // reflection_progress = % of questions answered: always 100, every question is required.
        DB::transaction(fn () => $this->saveTry('reflection', $childId, $storyId, $answers, 100, $startedAt), 3);
        $this->unlockStep($childId, $storyId, self::STEP_MISI);

        return redirect()->route('missions.show');
    }

    /**
     * Rekap Cerita for the open child and story, all from the best finished tries:
     * - stars and the missions marked "Sudah" from the best Misi try (the star rule)
     * - right answers from the best Refleksi try
     * - a progress bar from the kid's total stars to the next badge
     * - Frekuensi Baca = story_progress.read_count
     * Opens after Misi in this run, or when the kid finished this story's Misi before (D-31).
     */
    public function recapPage(Request $request): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $story = $this->runStory($child, self::STEP_BACA);
        if (! $story) {
            return $this->pickStoryFirst();
        }

        $childId = $child->child_id;
        $storyId = $story->story_id;

        // "Cerita Selesai!" only once the kid has finished the Misi page (the last step)
        // for this story at least once, whatever the answers.
        $storyFinished = DB::table('mission_attempts')
            ->where('child_id', $childId)
            ->where('story_id', $storyId)
            ->where('status', 'completed')
            ->exists();

        if (! $storyFinished && ! $this->runStory($child, self::STEP_REKAP)) {
            return $this->pickStoryFirst();
        }

        // Best Misi try: the most "Sudah"; the latest wins a tie.
        $bestMissionTry = Child::finishedMissionTries()
            ->where('a.child_id', $childId)
            ->where('a.story_id', $storyId)
            ->orderByDesc('done')
            ->orderByDesc('a.attempt_number')
            ->first();
        $missionsDone = $bestMissionTry
            ? DB::table('mission_answers as ans')
                ->join('missions as m', 'm.mission_id', '=', 'ans.mission_id')
                ->where('ans.mission_attempt_id', $bestMissionTry->mission_attempt_id)
                ->where('ans.answer', true)
                ->orderBy('m.order_number')
                ->pluck('m.mission_text')
            : collect();
        $storyStars = $missionsDone->count() * Child::STARS_PER_MISSION;

        // Best Refleksi try: the most right answers; the latest wins a tie.
        $bestReflection = $this->reflectionTries($childId, $storyId)
            ->orderByDesc('correct')
            ->orderByDesc('a.attempt_number')
            ->first();
        $reflection = $bestReflection
            ? $this->reflectionScore($bestReflection) + ['done' => true]
            : ['correct' => 0, 'total' => $this->storyQuestions($storyId)->count(), 'percent' => 0, 'done' => false];

        // Badge card: the kid's total stars (all stories) against the next badge.
        $totalStars = Child::starTotals([$childId])[$childId] ?? 0;
        $badges = DB::table('badges')->orderBy('minimum_stars')->get(['name', 'description', 'minimum_stars']);
        $nextBadge = $badges->first(fn ($badge) => $badge->minimum_stars > $totalStars);

        // Frekuensi Baca: finished reads of this story (story_progress.read_count, D-28).
        $readCount = (int) DB::table('story_progress')
            ->where('child_id', $childId)
            ->where('story_id', $storyId)
            ->value('read_count');

        // Just came from a Misi save that gave no stars because the story is full (D-29).
        $missionResult = session('mission_result');
        $showFullPopup = is_array($missionResult)
            && ($missionResult['gained'] ?? null) === 0
            && ($missionResult['full'] ?? false) === true;

        return view('user.rekap_cerita', [
            'child' => $child,
            'showFullPopup' => $showFullPopup,
            'readCount' => $readCount,
            'storyFinished' => $storyFinished,
            'storyId' => $storyId, // "Coba Lagi" opens this story's Baca page again
            'storyTitle' => $story->title,
            'storyStars' => $storyStars,
            'missionsDone' => $missionsDone,
            'reflection' => $reflection,
            'totalStars' => $totalStars,
            'hasBadges' => $badges->isNotEmpty(),
            'nextBadge' => $nextBadge,
        ]);
    }

    /**
     * Halaman Misi: the open story's missions, in the admin's order.
     * After saving, the page shows the result popup ($result, see saveMissions()).
     */
    public function missionPage(Request $request): View|RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $story = $this->runStory($child, self::STEP_MISI);
        if (! $story) {
            return $this->pickStoryFirst();
        }

        $missions = $this->storyMissions($story->story_id)->map(fn ($mission) => [
            'id' => (int) $mission->mission_id,
            'text' => $mission->mission_text,
        ]);
        if ($missions->isEmpty()) {
            // Nothing to do: Rekap may open straight away.
            $this->unlockStep($child->child_id, $story->story_id, self::STEP_REKAP);
        }

        // The try starts when the page opens; saveMissions() stores it as started_at.
        session([self::MISSION_START_KEY => now()->toDateTimeString()]);

        return view('user.halaman_misi', [
            'child' => $child,
            'storyTitle' => $story->title,
            'missions' => $missions,
            'starsPerMission' => Child::STARS_PER_MISSION,
            'result' => session('mission_result'),
        ]);
    }

    /**
     * Saves one finished mission try for the open child and story: a mission_attempts
     * row (status completed) plus one mission_answers row per mission
     * (1 = "Sudah!", 0 = "Nanti Saja"). The page sends this once, after the last mission,
     * so an unfinished try is never saved.
     * The popup then shows the stars gained by the star rule (Child::starTotals()):
     * the difference to the child's best try before, never less than 0.
     */
    public function saveMissions(Request $request): RedirectResponse
    {
        $child = $this->activeChild($request);
        if ($child instanceof RedirectResponse) {
            return $child;
        }

        $story = $this->runStory($child, self::STEP_MISI);
        if (! $story) {
            return $this->pickStoryFirst();
        }

        $missionIds = $this->storyMissions($story->story_id)->pluck('mission_id')->map(fn ($id) => (int) $id);
        if ($missionIds->isEmpty()) {
            $this->unlockStep($child->child_id, $story->story_id, self::STEP_REKAP);

            return redirect()->route('missions.show');
        }

        $answers = $this->validatedAnswers($request, $missionIds);
        $childId = $child->child_id;
        $storyId = $story->story_id;
        $startedAt = session(self::MISSION_START_KEY);

        $result = DB::transaction(function () use ($childId, $storyId, $answers, $missionIds, $startedAt) {
            $bestBefore = Child::bestMissionsDone([$childId])[$childId][$storyId] ?? 0;

            $done = count(array_filter($answers, fn ($answer) => (bool) $answer));
            // mission_progress = % marked "Sudah"
            $this->saveTry('mission', $childId, $storyId, $answers, (int) round($done / count($answers) * 100), $startedAt);

            $bestAfter = Child::bestMissionsDone([$childId])[$childId][$storyId] ?? 0;

            return [
                'gained' => ($bestAfter - $bestBefore) * Child::STARS_PER_MISSION,
                'full' => $bestAfter >= $missionIds->count(),
                'done' => $done,                  // "Sudah" in this try, for the popup text
                'total' => $missionIds->count(),
            ];
        }, 3);
        $this->unlockStep($childId, $storyId, self::STEP_REKAP);

        // No new stars because the story is already full: the "Bintang Sudah Penuh" popup
        // shows on Rekap Cerita instead (D-29). Otherwise the Misi page shows its popup.
        $fullAlready = $result['gained'] === 0 && $result['full'];

        return redirect()->route($fullAlready ? 'stories.recap' : 'missions.show')->with('mission_result', $result);
    }

    /**
     * Picking a story (?cerita=<story_id> on Halaman Baca, from Belajar Bersama) starts
     * a story run at step 1 (D-31). Picking the same story again for the same child keeps
     * the steps already unlocked (so the browser's back button doesn't break the run).
     * Only published stories can be picked.
     */
    private function startRun(Child $child, Request $request): void
    {
        $storyId = $request->query('cerita');
        if (! is_string($storyId) || ! $this->publishedStories()->whereKey($storyId)->exists()) {
            return;
        }

        if (! $this->runMatches($child->child_id, $storyId)) {
            session([self::RUN_KEY => ['child' => $child->child_id, 'story' => $storyId, 'step' => self::STEP_BACA]]);
        }
    }

    /**
     * Unlocks $step in the child's run on the story; steps only go up. For another story
     * or child (e.g. a read finished in a second tab) the run moves there.
     */
    private function unlockStep(int $childId, string $storyId, int $step): void
    {
        $current = $this->runMatches($childId, $storyId) ? (int) session(self::RUN_KEY)['step'] : 0;
        session([self::RUN_KEY => ['child' => $childId, 'story' => $storyId, 'step' => max($current, $step)]]);
    }

    private function runMatches(int $childId, string $storyId): bool
    {
        $run = session(self::RUN_KEY);

        return is_array($run) && ($run['child'] ?? null) === $childId && ($run['story'] ?? null) === $storyId;
    }

    /**
     * The story of the child's run if the run has reached $step and the story is still
     * published; null otherwise (the page is blocked: pickStoryFirst()).
     */
    private function runStory(Child $child, int $step): ?Story
    {
        $run = session(self::RUN_KEY);
        if (! is_array($run) || ($run['child'] ?? null) !== $child->child_id || (int) ($run['step'] ?? 0) < $step) {
            return null;
        }

        return $this->publishedStories()->find($run['story'] ?? null);
    }

    /** A blocked story page: back to Belajar Bersama, which shows the "Pilih Cerita Dulu" popup once. */
    private function pickStoryFirst(): RedirectResponse
    {
        return redirect()->route('children.learn')->with('pick_story_first', true);
    }

    /**
     * One finished read of a story: story_progress.read_count + 1 (D-28).
     * - started_at = when the first counted read began (the Baca page opened)
     * - completed_at = the FIRST finish only; re-reads never change it, so
     *   "Cerita Selesai" counts each story once
     * - updated_at = the latest read
     * Each step is one atomic statement, so reads that arrive together can't lose a count.
     */
    private function countRead(int $childId, string $storyId, string $openedAt): void
    {
        DB::transaction(function () use ($childId, $storyId, $openedAt) {
            $now = now();
            $row = fn () => DB::table('story_progress')->where('child_id', $childId)->where('story_id', $storyId);

            DB::table('story_progress')->insertOrIgnore([
                'child_id' => $childId,
                'story_id' => $storyId,
                'status' => 'progress',
                'read_count' => 0,
                'started_at' => Carbon::parse($openedAt),
                'completed_at' => null,
                'updated_at' => $now,
            ]);
            $row()->increment('read_count', 1, ['status' => 'completed', 'updated_at' => $now]);
            $row()->whereNull('completed_at')->update(['completed_at' => $now]);
        }, 3);
    }

    /** A story's missions as the admin ordered them (missions table, read only). */
    private function storyMissions(string $storyId): Collection
    {
        return DB::table('missions')
            ->where('story_id', $storyId)
            ->orderBy('order_number')
            ->get(['mission_id', 'mission_text']);
    }

    /** A story's reflection questions as the admin ordered them (reflections table, read only). */
    private function storyQuestions(string $storyId): Collection
    {
        return DB::table('reflections')
            ->where('story_id', $storyId)
            ->orderBy('order_number')
            ->get(['reflection_id', 'question']);
    }

    /**
     * The posted answers as [item_id => 0/1]: exactly one answer for each of $ids
     * (the story's missions or questions), nothing else.
     *
     * @param  Collection<int, int>  $ids
     * @return array<int, string|int|bool>
     */
    private function validatedAnswers(Request $request, Collection $ids): array
    {
        return $request->validate([
            'answers' => ['required', 'array:'.$ids->implode(','), 'size:'.$ids->count()],
            'answers.*' => ['required', 'boolean'],
        ])['answers'];
    }

    /**
     * Saves one finished try ($type "mission" or "reflection"): the try row with the
     * next try number, plus one answer row per item ([item_id => 0/1]).
     * Call inside a DB transaction: the try number is read under a lock, so two saves
     * at the same moment can't take the same number.
     *
     * @param  array<int, string|int|bool>  $answers
     */
    private function saveTry(string $type, int $childId, string $storyId, array $answers, int $progress, ?string $startedAt): void
    {
        $lastTry = DB::table("{$type}_attempts")
            ->where('child_id', $childId)
            ->where('story_id', $storyId)
            ->lockForUpdate()
            ->max('attempt_number');

        $now = now();
        $attemptId = DB::table("{$type}_attempts")->insertGetId([
            'child_id' => $childId,
            'story_id' => $storyId,
            'attempt_number' => (int) $lastTry + 1,
            "{$type}_progress" => $progress,
            'status' => 'completed',
            'started_at' => $startedAt ? Carbon::parse($startedAt) : $now,
            'completed_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table("{$type}_answers")->insert(collect($answers)->map(fn ($answer, $itemId) => [
            "{$type}_attempt_id" => $attemptId,
            "{$type}_id" => $itemId,
            'answer' => (bool) $answer,
            'answered_at' => $now,
            'updated_at' => $now,
        ])->values()->all());
    }

    /**
     * The child's finished reflection tries on a story, one row each with its score:
     * attempt_number, completed_at, correct (answers equal to reflections.answer), answered.
     */
    private function reflectionTries(int $childId, string $storyId): QueryBuilder
    {
        return DB::table('reflection_attempts as a')
            ->join('reflection_answers as ans', 'ans.reflection_attempt_id', '=', 'a.reflection_attempt_id')
            ->join('reflections as r', 'r.reflection_id', '=', 'ans.reflection_id')
            ->where('a.child_id', $childId)
            ->where('a.story_id', $storyId)
            ->where('a.status', 'completed')
            ->groupBy('a.reflection_attempt_id', 'a.attempt_number', 'a.completed_at')
            ->selectRaw('a.attempt_number, a.completed_at, SUM(ans.answer = r.answer) AS correct, COUNT(*) AS answered');
    }

    /**
     * Score of one reflectionTries() row.
     *
     * @return array{correct: int, total: int, percent: int}
     */
    private function reflectionScore(object $try): array
    {
        $correct = (int) $try->correct;
        $total = (int) $try->answered;

        return ['correct' => $correct, 'total' => $total, 'percent' => $total ? (int) round($correct / $total * 100) : 0];
    }

    /** Stories the admin has published (status "active"); drafts stay hidden from parents. */
    private function publishedStories(): Builder
    {
        return Story::query()->where('status', 'active');
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
     *
     * @return Collection<string, int> keyed by story_id
     */
    private function answeredInLatestAttempt(string $attemptsTable, string $attemptKey, string $answersTable, int $childId): Collection
    {
        $latestAttempts = DB::table($attemptsTable)
            ->where('child_id', $childId)
            ->orderByDesc('attempt_number')
            ->get(['story_id', $attemptKey])
            ->unique('story_id');

        $answered = DB::table($answersTable)
            ->whereIn($attemptKey, $latestAttempts->pluck($attemptKey))
            ->groupBy($attemptKey)
            ->selectRaw("{$attemptKey}, COUNT(*) AS done")
            ->pluck('done', $attemptKey);

        return $latestAttempts->mapWithKeys(fn ($attempt) => [
            $attempt->story_id => (int) $answered->get($attempt->{$attemptKey}, 0),
        ]);
    }
}
