<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Drilling;
class DrillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Drilling::insert([
            [ 'drilling_type_id' => 1, 'garage_number' => 2],
            [ 'drilling_type_id' => 1, 'garage_number' => 3],
            [ 'drilling_type_id' => 1, 'garage_number' => 7],
            [ 'drilling_type_id' => 1, 'garage_number' => 10],
            [ 'drilling_type_id' => 1, 'garage_number' => 11],
            [ 'drilling_type_id' => 1, 'garage_number' => 93],
            [ 'drilling_type_id' => 1, 'garage_number' => 94],
            [ 'drilling_type_id' => 1, 'garage_number' => 95],
            [ 'drilling_type_id' => 1, 'garage_number' => 96],
            [ 'drilling_type_id' => 1, 'garage_number' => 97],

            [ 'drilling_type_id' => 2, 'garage_number' => 12],
            [ 'drilling_type_id' => 2, 'garage_number' => 17],

            [ 'drilling_type_id' => 3, 'garage_number' => 21],
            [ 'drilling_type_id' => 3, 'garage_number' => 28],
            [ 'drilling_type_id' => 3, 'garage_number' => 29],
            [ 'drilling_type_id' => 3, 'garage_number' => 30],
            [ 'drilling_type_id' => 3, 'garage_number' => 31],

            [ 'drilling_type_id' => 4, 'garage_number' => 12],
            [ 'drilling_type_id' => 4, 'garage_number' => 13],

            [ 'drilling_type_id' => 5, 'garage_number' => 22],
            [ 'drilling_type_id' => 5, 'garage_number' => 23],
            [ 'drilling_type_id' => 5, 'garage_number' => 24],
            [ 'drilling_type_id' => 5, 'garage_number' => 25],
            [ 'drilling_type_id' => 5, 'garage_number' => 26],
            [ 'drilling_type_id' => 5, 'garage_number' => 27],

        ]);
    }
}
