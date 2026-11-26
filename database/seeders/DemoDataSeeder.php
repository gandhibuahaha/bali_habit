<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Fake demo data for local testing: 100 parents, ~200 kids and their activity
 * (stories read, missions, reflections, badges), spread over the last 12 months,
 * every record on its own date and time.
 *
 *   php artisan db:seed --class=DemoDataSeeder        add / refresh demo data
 *   php artisan db:seed --class=RemoveDemoDataSeeder  remove all demo data
 *
 * Demo parents log in with their email (…@demo.balihabit.test) and password "demo12345".
 * Real accounts and data are never touched. Running it again replaces the old demo data.
 * The 4 demo stories, their missions/reflections and 4 badges are added too, because
 * activity cannot exist without them (same content as the reading and progress pages).
 */
class DemoDataSeeder extends Seeder
{
    public const PASSWORD = 'demo12345';

    /** How many parents were added in each period: [count, min days ago, max days ago]. */
    private const PARENT_BUCKETS = [
        [5, 0, 0],      // today
        [5, 1, 1],      // yesterday
        [10, 2, 6],     // last 7 days
        [15, 7, 29],    // last month
        [20, 30, 89],   // 1–3 months ago
        [20, 90, 179],  // 3–6 months ago
        [25, 180, 364], // 6–12 months ago
    ];

    private const STORIES = [
        'kedis-puuh' => ['I Alu teken I Kedis Puuh', 'Tentang kecerdikan menjaga rumah dan alam.', 'assets/images/alu_puuh.png'],
        'lutung-kekua' => ['I Lutung teken I Kekua', 'Tentang peduli dan merawat lingkungan sekitar.', 'assets/images/lutung_kekua.png'],
        'lelipi-selem' => ['Lelipi Selem Bukit', 'Menjaga Alam & Lingkungan', 'assets/images/lelipi_selem.png'],
        'lutung-pecalang' => ['I Lutung Dadi Pecalang', 'Penjaga yang berusaha memahami masalah', 'assets/images/lutung_pecalang.png'],
    ];

    /** Reflection question => correct answer (true = Iya). Demo content from halaman_refleksi. */
    private const REFLECTIONS = [
        'Apakah I Kedis Puuh cerdik saat menjaga rumahnya?' => true,
        'Apakah I Alu adalah karakter yang jahat?' => false,
        'Ketika alam hancur apakah kita masih mendapatkan tempat untuk tinggal?' => false,
    ];

    /** Demo content from public/assets/js/misi_user.js. */
    private const MISSIONS = [
        'Sudahkah mencium ibumu hari ini?',
        'Apakah kamu sudah merapikan tempat tidurmu?',
        'Sudahkah kamu menyiram tanaman di rumah?',
    ];

    /** Badge name => minimum stars (from the Progress Anak page). */
    private const BADGES = [
        'Pembaca Hebat' => 5,
        'Penjaga Alam' => 10,
        'Pahlawan Kebaikan' => 20,
        'Misi Sempurna' => 30,
    ];

    private const MALE_PREFIX = ['I Wayan', 'I Made', 'I Nyoman', 'I Ketut', 'I Putu', 'I Kadek', 'I Komang', 'I Gede'];
    private const FEMALE_PREFIX = ['Ni Luh', 'Ni Made', 'Ni Nyoman', 'Ni Ketut', 'Ni Putu', 'Ni Kadek', 'Ni Komang', 'Ni Wayan'];
    private const MALE_NAMES = ['Sudarsana', 'Artawan', 'Suardana', 'Mahendra', 'Wirawan', 'Darmawan', 'Adnyana', 'Sutama', 'Arsana', 'Wiguna', 'Pratama', 'Santika', 'Yudiana', 'Arimbawa', 'Suarjaya'];
    private const FEMALE_NAMES = ['Ayu Lestari', 'Sri Wahyuni', 'Dewi Sartika', 'Ratna Sari', 'Wulandari', 'Kartika', 'Purnamasari', 'Puspitasari', 'Ariani', 'Suastini', 'Sukmawati', 'Indrayani', 'Krisna Dewi', 'Paramitha'];
    private const BOY_NAMES = ['Putu Arya', 'Made Bagus', 'Komang Raka', 'Gede Bayu', 'Kadek Yoga', 'Wayan Dharma', 'Ketut Agus', 'Nyoman Surya', 'Putu Krisna', 'Made Satria'];
    private const GIRL_NAMES = ['Putu Intan', 'Made Sari', 'Komang Gita', 'Kadek Sinta', 'Ketut Laras', 'Wayan Ayu', 'Nyoman Dewi', 'Putu Kirana', 'Made Wulan', 'Kadek Tari'];

