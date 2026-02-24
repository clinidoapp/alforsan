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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

            // Mission
            $table->text('mission_en')->nullable();
            $table->text('mission_ar')->nullable();

            // Vision
            $table->text('vision_en')->nullable();
            $table->text('vision_ar')->nullable();

            // Our Story
            $table->longText('our_story_en')->nullable();
            $table->longText('our_story_ar')->nullable();
            $table->longText('recovery_count')->nullable();
            $table->longText('doctors_count')->nullable();
            $table->longText('experience_years')->nullable();

            // Value 1
            $table->string('value1_title_en')->nullable();
            $table->string('value1_title_ar')->nullable();
            $table->text('value1_desc_en')->nullable();
            $table->text('value1_desc_ar')->nullable();

            // Value 2
            $table->string('value2_title_en')->nullable();
            $table->string('value2_title_ar')->nullable();
            $table->text('value2_desc_en')->nullable();
            $table->text('value2_desc_ar')->nullable();

             // Value 3
            $table->string('value3_title_en')->nullable();
            $table->string('value3_title_ar')->nullable();
            $table->text('value3_desc_en')->nullable();
            $table->text('value3_desc_ar')->nullable();

             // Value 4
            $table->string('value4_title_en')->nullable();
            $table->string('value4_title_ar')->nullable();
            $table->text('value4_desc_en')->nullable();
            $table->text('value4_desc_ar')->nullable();

             // Value 5
            $table->string('value5_title_en')->nullable();
            $table->string('value5_title_ar')->nullable();
            $table->text('value5_desc_en')->nullable();
            $table->text('value5_desc_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
