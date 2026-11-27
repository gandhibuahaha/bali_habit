<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\User;
use App\Support\ActivityLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Admin User Management: the Orang Tua, Anak and Aktivitas Pengguna tabs.
 * Read fresh from the database on each page load; the page's own script does the
 * search, sorting and pages on the list.
 */
class UserManagementController extends Controller
{
    /** How many of the newest events the Aktivitas Pengguna tab loads. */
    private const ACTIVITY_LIMIT = 500;

    public function parents(): View
    {
        $parents = User::query()
            ->where('role', 'parent')
            // Includes children the parent deleted: shown as "Nonaktif", not counted.
            ->with(['children' => fn ($q) => $q->withTrashed()->orderBy('created_at')])
            ->orderByDesc('created_at')
            ->orderByDesc('user_id')
            ->get(['user_id', 'name', 'email', 'no_tlp', 'profile_picture', 'created_at', 'updated_at']);

        $children = $parents->flatMap->children;
        $stars = Child::starTotals($children->pluck('child_id'));
        $lastActivity = $this->lastActivityByChild($children->pluck('child_id'));

        $rows = $parents->map(function (User $parent) use ($stars, $lastActivity) {
            // The family's last action: the parent's own profile, or any of their children.
            $lastActive = $parent->children
                ->map(fn (Child $child) => $lastActivity[$child->child_id] ?? null)
                ->push($parent->updated_at)
                ->filter()
                ->max();

            return [
                'id' => $parent->user_id,
                'nama' => $parent->name,
                'email' => $parent->email,
                'inisial' => User::initialsOf($parent->name),
                'foto' => $this->photoUrl($parent->profile_picture),
                'telepon' => $this->formatPhone($parent->no_tlp),
                'terdaftar' => $parent->created_at->locale('id')->translatedFormat('j F Y'),
                'terakhirAktif' => $lastActive->locale('id')->diffForHumans(),
                'jumlahAnak' => $parent->children->reject->trashed()->count(),
                'anak' => $parent->children->map(fn (Child $child) => [
                    'nama' => $child->name,
                    'inisial' => User::initialsOf($child->name),
                    'foto' => $this->photoUrl($child->profile_picture),
                    'gender' => $this->genderLabel($child->gender),
                    'usia' => $child->birth_date->age,
                    'bintang' => $stars[$child->child_id] ?? 0,
                    'aktif' => ! $child->trashed(),
                ])->values(),
            ];
        })->values();

        return view('admin.user_management_ortu', [
            'parents' => $rows,
            'totalOrangTua' => $rows->count(),
            'totalAnak' => $children->reject->trashed()->count(),
        ]);
    }

    public function children(): View
    {
        // Includes children the parent deleted: listed as "Nonaktif", not counted.
        $children = Child::withTrashed()
            ->with('parent:user_id,name')
            ->orderByDesc('created_at')
            ->orderByDesc('child_id')
            ->get();

        $ids = $children->pluck('child_id');
        $learning = Child::learningTotals($ids);
        $lastActivity = $this->lastActivityByChild($ids);
        $lastStory = $this->lastStoryByChild($ids);
        $badges = $this->badgesByChild($ids);
        $badgeTotal = DB::table('badges')->count();

        $rows = $children->map(function (Child $child) use ($learning, $lastActivity, $lastStory, $badges, $badgeTotal) {
            $done = $learning[$child->child_id] ?? ['refleksi_dijawab' => 0, 'refleksi_benar' => 0, 'misi_sudah' => 0, 'bintang' => 0];
            $story = $lastStory[$child->child_id] ?? null;
            $badge = $badges[$child->child_id] ?? null;

            return [
                'id' => $child->child_id,
                'nama' => $child->name,
                'inisial' => User::initialsOf($child->name),
                'foto' => $this->photoUrl($child->profile_picture),
                'usia' => $child->birth_date->age,
                'gender' => $this->genderLabel($child->gender),
                'ortu' => $child->parent?->name ?? '-',
                'aktif' => ! $child->trashed(),
                'nonaktifSejak' => $child->deleted_at?->locale('id')->translatedFormat('j F Y'),
                'bintang' => $done['bintang'], // star rule: Child::starTotals()
                'tanggalLahir' => $child->birth_date->locale('id')->translatedFormat('j F Y'),
                'terdaftar' => $child->created_at->locale('id')->translatedFormat('j F Y'),
                'ceritaTerakhir' => $story ? [
                    'judul' => $story->title,
                    'selesai' => $story->status === 'completed',
                    'waktu' => Carbon::parse($story->last_time)->locale('id')->diffForHumans(),
                ] : null,
                'lencana' => [
                    'terbaru' => $badge['terbaru'] ?? null,
                    'jumlah' => $badge['jumlah'] ?? 0,
                    'total' => $badgeTotal,
                ],
                'misi' => $done['misi_sudah'],
                'refleksi' => $done['refleksi_dijawab'],
                'terakhirAktif' => Carbon::parse($lastActivity[$child->child_id] ?? $child->updated_at)
                    ->locale('id')->diffForHumans(),
            ];
        })->values();

        return view('admin.user_management_anak', [
            'children' => $rows,
            'totalOrangTua' => User::where('role', 'parent')->count(),
            'totalAnak' => $children->reject->trashed()->count(),
        ]);
    }

