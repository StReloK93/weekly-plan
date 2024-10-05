<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            TruckTypeSeeder::class,
            TruckSeeder::class,
            ExcavatorTypeSeeder::class,
            ExcavatorSeeder::class,
            DrillingTypeSeeder::class,
            DrillingSeeder::class,
            TruckAbilitySeeder::class,
            NormativeSeeder::class,
            CareerSeeder::class,
            TypematerialSeeder::class,
            HorizonSeeder::class,


            ExcavatorFactSeeder::class,
            ExcavatorPositionSeeder::class,
            DrillingPositionSeeder::class,
            TimetableSeeder::class,
            ExplosionSeeder::class,
        ]);
    }
}
