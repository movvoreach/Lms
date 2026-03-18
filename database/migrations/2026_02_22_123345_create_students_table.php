<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('student_id', 50)->unique();  // STD-001
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('course')->nullable();
            $table->string('class_batch')->nullable();
            $table->date('dob')->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('address')->nullable();
            $table->string('profile_image')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
