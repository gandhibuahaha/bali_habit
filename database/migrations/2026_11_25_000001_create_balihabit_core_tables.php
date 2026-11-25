<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the BaliHabit tables from the team's database design (balihabit.sql).
 * Tables are created in foreign-key order. Foreign keys have no cascade,
 * same as the design: dependent rows must be deleted first.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->string('story_id', 20)->primary();
            $table->string('title', 150);
            $table->text('description');
            $table->string('cover_image', 255)->nullable();
            $table->enum('status', ['inactive', 'active']);
            $table->integer('story_order');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('story_pages', function (Blueprint $table) {
            $table->bigInteger('page_id', true);
            $table->string('story_id', 20);
            $table->integer('page_number');
            $table->string('illustration', 255);
            $table->text('balinese_text');
            $table->string('balinese_audio', 255);
            $table->text('indonesian_text');
            $table->string('indonesian_audio', 255);
            $table->text('english_text');
            $table->string('english_audio', 255);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->unique(['story_id', 'page_number']);
            $table->foreign('story_id')->references('story_id')->on('stories');
        });

        Schema::create('missions', function (Blueprint $table) {
            $table->bigInteger('mission_id', true);
            $table->string('story_id', 20);
            $table->text('mission_text');
            $table->boolean('answer')->comment('true = Sudah, false = Belum');
            $table->integer('order_number');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->unique(['story_id', 'order_number']);
            $table->foreign('story_id')->references('story_id')->on('stories');
        });

        Schema::create('reflections', function (Blueprint $table) {
            $table->bigInteger('reflection_id', true);
            $table->string('story_id', 20);
            $table->text('question');
            $table->boolean('answer')->comment('true = Iya, false = Tidak');
            $table->integer('order_number');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->unique(['story_id', 'order_number']);
            $table->foreign('story_id')->references('story_id')->on('stories');
        });

        Schema::create('badges', function (Blueprint $table) {
            $table->bigInteger('badge_id', true);
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('minimum_stars');
            $table->string('icon', 255)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('children', function (Blueprint $table) {
            $table->bigInteger('child_id', true);
            $table->bigInteger('parent_id');
            $table->string('name', 100);
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('profile_picture', 255)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('parent_id')->references('user_id')->on('users');
        });

        Schema::create('child_badges', function (Blueprint $table) {
            $table->bigInteger('child_badge_id', true);
            $table->bigInteger('child_id');
            $table->bigInteger('badge_id');
            $table->dateTime('earned_at');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->unique(['child_id', 'badge_id']);
            $table->foreign('child_id')->references('child_id')->on('children');
            $table->foreign('badge_id')->references('badge_id')->on('badges');
        });

        Schema::create('story_progress', function (Blueprint $table) {
            $table->bigInteger('progress_id', true);
            $table->bigInteger('child_id');
            $table->string('story_id', 20);
            $table->enum('status', ['progress', 'completed']);
            $table->dateTime('started_at');
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('updated_at');

            $table->unique(['child_id', 'story_id']);
            $table->foreign('child_id')->references('child_id')->on('children');
            $table->foreign('story_id')->references('story_id')->on('stories');
        });

        Schema::create('mission_attempts', function (Blueprint $table) {
            $table->bigInteger('mission_attempt_id', true);
            $table->bigInteger('child_id');
            $table->string('story_id', 20);
            $table->integer('attempt_number');
            $table->integer('mission_progress')->comment('Progress misi yang sudah dilakukan dalam persen');
            $table->enum('status', ['progress', 'completed']);
            $table->dateTime('started_at');
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('updated_at');

            $table->unique(['child_id', 'story_id', 'attempt_number']);
            $table->foreign('child_id')->references('child_id')->on('children');
            $table->foreign('story_id')->references('story_id')->on('stories');
        });

        Schema::create('mission_answers', function (Blueprint $table) {
            $table->bigInteger('mission_answer_id', true);
            $table->bigInteger('mission_attempt_id');
            $table->bigInteger('mission_id');
            $table->boolean('answer')->comment('true = Sudah, false = Belum');
            $table->dateTime('answered_at');
            $table->dateTime('updated_at');

            $table->unique(['mission_attempt_id', 'mission_id']);
            $table->foreign('mission_attempt_id')->references('mission_attempt_id')->on('mission_attempts');
            $table->foreign('mission_id')->references('mission_id')->on('missions');
        });

        Schema::create('reflection_attempts', function (Blueprint $table) {
            $table->bigInteger('reflection_attempt_id', true);
            $table->bigInteger('child_id');
            $table->string('story_id', 20);
            $table->integer('attempt_number');
            $table->integer('reflection_progress')->comment('Progress pengerjaan dalam persen');
            $table->enum('status', ['progress', 'completed']);
            $table->dateTime('started_at');
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('updated_at');

            $table->unique(['child_id', 'story_id', 'attempt_number']);
            $table->foreign('child_id')->references('child_id')->on('children');
            $table->foreign('story_id')->references('story_id')->on('stories');
        });

        Schema::create('reflection_answers', function (Blueprint $table) {
            $table->bigInteger('reflection_answer_id', true);
            $table->bigInteger('reflection_attempt_id');
            $table->bigInteger('reflection_id');
            $table->boolean('answer')->comment('true = Iya, false = Tidak');
            $table->dateTime('answered_at');
            $table->dateTime('updated_at');

            $table->unique(['reflection_attempt_id', 'reflection_id']);
            $table->foreign('reflection_attempt_id')->references('reflection_attempt_id')->on('reflection_attempts');
            $table->foreign('reflection_id')->references('reflection_id')->on('reflections');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reflection_answers');
        Schema::dropIfExists('reflection_attempts');
        Schema::dropIfExists('mission_answers');
        Schema::dropIfExists('mission_attempts');
        Schema::dropIfExists('story_progress');
        Schema::dropIfExists('child_badges');
        Schema::dropIfExists('children');
        Schema::dropIfExists('badges');
        Schema::dropIfExists('reflections');
        Schema::dropIfExists('missions');
        Schema::dropIfExists('story_pages');
        Schema::dropIfExists('stories');
    }
};
