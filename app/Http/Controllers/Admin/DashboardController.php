<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Support\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Admin Beranda: the 5 number cards and "Aktivitas Pengguna Terbaru".
 * "Hari Ini": big number = how many there are now; badge = added today.
 * "... Lalu": big number = how many there were back then; small line = how many
 * there are now; badge = growth from then until now.
 * Numbers are counted fresh on every page load.
 */
class DashboardController extends Controller
{
    /** slug => dropdown label */
    private const PERIODS = [
        'hari-ini' => 'Hari Ini',
        '1-hari' => '1 Hari Lalu',
        '7-hari' => '7 Hari Lalu',
        '1-bulan' => '1 Bulan Lalu',
        '3-bulan' => '3 Bulan Lalu',
        '6-bulan' => '6 Bulan Lalu',
        '1-tahun' => '1 Tahun Lalu',
    ];

    public function index(Request $request): View
    {
        $period = $request->query('periode');
        if (! is_string($period) || ! isset(self::PERIODS[$period])) {
            $period = 'hari-ini';
        }
        $since = $this->periodStart($period);

        // key => [table, column used for "before the period", extra filter]
        // Children deleted by their parent (Nonaktif) are not counted.
        $sources = [
            'anak' => ['children', 'created_at', fn ($q) => $q->whereNull('deleted_at')],
            'orang_tua' => ['users', 'created_at', fn ($q) => $q->where('role', 'parent')],
            'lencana' => ['child_badges', 'earned_at', null],
            'cerita' => ['stories', 'created_at', null],
        ];

        $cards = [];
        foreach ($sources as $key => [$table, $column, $filter]) {
            $query = fn () => DB::table($table)->when($filter, $filter);

            $total = $query()->count();
            $before = $query()->where($column, '<', $since)->count();

            $cards[$key] = ['then' => $before, 'now' => $total] + $this->badge($total, $before);
        }

        // Misi Selesai: missions marked "Sudah", counted like the stars (best finished
        // try per child and story, D-20), so redos never count twice. All children's
        // history counts, Nonaktif ones too (same as before this change).
        $allChildIds = DB::table('children')->pluck('child_id');
        $missionsDone = fn (?Carbon $before = null) => array_sum(array_map('array_sum', Child::bestMissionsDone($allChildIds, $before)));
        $missionsNow = $missionsDone();
        $missionsThen = $missionsDone($since);
        $cards['misi'] = ['then' => $missionsThen, 'now' => $missionsNow] + $this->badge($missionsNow, $missionsThen);

        return view('admin.beranda_admin', [
            'cards' => $cards,
            'periods' => self::PERIODS,
            'period' => $period,
            // "Hari Ini" shows today's numbers, without the "Sekarang" line.
            'showToday' => $period === 'hari-ini',
            // "Aktivitas Pengguna Terbaru": the newest 3 events.
            'aktivitas' => ActivityLog::latest(3),
        ]);
    }

    private function periodStart(string $period): Carbon
    {
        $today = Carbon::today();

        return match ($period) {
            '7-hari' => $today->subDays(7),
            '1-bulan' => $today->subMonth(),
            '3-bulan' => $today->subMonths(3),
            '6-bulan' => $today->subMonths(6),
            '1-tahun' => $today->subYear(),
            default => $today,
        };
    }

    /**
     * Growth since the start of the period. Both counts only include rows that
     * still exist, so the change is never negative (deleted rows leave both).
     *
     * @return array{badge: string, tone: string}
     */
    private function badge(int $total, int $before): array
    {
        $up = 'text-emerald-600 bg-emerald-50';
        $flat = 'text-slate-500 bg-slate-100';

        // Nothing at the start of the period: a percentage is impossible (÷ 0),
        // so show how many were added, e.g. "+3". With a starting value, use %.
        if ($before === 0) {
            return $total > 0 ? ['badge' => "+{$total}", 'tone' => $up] : ['badge' => '0%', 'tone' => $flat];
        }

        $change = (int) round(($total - $before) / $before * 100);

        return $change > 0
            ? ['badge' => "+{$change}%", 'tone' => $up]
            : ['badge' => '0%', 'tone' => $flat];
    }
}
