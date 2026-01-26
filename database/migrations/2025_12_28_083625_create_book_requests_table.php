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
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();

            $table->foreignId('service_id')
                ->constrained('services')
                ->nullOnDelete();
            $table->text('notes')->nullable();

            $table->tinyInteger('status')
                ->default(0)
                ->comment('0=pending, 1=approved, 2=cancelled, 3=completed');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_requests');
    }
};
