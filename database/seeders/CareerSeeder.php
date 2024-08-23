<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::insert([
            [ "name"=> "Южный-1 + Юго-Восточный", 'shortname' => "Ю1ЮВ"],
            [ "name"=> "Восточный",'shortname' => "Вост"],
            [ "name"=> "Ближний-Приконтактовый", 'shortname' => "БлПр"],
            [ "name"=> "Западный 1-1", 'shortname' => "Зап11"],
            [ "name"=> "Карашахо 1 + 2-3", 'shortname' => "Кар123"],
            [ "name"=> "Карашахо 2-3", 'shortname' => "Кар23"],
            [ "name"=> "Карашахо 2-2", 'shortname' => "Кар22"],
            [ "name"=> "Западный 3-2", 'shortname' => "Зап32"],
            [ "name"=> "Западный 1-2", 'shortname' => "Зап1-2"],
            [ "name"=> "Широтный-1", 'shortname' => "Шир1"],
            [ "name"=> "Широтный-4", 'shortname' => "Шир4"],
            [ "name"=> "Южный 2-1", 'shortname' => "Ю21"],
        ]);
    }
}
