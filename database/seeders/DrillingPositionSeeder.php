<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\DateHelper;
use App\Models\Drilling;
use App\Models\Horizon;
use App\Models\DrillingPosition;
class DrillingPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = DateHelper::getCurrentWeekDays();
        //
        $drilling_ids = Drilling::all()->pluck('id');

        $facts = [];

        foreach ($drilling_ids as $key => $drilling_id) {
            $randomHorizon = Horizon::inRandomOrder()->first();
            
            foreach ($days as $key => $day) {

                DrillingPosition::insert([
                    'drilling_id' => $drilling_id,
                    'day' => $day,
                    'career_id' => $randomHorizon->id,
                    'change' => 1,
                ]);
                DrillingPosition::insert([
                    'drilling_id' => $drilling_id,
                    'day' => $day,
                    'career_id' => $randomHorizon->id,
                    'change' => 2,
                ]);

            }
        }

    }
}
