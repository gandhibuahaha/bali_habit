<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * story_progress.read_count: how many times the child finished reading the story
 * (tapping "Lanjut Refleksi" on the last Baca page, see ChildProgressController::finishReading).
 * Rows that were already finished before this column existed count as 1 read.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('story_progress', function (Blueprint $table) {
            $table->unsignedInteger('read_count')->default(0)->after('status');
        });

        DB::table('story_progress')->where('status', 'completed')->update(['read_count' => 1]);
    }

    public function down(): void
    {
        Schema::table('story_progress', function (Blueprint $table) {
            $table->dropColumn('read_count');
        });
    }
};
