<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * The app clock changed from UTC to Bali time (WITA, UTC+8, config/app.php).
 * Every time saved before that was written in UTC, so this moves them all
 * forward 8 hours once. Empty databases are not affected. Rollback moves them back.
 *
 * Run `php artisan migrate` right after pulling the timezone change, before
 * using the app, so no new (already Bali time) rows get shifted.
 */
return new class extends Migration
{
    /** table => datetime columns written by the app */
    private const COLUMNS = [
        'users' => ['email_verified_at', 'created_at', 'updated_at'],
        'password_reset_tokens' => ['created_at'],
        'stories' => ['created_at', 'updated_at'],
        'story_pages' => ['created_at', 'updated_at'],
        'missions' => ['created_at', 'updated_at'],
        'reflections' => ['created_at', 'updated_at'],
        'badges' => ['created_at', 'updated_at'],
        'children' => ['created_at', 'updated_at', 'deleted_at'],
        'child_badges' => ['earned_at', 'created_at', 'updated_at'],
        'story_progress' => ['started_at', 'completed_at', 'updated_at'],
        'mission_attempts' => ['started_at', 'completed_at', 'updated_at'],
        'mission_answers' => ['answered_at', 'updated_at'],
        'reflection_attempts' => ['started_at', 'completed_at', 'updated_at'],
        'reflection_answers' => ['answered_at', 'updated_at'],
    ];

    public function up(): void
    {
        $this->shift(8);
    }

    public function down(): void
    {
        $this->shift(-8);
    }

    private function shift(int $hours): void
    {
        $sqlite = DB::getDriverName() === 'sqlite';

        DB::transaction(function () use ($hours, $sqlite) {
            foreach (self::COLUMNS as $table => $columns) {
                // NULL stays NULL; one UPDATE per table moves all its columns together.
                $set = collect($columns)->mapWithKeys(fn (string $column) => [
                    $column => DB::raw($sqlite
                        ? "datetime({$column}, '".sprintf('%+d', $hours)." hours')"
                        : "DATE_ADD({$column}, INTERVAL {$hours} HOUR)"),
                ])->all();

                DB::table($table)->update($set);
            }
        });
    }
};
