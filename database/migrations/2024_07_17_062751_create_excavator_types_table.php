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
        Schema::create('excavator_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('bucket_volume', 8, 2);
            $table->decimal('normal_procent', 8, 2);
            $table->decimal('easy_procent', 8, 2);
            $table->decimal('hard_procent', 8, 2);
            $table->decimal('full_time_ac', 8, 2);
            $table->integer('normal_time')->nullable();
            $table->integer('easy_time')->nullable();
            $table->integer('hard_time')->nullable();
            $table->integer('count_bucket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excavator_types');
    }
};
