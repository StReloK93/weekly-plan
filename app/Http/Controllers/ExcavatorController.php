<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Excavator;
class ExcavatorController extends Controller
{
    public function index()
    {
        return Excavator::with(['type'])->orderByRaw('CONVERT(garage_number, SIGNED) asc')->get();
    }

    public function store(Request $request)
    {
        $excavator = Excavator::create($request->all());
        $excavator->type;
        return $excavator;
    }

    public function show($id)
    {
        return Excavator::find($id);
    }

    public function update(Request $request, $id)
    {

        $excavator = Excavator::find($id);
        $excavator->garage_number = $request->garage_number;
        $excavator->excavator_type_id = $request->excavator_type_id;
        $excavator->save();
        $excavator->type;
        return $excavator;
    }

    public function destroy($id)
    {
        $truckType = Excavator::find($id);
        return $truckType->delete();
    }
}