    /**
     * Aktivitas Pengguna tab: the newest events of parents and children.
     */
    public function activities(): View
    {
        return view('admin.aktivitas_pengguna', [
            'activities' => ActivityLog::latest(self::ACTIVITY_LIMIT),
            'activityLimit' => self::ACTIVITY_LIMIT,
            'totalOrangTua' => User::where('role', 'parent')->count(),
            'totalAnak' => Child::count(), // active children only (soft deleted are skipped)
        ]);
    }

    /**
     * Time of each child's latest action: [child_id => Carbon].
     * Counts adding or editing the child, and their stories, missions, reflections and badges.
     *
     * @param  Collection<int, int>  $childIds
     * @return array<int, Carbon>
     */
    private function lastActivityByChild(Collection $childIds): array
    {
        $sources = [
            ['children', 'updated_at'],
            ['story_progress', 'COALESCE(completed_at, started_at)'],
            ['mission_attempts', 'COALESCE(completed_at, started_at)'],
            ['reflection_attempts', 'COALESCE(completed_at, started_at)'],
            ['child_badges', 'earned_at'],
        ];

        $latest = [];
        foreach ($sources as [$table, $timeExpression]) {
            $times = DB::table($table)
                ->whereIn('child_id', $childIds)
                ->groupBy('child_id')
                ->selectRaw("child_id, MAX({$timeExpression}) AS last_time")
                ->pluck('last_time', 'child_id');

            foreach ($times as $childId => $time) {
                $time = Carbon::parse($time);
                if (! isset($latest[$childId]) || $time->gt($latest[$childId])) {
                    $latest[$childId] = $time;
                }
            }
        }

        return $latest;
    }

    /**
     * The story each child opened last: [child_id => {title, status, last_time}].
     *
     * @param  Collection<int, int>  $childIds
     * @return array<int, object>
     */
    private function lastStoryByChild(Collection $childIds): array
    {
        return DB::table('story_progress')
            ->join('stories', 'stories.story_id', '=', 'story_progress.story_id')
            ->whereIn('story_progress.child_id', $childIds)
            ->orderByRaw('COALESCE(story_progress.completed_at, story_progress.started_at) DESC')
            ->get([
                'story_progress.child_id',
                'stories.title',
                'story_progress.status',
                DB::raw('COALESCE(story_progress.completed_at, story_progress.started_at) AS last_time'),
            ])
            ->unique('child_id')
            ->keyBy('child_id')
            ->all();
    }

    /**
     * Badges per child: [child_id => ['terbaru' => newest badge name, 'jumlah' => count]].
     *
     * @param  Collection<int, int>  $childIds
     * @return array<int, array{terbaru: string, jumlah: int}>
     */
    private function badgesByChild(Collection $childIds): array
    {
        return DB::table('child_badges')
            ->join('badges', 'badges.badge_id', '=', 'child_badges.badge_id')
            ->whereIn('child_badges.child_id', $childIds)
            ->orderByDesc('child_badges.earned_at')
            ->get(['child_badges.child_id', 'badges.name'])
            ->groupBy('child_id')
            ->map(fn (Collection $earned) => ['terbaru' => $earned->first()->name, 'jumlah' => $earned->count()])
            ->all();
    }

    private function genderLabel(string $gender): string
    {
        return $gender === 'female' ? 'Perempuan' : 'Laki-laki';
    }

    /**
     * Public address of a profile photo stored on the public disk (same as the parent
     * and admin pages: asset('storage/...')), or null when there is none: the page
     * then shows the initials.
     */
    private function photoUrl(?string $path): ?string
    {
        return $path ? asset('storage/'.$path) : null;
    }

    /**
     * Stored as "62812..." (no plus). Shown as "+62 812 3456 7890", or null if empty.
     */
    private function formatPhone(?string $phone): ?string
    {
        $phone = trim((string) $phone);
        if ($phone === '') {
            return null;
        }

        $local = str_starts_with($phone, '62') ? substr($phone, 2) : ltrim($phone, '0');

        return trim('+62 '.substr($local, 0, 3).' '.implode(' ', str_split(substr($local, 3), 4)));
    }
}
