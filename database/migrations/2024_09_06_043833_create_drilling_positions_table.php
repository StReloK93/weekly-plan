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
        Schema::create('drilling_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('drilling_id');
            $table->date('day');
            $table->integer('career_id')->nullable();
            $table->integer('change');
            $table->timestamps();


            $table->unique(['drilling_id', 'day', 'change']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drilling_positions');
    }
};
