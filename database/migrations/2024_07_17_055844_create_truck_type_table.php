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
        Schema::create('truck_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('tonnage');
            $table->decimal('volume_mass_ruda', 8, 2)->nullable();
            $table->decimal('volume_mass_top', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_types');
    }
};
