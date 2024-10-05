<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExcavatorType;

class ExcavatorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExcavatorType::insert([
            [
                'name' => 'ЭКГ-5А',
                'bucket_volume' => 5.00,
                'normal_procent' => 0.90,
                'easy_procent' => 1.01,
                'hard_procent' => 0.85,
                'normal_time' => 30,
                'easy_time' => 30,
                'hard_time' => 43,
                'count_bucket' => 12,
                'full_time_ac' => 5.7,
            ],
            [
                'name' => 'Hitachi-1200/6',
                'bucket_volume' => 5.90,
                'normal_procent' => 0.80,
                'easy_procent' => 1.01,
                'hard_procent' => 0.55,
                'normal_time' => 30,
                'easy_time' => 30,
                'hard_time' => 36,
                'count_bucket' => 12,
                'full_time_ac' => 5,
            ],
            [
                'name' => 'ЭКГ-10',
                'bucket_volume' => 10.00,
                'normal_procent' => 0.90,
                'easy_procent' => 1.01,
                'hard_procent' => 0.70,
                'normal_time' => 30,
                'easy_time' => 30,
                'hard_time' => 43,
                'count_bucket' => 7,
                'full_time_ac' => 3.2,
            ],
            [
                'name' => 'Liebher',
                'bucket_volume' => 7.00,
                'normal_procent' => 0.80,
                'easy_procent' => 1.01,
                'hard_procent' => 0.55,
                'normal_time' => 30,
                'easy_time' => 30,
                'hard_time' => 36,
                'count_bucket' => 10,
                'full_time_ac' => 5,
            ],
            [
                'name' => 'ФРП CAT 700',
                'bucket_volume' => 10.00,
                'normal_procent' => 0.90,
                'easy_procent' => 1.01,
                'hard_procent' => 0.70,
                'normal_time' => 30,
                'easy_time' => 30,
                'hard_time' => 43,
                'count_bucket' => 10,
                'full_time_ac' => 6,
            ],
        ]);
    }
}
