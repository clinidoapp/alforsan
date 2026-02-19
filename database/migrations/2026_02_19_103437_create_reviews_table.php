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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('request_id')
                ->nullable()
                ->constrained('book_requests')
                ->nullOnDelete();

            $table->tinyInteger('rate')
                ->comment('Rate from 1 to 5');

            $table->text('comment')->nullable();

            $table->tinyInteger('status')
                ->default(0)
                ->comment('1 = published, 0 = hidden');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
