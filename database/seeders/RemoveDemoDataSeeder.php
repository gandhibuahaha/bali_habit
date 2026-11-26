<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Removes all fake demo data added by DemoDataSeeder.
 *
 *   php artisan db:seed --class=RemoveDemoDataSeeder
 *
 * Only demo rows are removed: parents with an email ending in @demo.balihabit.test
 * (and their children + activity), the 4 demo stories with their missions and
 * reflections, and the 4 demo badges. Real accounts and data are not touched.
 */
class RemoveDemoDataSeeder extends Seeder
{
    public const EMAIL_DOMAIN = 'demo.balihabit.test';

    public const STORY_IDS = ['kedis-puuh', 'lutung-kekua', 'lelipi-selem', 'lutung-pecalang'];

    public const BADGE_NAMES = ['Pembaca Hebat', 'Penjaga Alam', 'Pahlawan Kebaikan', 'Misi Sempurna'];

    public function run(): void
    {
        DB::transaction(fn () => self::clean());
        $this->command?->info('Demo data removed.');
    }

    /**
     * Delete demo rows in foreign-key order (the schema has no cascade).
     */
    public static function clean(): void
    {
        $parentIds = DB::table('users')->where('email', 'like', '%@'.self::EMAIL_DOMAIN)->pluck('user_id');
        $childIds = DB::table('children')->whereIn('parent_id', $parentIds)->pluck('child_id');
        $badgeIds = DB::table('badges')->whereIn('name', self::BADGE_NAMES)->pluck('badge_id');

        // Attempts of demo children, or on demo stories (whoever made them).
        $missionAttemptIds = DB::table('mission_attempts')
            ->whereIn('child_id', $childIds)->orWhereIn('story_id', self::STORY_IDS)->pluck('mission_attempt_id');
        $reflectionAttemptIds = DB::table('reflection_attempts')
            ->whereIn('child_id', $childIds)->orWhereIn('story_id', self::STORY_IDS)->pluck('reflection_attempt_id');

        DB::table('mission_answers')->whereIn('mission_attempt_id', $missionAttemptIds)->delete();
        DB::table('reflection_answers')->whereIn('reflection_attempt_id', $reflectionAttemptIds)->delete();
        DB::table('mission_attempts')->whereIn('mission_attempt_id', $missionAttemptIds)->delete();
        DB::table('reflection_attempts')->whereIn('reflection_attempt_id', $reflectionAttemptIds)->delete();
        DB::table('story_progress')->whereIn('child_id', $childIds)->orWhereIn('story_id', self::STORY_IDS)->delete();
        DB::table('child_badges')->whereIn('child_id', $childIds)->orWhereIn('badge_id', $badgeIds)->delete();

        DB::table('children')->whereIn('child_id', $childIds)->delete();
        DB::table('users')->whereIn('user_id', $parentIds)->delete();

        DB::table('missions')->whereIn('story_id', self::STORY_IDS)->delete();
        DB::table('reflections')->whereIn('story_id', self::STORY_IDS)->delete();
        DB::table('story_pages')->whereIn('story_id', self::STORY_IDS)->delete();
        DB::table('stories')->whereIn('story_id', self::STORY_IDS)->delete();
        DB::table('badges')->whereIn('badge_id', $badgeIds)->delete();
    }
}
