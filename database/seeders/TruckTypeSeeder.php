<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TruckType;
class TruckTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TruckType::insert([
            [ 
                'name' => 'Белаз 7555B',
                'tonnage' => 55,
                'volume_mass_ruda' => 3,
                'volume_mass_top' => 2.7,
            ],
            [ 
                'name' => 'Белаз 7558',
                'tonnage' => 90,
                'volume_mass_ruda' => 3,
                'volume_mass_top' => 2.7,
            ],
            [ 
                'name' => 'HD-785',
                'tonnage' => 91,
                'volume_mass_ruda' => 3,
                'volume_mass_top' => 2.7,
            ],
            [
                'name' => 'CAT-777',
                'tonnage' => 92,
                'volume_mass_ruda' => 3,
                'volume_mass_top' => 2.7,
            ],
        ]);
    }
}
