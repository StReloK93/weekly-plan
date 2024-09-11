<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Explosion;
class ExplosionController extends Controller
{
    public function index(Request $request)
    {
        return Explosion::whereBetween('day', [$request->startDay, $request->endDay])->get();
    }

    public function update(Request $request)
    {

        return Explosion::updateOrCreate([
            'number' => $request->number,
            'day' => $request->day,
        ], [
            'career_id' => $request->career_id
        ]);
    }
}
