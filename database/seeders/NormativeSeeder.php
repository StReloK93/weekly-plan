<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Normative;
class NormativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Normative::create([
            'obed_po' =>  null,
            'eto_po' =>  null,
            'peresmenka_po' =>  0.5,
            'techno_pereriv_po' =>  0.2,

            'techno_pereriv_ac' =>  0.8,
            'zapravka_ac' =>  0.3,
            'obed_ac' =>  0.2,
            'peresmenka_ac' =>  0.2,
            'rezerv_ac' =>  1.7,
            'vzriv_ac' =>  0.5,

            'speed_ac' =>  20,
            'install_ac' =>  0.5,
            'download_ac' =>  0.5,
            'waiting_ac' =>  0.4,


            'gruz_ac' =>  91,
            'full_bort_ac' =>  93,
        ]);
    }
}
