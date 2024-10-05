<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Excavator;
use App\Models\ExcavatorFact;
use App\Modules\DateHelper;
class ExcavatorFactSeeder extends Seeder
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
            $randomPlan = DateHelper::getRandomMidlle(3, 10, 2);
            foreach ($days as $key => $day) {
                $prosent = rand(60, 125);
                $randomFact = ($randomPlan/100) * $prosent;
                $facts[] = [
                    'excavator_id' => $excavator_id,
                    'day' => $day,
                    'plan' => $randomPlan,
                    'fact' => $randomFact,
                ];
            }
        }

        ExcavatorFact::insert($facts);
    }
}
