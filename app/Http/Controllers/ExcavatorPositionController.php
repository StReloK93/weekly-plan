<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcavatorPosition;
class ExcavatorPositionController extends Controller
{
    public function index(Request $request)
    {
        return ExcavatorPosition::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {
        return ExcavatorPosition::updateOrCreate([
            'excavator_id' => $request->excavator_id,
            'day' => $request->day,
            'change' => $request->change,
        ], [
            'career_id' => $request->career_id,
            'download' => $request->download,
            'type_material' => $request->type_material,
            'distance' => $request->distance,
        ]);
    }


    public function updateMassa(Request $request)
    {
        return ExcavatorPosition::updateOrCreate([
            'excavator_id' => $request->excavator_id,
            'day' => $request->day,
            'change' => $request->change,
        ], [
            'massa' => $request->massa,
        ]);
    }
}
