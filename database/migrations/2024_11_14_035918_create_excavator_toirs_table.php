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
        Schema::create('excavator_toirs', function (Blueprint $table) {
            $table->id();
            $table->integer('excavator_id');
            $table->date('day');
            $table->integer('value')->nullable();
            $table->integer('change');
            $table->timestamps(3);

            $table->unique(['excavator_id', 'day', 'change']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excavator_toirs');
    }
};
