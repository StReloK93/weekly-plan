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
        Schema::create('drilling_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('speed_per_min', 8, 2);
            $table->decimal('install', 8, 2);
            $table->double('move', 8, 2);
            $table->double('up_down_mast', 8, 2);
            $table->double('montage', 8, 2);
            $table->double('drilling', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drilling_types');
    }
};
