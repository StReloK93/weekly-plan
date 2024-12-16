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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->integer(column: 'horizon_id');
            $table->date('day');
            $table->decimal('first', 8, 2)->nullable();
            $table->decimal('second', 8, 2)->nullable();
            $table->timestamps(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