    private Carbon $now;

    /** @var array<int, true> every timestamp (in seconds) already used, real or demo, to keep them all distinct */
    private array $usedTimes = [];

    public function run(): void
    {
        $this->now = Carbon::now();

        DB::transaction(function () {
            RemoveDemoDataSeeder::clean();
            $this->reserveExistingTimes();

            [$missionIds, $reflections, $badges] = $this->seedStoriesAndBadges();
            $this->seedFamilies($missionIds, $reflections, $badges);
        });

        $this->command?->info('Demo data added. Demo parents log in with password "'.self::PASSWORD.'".');
    }

    /**
     * @return array{0: array<string, list<int>>, 1: array<string, list<array{id: int, correct: bool}>>, 2: array<string, array{id: int, min: int}>}
     */
    private function seedStoriesAndBadges(): array
    {
        $created = $this->now->copy()->subYear()->startOfDay();
        $missionIds = [];
        $reflections = [];
        $order = 0;

        foreach (self::STORIES as $id => [$title, $description, $cover]) {
            $order++;
            $time = $this->claim($created->copy()->addHours($order));
            DB::table('stories')->insert([
                'story_id' => $id, 'title' => $title, 'description' => $description, 'cover_image' => $cover,
                'status' => 'active', 'story_order' => $order, 'created_at' => $time, 'updated_at' => $time,
            ]);

            $n = 0;
            foreach (self::MISSIONS as $text) {
                $n++;
                $t = $this->claim($time->copy()->addMinutes($n));
                $missionIds[$id][] = DB::table('missions')->insertGetId([
                    'story_id' => $id, 'mission_text' => $text, 'answer' => true, 'order_number' => $n,
                    'created_at' => $t, 'updated_at' => $t,
                ]);
            }

            $n = 0;
            foreach (self::REFLECTIONS as $question => $correct) {
                $n++;
                $t = $this->claim($time->copy()->addMinutes(10 + $n));
                $reflections[$id][] = [
                    'id' => DB::table('reflections')->insertGetId([
                        'story_id' => $id, 'question' => $question, 'answer' => $correct, 'order_number' => $n,
                        'created_at' => $t, 'updated_at' => $t,
                    ]),
                    'correct' => $correct,
                ];
            }
        }

        $badges = [];
        foreach (self::BADGES as $name => $min) {
            $t = $this->claim($created->copy()->addHours(10)->addMinutes($min));
            $badges[$name] = [
                'id' => DB::table('badges')->insertGetId([
                    'name' => $name, 'description' => 'Kumpulkan '.$min.' bintang.', 'minimum_stars' => $min,
                    'created_at' => $t, 'updated_at' => $t,
                ]),
                'min' => $min,
            ];
        }

        return [$missionIds, $reflections, $badges];
    }

    private function seedFamilies(array $missionIds, array $reflections, array $badges): void
    {
        $password = Hash::make(self::PASSWORD);
        $number = 0;

        foreach (self::PARENT_BUCKETS as [$count, $minDays, $maxDays]) {
            for ($i = 0; $i < $count; $i++) {
                $number++;
                $created = $this->timeOnDay(mt_rand($minDays, $maxDays));
                $name = $this->parentName();
                $slug = Str::slug($name);

                $parentId = DB::table('users')->insertGetId([
                    'username' => $slug.'-'.$number,
                    'password' => $password,
                    'name' => $name,
                    'email' => $slug.'.'.$number.'@'.RemoveDemoDataSeeder::EMAIL_DOMAIN,
                    // About half have a phone number (unique demo range 62877…).
                    'no_tlp' => mt_rand(0, 1) ? '62877'.str_pad((string) $number, 8, '0', STR_PAD_LEFT) : null,
                    'role' => 'parent',
                    'created_at' => $created,
                    'updated_at' => $created,
                ]);

                $kids = mt_rand(1, 3);
                $siblingNames = []; // siblings never share a name
                for ($k = 0; $k < $kids; $k++) {
                    $this->seedChild($parentId, $created, $missionIds, $reflections, $badges, $siblingNames);
                }
            }
        }
    }

