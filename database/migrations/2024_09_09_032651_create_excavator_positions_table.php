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
        Schema::create('excavator_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('excavator_id');
            $table->date('day');
            $table->integer('career_id')->nullable();
            $table->integer('change');
            $table->integer('download')->nullable();
            $table->integer('type_material')->nullable();
            $table->integer('distance')->nullable();
            $table->timestamps();


            $table->unique(['excavator_id', 'day', 'change']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excavator_positions');
    }
};
