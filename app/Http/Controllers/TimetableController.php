<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
class TimetableController extends Controller
{
    public function index(Request $request)
    {
        return Timetable::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {
        return Timetable::updateOrCreate([
            'horizon_id' => $request->horizon_id,
            'day' => $request->day,
        ], [
            'first' => $request->first,
            'second' => $request->second,
        ]);
    }
}
