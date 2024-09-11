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
        Schema::create('excavator_facts', function (Blueprint $table) {
            $table->id();
            $table->double('excavator_id', 8, 2);
            $table->date('day');
            $table->double('plan', 8, 2)->nullable();
            $table->double('fact', 8, 2)->nullable();
            $table->timestamps();
            
            $table->unique(['day', 'excavator_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excavator_facts');
    }
};
