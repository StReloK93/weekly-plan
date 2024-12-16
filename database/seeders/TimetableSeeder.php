<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timetable;
use App\Models\Horizon;
use App\Modules\DateHelper;
class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = DateHelper::getCurrentWeekDays();
        //
        $drilling_ids = Horizon::all()->pluck('id');

        foreach ($drilling_ids as $key => $drilling_id) {
            foreach ($days as $key => $day) {
                Timetable::insert([
                    'horizon_id' => $drilling_id,
                    'day' => $day,
                    'first' => DateHelper::getRandomMidlle(1, 6, 10),
                    'second' => DateHelper::getRandomMidlle(1, 3, 100),
                ]);
            }
        }

    }
}
