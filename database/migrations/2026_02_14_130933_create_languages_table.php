<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {

            $table->id();

            // Language name (English, Khmer, Chinese...)
            $table->string('name', 100);

            // ISO code (en, km, zh, fr...)
            $table->string('code', 10)->unique();

            // Flag emoji or image path (🇰🇭 or flag/km.png)
            $table->string('flag', 50)->nullable();

            // Text direction (ltr / rtl)
            $table->enum('direction', ['ltr', 'rtl'])->default('ltr');

            // Is default language?
            $table->boolean('is_default')->default(false);

            // Is language active?
            $table->boolean('is_active')->default(true);

            // Display order in admin
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('code');
            $table->index('is_default');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
