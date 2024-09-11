<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcavatorFact;
class ExcavatorFactController extends Controller
{

    public function index(Request $request)
    {
        return ExcavatorFact::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }


    public function factUpdate(Request $request)
    {

        return ExcavatorFact::updateOrCreate([
            'excavator_id' => $request->excavator_id,
            'day' => $request->day,
        ], [
            'fact' => $request->fact
        ]);
    }

    public function planUpdate(Request $request)
    {
        return ExcavatorFact::updateOrCreate([
            'excavator_id' => $request->excavator_id,
            'day' => $request->day,
        ], [
            'plan' => $request->plan
        ]);
    }
}
