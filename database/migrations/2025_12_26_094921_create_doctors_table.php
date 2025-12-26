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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('name_en');
            $table->string('name_ar')->nullable();

            $table->string('academic_title_en');
            $table->string('academic_title_ar');

            $table->string('main_speciality_en');
            $table->string('main_speciality_ar');

            $table->text('bio_en')->nullable();
            $table->text('bio_ar')->nullable();

            $table->text('experiences_en')->nullable();
            $table->text('experiences_ar')->nullable();

            $table->text('qualifications_en')->nullable();
            $table->text('qualifications_ar')->nullable();

            $table->tinyInteger('status')
                ->default(1)
                ->comment('1 = active, 0 = inactive');
            $table->tinyInteger('is_deleted')
                ->default(0)
                ->comment('0 = not_deleted , 1 = deleted');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
