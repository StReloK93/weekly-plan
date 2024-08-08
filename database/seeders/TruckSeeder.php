<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // верхний 3
        // средний 2
        // нижний 1


        $trucks = [
            ['truck_type_id' => 1, 'garage_number' => 500, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 503, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 506, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 507, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 510, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 544, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 552, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 559, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 560, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 561, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 562, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 563, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 564, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 566, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 567, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 568, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 569, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 570, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 571, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 572, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 573, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 574, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 575, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 576, 'ability' => 2],
            ['truck_type_id' => 4, 'garage_number' => 577, 'ability' => 2],
            ['truck_type_id' => 4, 'garage_number' => 578, 'ability' => 2],
            ['truck_type_id' => 4, 'garage_number' => 579, 'ability' => 2],
            ['truck_type_id' => 3, 'garage_number' => 580, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 581, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 582, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 583, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 584, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 585, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 586, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 587, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 588, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 589, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 590, 'ability' => 1],
            ['truck_type_id' => 1, 'garage_number' => 602, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 604, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 610, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 611, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 612, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 614, 'ability' => 2],
            ['truck_type_id' => 1, 'garage_number' => 615, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 616, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 659, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 661, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 662, 'ability' => 3],
            ['truck_type_id' => 1, 'garage_number' => 664, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 667, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 668, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 669, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 670, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 671, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 673, 'ability' => 2],
            ['truck_type_id' => 2, 'garage_number' => 676, 'ability' => 3],
            ['truck_type_id' => 2, 'garage_number' => 677, 'ability' => 2],
            ['truck_type_id' => 4, 'garage_number' => 678, 'ability' => 2],
            ['truck_type_id' => 4, 'garage_number' => 679, 'ability' => 2],
            ['truck_type_id' => 4, 'garage_number' => 680, 'ability' => 2],
            ['truck_type_id' => 3, 'garage_number' => 681, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 682, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 683, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 684, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 685, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 686, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 687, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 688, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 689, 'ability' => 1],
            ['truck_type_id' => 3, 'garage_number' => 690, 'ability' => 1]
        ];

        Truck::insert($trucks);

    }
}
