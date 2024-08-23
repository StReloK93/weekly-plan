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
        Schema::create('normatives', function (Blueprint $table) {
            $table->id();
            $table->double('obed_po', 6, 2)->nullable();
            $table->double('eto_po', 6, 2)->nullable();
            $table->double('peresmenka_po', 6, 2)->nullable();
            $table->double('techno_pereriv_po', 6, 2)->nullable();

            $table->double('techno_pereriv_ac', 6, 2)->nullable();
            $table->double('zapravka_ac', 6, 2)->nullable();
            $table->double('obed_ac', 6, 2)->nullable();
            $table->double('peresmenka_ac', 6, 2)->nullable();
            $table->double('rezerv_ac', 6, 2)->nullable();
            $table->double('vzriv_ac', 6, 2)->nullable();

            $table->double('speed_ac', 6, 2)->nullable();
            $table->double('install_ac', 6, 2)->nullable();
            $table->double('download_ac', 6, 2)->nullable();
            $table->double('waiting_ac', 6, 2)->nullable();

            $table->double('gruz_ac', 6, 2)->nullable();
            $table->double('full_bort_ac', 6, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normatives');
    }
};
