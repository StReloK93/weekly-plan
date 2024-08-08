<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TruckType;
class TruckTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TruckType::insert([
            [ 'name' => 'Белаз 7555B','tonnage' => 55 ],
            [ 'name' => 'Белаз 7558','tonnage' => 90 ],
            [ 'name' => 'HD-785','tonnage' => 91 ],
            [ 'name' => 'CAT-777','tonnage' => 92 ],
        ]);
    }
}
