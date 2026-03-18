<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lesson_contents', function (Blueprint $table) {
            Schema::table('lesson_contents', function (Blueprint $table) {
                $table->string('unit_title')->nullable()->after('course_id');   // e.g. "Unit 4: Possessions"
                $table->integer('unit_order')->nullable()->after('unit_title'); // e.g. 4
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lesson_contents', function (Blueprint $table) {
            //
        });
    }
};
