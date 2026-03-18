<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lesson_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id'); // no FK

            $table->string('lesson_title');
            $table->enum('content_type', ['text','video','file']);
            $table->integer('lesson_order')->nullable();

            $table->text('description')->nullable();
            $table->longText('text_content')->nullable();

            $table->string('video_url')->nullable();

            $table->string('content_file_path')->nullable(); // storage path
            $table->string('content_file_name')->nullable();
            $table->string('content_file_mime')->nullable();
            $table->unsignedBigInteger('content_file_size')->nullable();

            $table->string('thumbnail_path')->nullable();

            $table->enum('status', ['active','inactive','draft'])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_contents');
    }
};
