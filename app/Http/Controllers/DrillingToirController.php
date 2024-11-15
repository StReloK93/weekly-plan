<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrillingToir;
class DrillingToirController extends Controller
{
    public function index(Request $request)
    {
        return DrillingToir::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {

        return DrillingToir::updateOrCreate([
            'drilling_id' => $request->drilling_id,
            'day' => $request->day,
            'change' => $request->change,
        ], [
            'value' => $request->value
        ]);
    }
}
