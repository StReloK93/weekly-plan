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
                'pm_in_hour' => 14.1,
                'install' => 1.0,
                'move' => 2.5,
                'timing' => 1.91,
                'up_down_mast' => 1.2,
                'montage' => 19.3,
                'drilling' => 11.5,
            ],
            [
                'name' => 'ROC-L6',
                'speed_per_min' => 3.5,
                'pm_in_hour' => 17.3,
                'install' => '0.4',
                'move' => 1.8,
                'timing' => 1.17,
                'up_down_mast' => 0.2,
                'montage' => 1.6,
                'drilling' => 7.6,
            ],
            [
                'name' => 'Epiroc-ROC D55',
                'speed_per_min' => 3.5,
                'pm_in_hour' => 17.3,
                'install' => '0.4',
                'move' => 1.8,
                'timing' => 1.17,
                'up_down_mast' => 0.2,
                'montage' => 1.6,
                'drilling' => 7.6,
            ],
            [
                'name' => 'СБУ-125',
                'speed_per_min' => 8.1,
                'pm_in_hour' => 7.4,
                'install' => 1,
                'move' => 2.5,
                'timing' => 1.91,
                'up_down_mast' => 0.2,
                'montage' => 1.6,
                'drilling' => 7.6,
            ],
            [
                'name' => 'Sandvik DI550',
                'speed_per_min' => 3.7,
                'pm_in_hour' => 16.3,
                'install' => 1.7,
                'move' => 1.6,
                'timing' => 1.27,
                'up_down_mast' => 0.6,
                'montage' => 1.8,
                'drilling' => 7.6,
            ],
        ]);
    }
}
