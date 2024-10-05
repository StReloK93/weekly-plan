<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Excavator;
use App\Modules\DateHelper;
use App\Models\ExcavatorPosition;
use App\Models\InputTypematerial;
use App\Models\InputRuda;
use App\Models\Horizon;

class ExcavatorPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = DateHelper::getCurrentWeekDays();
        //
        $excavator_ids = Excavator::all()->pluck('id');

        $facts = [];

        foreach ($excavator_ids as $key => $excavator_id) {
            
            $randomTypeMaterial = InputTypematerial::inRandomOrder()->first();
            $randomInputRuda = InputRuda::inRandomOrder()->first();
            $randomHorizon = Horizon::inRandomOrder()->first();
            
            foreach ($days as $key => $day) {
                $randomMassa = DateHelper::getRandomMidlle(1, 6, 2);
                $randomDistance = DateHelper::getRandomMidlle(1, 3, 10);
                $facts[] = [
                    'excavator_id' => $excavator_id,
                    'day' => $day,
                    'career_id' => $randomHorizon->id,
                    'change' => 1,
                    'download' => $randomInputRuda->id,
                    'type_material' => $randomTypeMaterial->id,
                    'distance' => $randomDistance,
                    'massa' => $randomMassa * 1000,
                ];

                $facts[] = [
                    'excavator_id' => $excavator_id,
                    'day' => $day,
                    'career_id' => $randomHorizon->id,
                    'change' => 2,
                    'download' => $randomInputRuda->id,
                    'type_material' => $randomTypeMaterial->id,
                    'distance' => $randomDistance,
                    'massa' => $randomMassa * 1000,
                ];
            }
        }



        ExcavatorPosition::insert($facts);
    }
}
