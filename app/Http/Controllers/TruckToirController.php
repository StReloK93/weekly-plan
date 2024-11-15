<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckToir;
class TruckToirController extends Controller
{
    public function index(Request $request)
    {
        return TruckToir::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {

        return TruckToir::updateOrCreate([
            'truck_id' => $request->truck_id,
            'day' => $request->day,
            'change' => $request->change,
        ], [
            'value' => $request->value
        ]);
    }
}
