<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Explosion;
use App\Modules\DateHelper;
use App\Models\Horizon;
class ExplosionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = DateHelper::getCurrentWeekDays();
        $data = [];
        
        foreach ($days as $key => $day) {
            
            $horizon_ids = Horizon::inRandomOrder()->take(rand(2,5))->get()->pluck('id');
            foreach ($horizon_ids as $key => $horizon_id) {
                $data[] = [
                    'career_id' => $horizon_id,
                    'day' => $day,
                    'number'=> $key + 1,
                ];
            }
        }

        Explosion::insert($data);
    }
}
