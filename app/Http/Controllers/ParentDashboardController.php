<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Parent home page (Beranda Orang Tua).
 */
class ParentDashboardController extends Controller
{
    /** How many child cards the dashboard shows; the rest are on /halaman-anak. */
    private const CHILD_PREVIEW_LIMIT = 4;

    /** How many items the "Aktivitas Terbaru" box shows. */
    private const ACTIVITY_LIMIT = 3;

    public function index(Request $request): View
    {
        $ownChildren = Child::where('parent_id', $request->user()->user_id);

        $children = (clone $ownChildren)
            ->orderBy('created_at')
            ->limit(self::CHILD_PREVIEW_LIMIT)
            ->get();

        $activities = $this->recentActivities($ownChildren->pluck('child_id'));

        return view('user.dashboard', compact('children', 'activities'));
    }

    /**
     * Newest events of the given children: finished stories, missions and
     * reflections, and earned badges. Stars are left out until there is a rule.
     *
     * @return Collection<int, array{type: string, child: string, subject: string, time_label: string}>
     */
    private function recentActivities(Collection $childIds): Collection
    {
        if ($childIds->isEmpty()) {
            return collect();
        }

        $completed = fn (string $table, string $type) => DB::table($table)
            ->join('children', 'children.child_id', '=', "{$table}.child_id")
            ->leftJoin('stories', 'stories.story_id', '=', "{$table}.story_id")
            ->whereIn("{$table}.child_id", $childIds)
            ->where("{$table}.status", 'completed')
            ->orderByDesc("{$table}.completed_at")
            ->limit(self::ACTIVITY_LIMIT)
            ->get([
                'children.name as child',
                DB::raw("COALESCE(stories.title, {$table}.story_id) as subject"),
                "{$table}.completed_at as time",
            ])
            ->map(fn ($row) => (array) $row + ['type' => $type]);

        $badges = DB::table('child_badges')
            ->join('children', 'children.child_id', '=', 'child_badges.child_id')
            ->join('badges', 'badges.badge_id', '=', 'child_badges.badge_id')
            ->whereIn('child_badges.child_id', $childIds)
            ->orderByDesc('child_badges.earned_at')
            ->limit(self::ACTIVITY_LIMIT)
            ->get(['children.name as child', 'badges.name as subject', 'child_badges.earned_at as time'])
            ->map(fn ($row) => (array) $row + ['type' => 'badge']);

        return $completed('story_progress', 'story')
            ->concat($completed('mission_attempts', 'mission'))
            ->concat($completed('reflection_attempts', 'reflection'))
            ->concat($badges)
            ->sortByDesc('time')
            ->take(self::ACTIVITY_LIMIT)
            ->map(fn (array $item) => [
                'type' => $item['type'],
                'child' => $item['child'],
                'subject' => $item['subject'],
                'time_label' => $this->timeLabel(Carbon::parse($item['time'])),
            ])
            ->values();
    }

    private function timeLabel(Carbon $time): string
    {
        return $time->isYesterday() ? 'Kemarin' : $time->locale('id')->diffForHumans();
    }
}