    /**
     * @param  list<string>  $siblingNames  names already given to this parent's kids (updated here)
     */
    private function seedChild(int $parentId, Carbon $parentCreated, array $missionIds, array $reflections, array $badges, array &$siblingNames): void
    {
        $isGirl = (bool) mt_rand(0, 1);
        $created = $this->randomIn($parentCreated->copy()->addMinutes(5), $this->now)
            ?? $this->randomIn($parentCreated, $this->now);
        if (! $created) {
            return; // parent added too recently for a kid
        }

        // A name none of the siblings has yet (10 names per list, at most 3 kids).
        $name = $this->pick(array_values(array_diff($isGirl ? self::GIRL_NAMES : self::BOY_NAMES, $siblingNames)));
        $siblingNames[] = $name;

        $childId = DB::table('children')->insertGetId([
            'parent_id' => $parentId,
            'name' => $name,
            'birth_date' => $this->now->copy()->subYears(mt_rand(3, 9))->subDays(mt_rand(0, 364))->toDateString(),
            'gender' => $isGirl ? 'female' : 'male',
            'created_at' => $created,
            'updated_at' => $created,
        ]);

        $score = 0;
        $lastActivity = $created;
        $storyIds = array_keys(self::STORIES);
        shuffle($storyIds);

        // Each step only happens if there is time for it before "now"
        // (a kid added a few minutes ago has not read anything yet).
        foreach (array_slice($storyIds, 0, mt_rand(1, 4)) as $storyId) {
            $started = $this->randomIn($created->copy()->addHour(), $this->now);
            if (! $started) {
                break;
            }
            $completed = mt_rand(1, 100) <= 70
                ? $this->randomIn($started->copy()->addMinutes(10), $this->earliest($started->copy()->addDays(3), $this->now))
                : null;

            DB::table('story_progress')->insert([
                'child_id' => $childId, 'story_id' => $storyId,
                'status' => $completed ? 'completed' : 'progress',
                'started_at' => $started, 'completed_at' => $completed, 'updated_at' => $completed ?? $started,
            ]);
            $lastActivity = $this->latest($lastActivity, $completed ?? $started);

            if (! $completed) {
                continue;
            }

            // Missions and reflection, both after finishing the story.
            [$done, $missionEnd] = $this->seedAttempt(
                'mission', $childId, $storyId, $completed,
                array_map(fn ($id) => ['id' => $id, 'correct' => true], $missionIds[$storyId]),
                6 * 60, 75
            );
            [$right, $reflectionEnd] = $this->seedAttempt(
                'reflection', $childId, $storyId, $completed, $reflections[$storyId], 30, 80
            );
            $score += $done + $right;
            $lastActivity = $this->latest($lastActivity, $this->latest($missionEnd, $reflectionEnd));
        }

        // Demo badges: earned when the kid's score reaches the badge minimum.
        foreach ($badges as $badge) {
            $earned = $score >= $badge['min']
                ? $this->randomIn($lastActivity, $this->earliest($lastActivity->copy()->addDay(), $this->now))
                : null;
            if ($earned) {
                DB::table('child_badges')->insert([
                    'child_id' => $childId, 'badge_id' => $badge['id'], 'earned_at' => $earned,
                    'created_at' => $earned, 'updated_at' => $earned,
                ]);
                $lastActivity = $this->latest($lastActivity, $earned);
            }
        }

        // About 1 in 20 kids was later deleted by the parent: kept as "Nonaktif" (soft delete).
        if (mt_rand(1, 100) <= 5) {
            $deleted = $this->randomIn($lastActivity, $this->now);
            if ($deleted) {
                DB::table('children')->where('child_id', $childId)->update(['deleted_at' => $deleted, 'updated_at' => $deleted]);
            }
        }
    }

