<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section');          // about, programs, clubs, schedule, events, achievements, faqs, instructors, values, features, testimonials
            $table->string('key')->nullable();   // unique identifier within a section (e.g. 'tiny-warriors', 'nyeri-main-dojo')
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable(); // path in storage
            $table->string('icon')->nullable();  // emoji or svg reference
            $table->json('extra')->nullable();   // flexible JSON for section-specific fields (age_range, time, location, color, etc.)
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_archived')->default(false);
            $table->timestamps();

            $table->index(['section', 'is_archived', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
