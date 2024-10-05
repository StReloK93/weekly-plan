<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InputTypematerial;
use App\Models\InputRuda;
class TypematerialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputTypematerial::insert([
            [ 'name' => 'ГПР'],
            [ 'name' => 'Вскрыша'],
            [ 'name' => 'Вскрыша+Руда'],
        ]);

        InputRuda::insert([
            [ 'name' => 'Факт'],
            [ 'name' => 'Руда'],
        ]);
    }
}
