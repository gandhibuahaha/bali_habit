<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * A child deleted by the parent is kept and marked with the deletion time
 * (soft delete). Empty = active. Parent pages hide such a child; the admin
 * still sees it as "Nonaktif".
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dateTime('deleted_at')->nullable()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
};
