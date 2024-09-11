<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrillingPosition;
class DrillingPositionController extends Controller
{
    public function index(Request $request)
    {
        return DrillingPosition::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {

        return DrillingPosition::updateOrCreate([
            'drilling_id' => $request->drilling_id,
            'day' => $request->day,
            'change' => $request->change,
        ], [
            'career_id' => $request->career_id
        ]);
    }
}
