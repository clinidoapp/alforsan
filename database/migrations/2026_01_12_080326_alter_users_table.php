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
        Schema::table('users', function (Blueprint $table) {

            $table->tinyInteger('status')->after('password')
                ->default(1)
                ->comment('1 = active, 0 = inactive');

            $table->tinyInteger('is_deleted')->after('password')
                ->default(0)
                ->comment('0 = not_deleted , 1 = deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
