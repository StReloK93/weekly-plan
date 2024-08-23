<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horizon;
class HorizonController extends Controller
{
    public function index()
    {
        return Horizon::with(['career'])->get();
    }

    public function store(Request $request)
    {
        $instance = Horizon::create($request->all());
        $instance->career;
        return $instance;
    }

    public function show($id)
    {
        return Horizon::find($id);
    }

    public function update(Request $request, $id)
    {
        $instance = Horizon::find($id);
        $instance->career_id = $request->career_id;
        $instance->code = $request->code;
        $instance->level = $request->level;
        $instance->save();


        $instance->career;
        return $instance;
    }

    public function destroy($id)
    {
        Horizon::find($id)->delete();
        return true;
    }
}
