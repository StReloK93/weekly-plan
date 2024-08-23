<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drilling;
class DrillingController extends Controller
{
    public function index()
    {
        return Drilling::with(['type'])->get();
    }

    public function store(Request $request)
    {
        $drilling = Drilling::create($request->all());
        $drilling->type;
        return $drilling;
    }

    public function show($id)
    {
        return Drilling::find($id);
    }

    public function update(Request $request, $id)
    {

        $drilling = Drilling::find($id);
        $drilling->garage_number = $request->garage_number;
        $drilling->drilling_type_id = $request->drilling_type_id;
        $drilling->save();
        $drilling->type;
        return $drilling;
    }

    public function destroy($id)
    {
        $drilling = Drilling::find($id);
        return $drilling->delete();
    }
}
