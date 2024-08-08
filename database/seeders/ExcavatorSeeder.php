<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Excavator;
class ExcavatorSeeder extends Seeder
{
    public function run(): void
    {
        Excavator::insert([
            // ЭКГ-5А
            [ 'excavator_type_id' => 1, 'garage_number' => 4],
            [ 'excavator_type_id' => 1, 'garage_number' => 5],
            [ 'excavator_type_id' => 1, 'garage_number' => 11],
            [ 'excavator_type_id' => 1, 'garage_number' => 15],
            [ 'excavator_type_id' => 1, 'garage_number' => 16],
            [ 'excavator_type_id' => 1, 'garage_number' => 18],
            [ 'excavator_type_id' => 1, 'garage_number' => 20],
            [ 'excavator_type_id' => 1, 'garage_number' => 24],


            // Hitachi-1200/7
            [ 'excavator_type_id' => 2, 'garage_number' => 17],
            [ 'excavator_type_id' => 2, 'garage_number' => 19],
            [ 'excavator_type_id' => 2, 'garage_number' => 42],
            [ 'excavator_type_id' => 2, 'garage_number' => 44],
            [ 'excavator_type_id' => 2, 'garage_number' => 45],
            [ 'excavator_type_id' => 2, 'garage_number' => 54],

            // ЭКГ-10
            [ 'excavator_type_id' => 3, 'garage_number' => 23],
            [ 'excavator_type_id' => 3, 'garage_number' => 26],
            [ 'excavator_type_id' => 3, 'garage_number' => 33],
            [ 'excavator_type_id' => 3, 'garage_number' => 40],
            [ 'excavator_type_id' => 3, 'garage_number' => 46],
            [ 'excavator_type_id' => 3, 'garage_number' => 48],

            // Liebher
            [ 'excavator_type_id' => 4, 'garage_number' => 56],
            [ 'excavator_type_id' => 4, 'garage_number' => 57],

            // FRONTAL CAT 700
            [ 'excavator_type_id' => 5, 'garage_number' => 43],
            [ 'excavator_type_id' => 5, 'garage_number' => 45],
            [ 'excavator_type_id' => 5, 'garage_number' => 50],
            [ 'excavator_type_id' => 5, 'garage_number' => 51],
            [ 'excavator_type_id' => 5, 'garage_number' => 41],
            [ 'excavator_type_id' => 5, 'garage_number' => 238],

        ]);
    }
}
