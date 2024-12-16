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
        Schema::create('explosions', function (Blueprint $table) {
            $table->id();
            $table->integer('career_id')->nullable();
            $table->date('day');
            $table->integer('number');
            $table->timestamps(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explosions');
    }
};
