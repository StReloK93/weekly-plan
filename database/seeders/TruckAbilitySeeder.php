<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TruckAbility;
class TruckAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TruckAbility::insert([
            ["name"=> "lower"],
            ["name"=> "middle"],
            ["name"=> "upper"],
        ]);
    }
}
