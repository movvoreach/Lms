<?php

// database/migrations/xxxx_xx_xx_create_translations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('translations', function (Blueprint $table) {
      $table->id();
      $table->string('group')->default('messages'); // messages, validation...
      $table->string('key');                        // dashboard, student_list
      $table->string('locale', 10);                 // en, kh
      $table->longText('value')->nullable();        // text
      $table->timestamps();

      $table->unique(['group','key','locale']);
      $table->index(['locale','group']);
    });
  }
  public function down(): void {
    Schema::dropIfExists('translations');
  }
};

