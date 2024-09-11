<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;
class MovementController extends Controller
{
    public function index($type)
    {
        return Movement::where('type', $type)->get();
    }


    public function update(Request $request, $type)
    {
        $formData = $request->all();

        foreach ($formData as $key => $item) {
            list($x, $y) = explode('_', $key);

            Movement::updateOrCreate([
                'x_career_id' => (int) $x,
                'y_career_id' => (int) $y,
                'type' => $type,
            ], [
                'count' => $item
            ]);
        }

        return true;

    }

}