    /**
     * One mission or reflection attempt with its answers, starting after $after.
     * Missions: answer true = "Sudah" ($goodChance %). Reflections: answer is the
     * kid's Iya/Tidak, right $goodChance % of the time.
     *
     * @param  list<array{id: int, correct: bool}>  $items
     * @return array{0: int, 1: Carbon} [good answers, time of the last step]
     */
    private function seedAttempt(string $type, int $childId, string $storyId, Carbon $after, array $items, int $maxGapMinutes, int $goodChance): array
    {
        $start = $this->randomIn($after, $this->earliest($after->copy()->addDays(2), $this->now));
        if (! $start) {
            return [0, $after];
        }

        $attemptId = DB::table("{$type}_attempts")->insertGetId([
            'child_id' => $childId, 'story_id' => $storyId, 'attempt_number' => 1, "{$type}_progress" => 0,
            'status' => 'progress', 'started_at' => $start, 'completed_at' => null, 'updated_at' => $start,
        ]);

        $time = $start;
        $answered = 0;
        $good = 0;
        foreach ($items as $item) {
            $next = $this->randomIn($time, $this->earliest($time->copy()->addMinutes($maxGapMinutes), $this->now));
            if (! $next) {
                break; // no time left: the rest is still open
            }
            $time = $next;
            $isGood = mt_rand(1, 100) <= $goodChance;
            $answered++;
            $good += (int) $isGood;
            DB::table("{$type}_answers")->insert([
                "{$type}_attempt_id" => $attemptId, "{$type}_id" => $item['id'],
                'answer' => $type === 'mission' ? $isGood : ($isGood ? $item['correct'] : ! $item['correct']),
                'answered_at' => $time, 'updated_at' => $time,
            ]);
        }

        $finished = $answered === count($items);
        DB::table("{$type}_attempts")->where("{$type}_attempt_id", $attemptId)->update([
            // Missions: % marked "Sudah". Reflections: % of questions answered.
            "{$type}_progress" => (int) round(($type === 'mission' ? $good : $answered) / count($items) * 100),
            'status' => $finished ? 'completed' : 'progress',
            'completed_at' => $finished ? $time : null,
            'updated_at' => $time,
        ]);

        return [$good, $time];
    }

    /**
     * A free (not yet used) random time strictly after $from and not later than $to.
     * Null when there is less than a minute between them, or no free second is left.
     */
    private function randomIn(Carbon $from, Carbon $to): ?Carbon
    {
        $low = $from->getTimestamp() + 1;
        $high = $to->getTimestamp();
        if ($high - $low < 59) {
            return null;
        }

        for ($try = 0; $try < 20; $try++) {
            $ts = mt_rand($low, $high);
            if (! isset($this->usedTimes[$ts])) {
                return $this->take($ts);
            }
        }
        for ($ts = $high; $ts >= $low; $ts--) {
            if (! isset($this->usedTimes[$ts])) {
                return $this->take($ts);
            }
        }

        return null;
    }

    private function parentName(): string
    {
        $isFemale = (bool) mt_rand(0, 1);

        return $isFemale
            ? $this->pick(self::FEMALE_PREFIX).' '.$this->pick(self::FEMALE_NAMES)
            : $this->pick(self::MALE_PREFIX).' '.$this->pick(self::MALE_NAMES);
    }

    private function pick(array $list): string
    {
        return $list[mt_rand(0, count($list) - 1)];
    }

    /** A free random time on the day $daysAgo days back (today: at least 30 minutes before now). */
    private function timeOnDay(int $daysAgo): Carbon
    {
        $start = $this->now->copy()->startOfDay()->subDays($daysAgo)->subSecond();
        $end = $daysAgo === 0 ? $this->now->copy()->subMinutes(30) : $start->copy()->addDay();

        return $this->randomIn($start, $end) ?? $this->randomIn($start, $this->now) ?? $this->claim($start);
    }

    /** Mark the timestamps that already exist (real data) as used, so demo times never repeat them. */
    private function reserveExistingTimes(): void
    {
        $columns = [
            'users' => ['created_at'], 'children' => ['created_at', 'deleted_at'],
            'story_progress' => ['started_at', 'completed_at'],
            'mission_attempts' => ['started_at'], 'reflection_attempts' => ['started_at'],
            'mission_answers' => ['answered_at'], 'reflection_answers' => ['answered_at'],
            'child_badges' => ['earned_at'],
        ];
        foreach ($columns as $table => $cols) {
            foreach ($cols as $col) {
                foreach (DB::table($table)->whereNotNull($col)->pluck($col) as $value) {
                    $this->usedTimes[Carbon::parse($value)->getTimestamp()] = true;
                }
            }
        }
    }

    private function earliest(Carbon $a, Carbon $b): Carbon
    {
        return $a->lessThan($b) ? $a : $b;
    }

    private function latest(Carbon $a, Carbon $b): Carbon
    {
        return $a->greaterThan($b) ? $a : $b;
    }

    /** The first free second at or after $time (used for the fixed story/badge times a year ago). */
    private function claim(Carbon $time): Carbon
    {
        $ts = $time->getTimestamp();
        while (isset($this->usedTimes[$ts])) {
            $ts++;
        }

        return $this->take($ts);
    }

    private function take(int $timestamp): Carbon
    {
        $this->usedTimes[$timestamp] = true;

        return Carbon::createFromTimestamp($timestamp, $this->now->getTimezone());
    }
}
