<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horizon;
class HorizonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Horizon::insert([
            ['career_id' => 3, 'code' => 240, 'level' => 1],
            ['career_id' => 6, 'code' => 245, 'level' => 2],
            ['career_id' => 2, 'code' => 250, 'level' => 3],
            ['career_id' => 3, 'code' => 245, 'level' => 2],
            ['career_id' => 3, 'code' => 250, 'level' => 2],
            ['career_id' => 4, 'code' => 250, 'level' => 2],
            ['career_id' => 4, 'code' => 240, 'level' => 1],
            ['career_id' => 4, 'code' => 245, 'level' => 3],
        ]);
    }
}
