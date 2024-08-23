<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrillingType;
class DrillingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DrillingType::insert([
            [
                'name' => 'СБШ-250',
                'speed_per_min' => 4.2,
                'install' => 1.0,
                'move' => 2.5,
                'up_down_mast' => 1.2,
                'montage' => 19.3,
                'drilling' => 11.5,
            ],
            [
                'name' => 'ROC-L6',
                'speed_per_min' => 3.5,
                'install' => '0.4',
                'move' => 1.8,
                'up_down_mast' => 0.2,
                'montage' => 1.6,
                'drilling' => 7.6,
            ],
            [
                'name' => 'Epiroc-ROC D55',
                'speed_per_min' => 3.5,
                'install' => '0.4',
                'move' => 1.8,
                'up_down_mast' => 0.2,
                'montage' => 1.6,
                'drilling' => 7.6,
            ],
            [
                'name' => 'СБУ-125',
                'speed_per_min' => 8.1,
                'install' => 1,
                'move' => 2.5,
                'up_down_mast' => 0.2,
                'montage' => 1.6,
                'drilling' => 7.6,
            ],
            [
                'name' => 'Sandvik DI550',
                'speed_per_min' => 3.7,
                'install' => 1.7,
                'move' => 1.6,
                'up_down_mast' => 0.6,
                'montage' => 1.8,
                'drilling' => 7.6,
            ],
        ]);
    }
}
