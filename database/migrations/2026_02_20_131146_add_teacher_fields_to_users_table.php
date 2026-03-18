<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('teacher_id')->nullable()->after('id');
            $table->string('phone')->nullable()->after('email');
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->string('skills')->nullable();
            $table->string('avatar')->nullable();
            $table->text('note')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'teacher_id',
                'phone',
                'education',
                'experience',
                'skills',
                'avatar',
                'note'
            ]);

        });
    }
};
