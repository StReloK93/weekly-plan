<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcavatorToir;
class ExcavatorToirController extends Controller
{
    public function index(Request $request)
    {
        return ExcavatorToir::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {

        return ExcavatorToir::updateOrCreate([
            'excavator_id' => $request->excavator_id,
            'day' => $request->day,
            'change' => $request->change,
        ], [
            'value' => $request->value
        ]);
    }
}
