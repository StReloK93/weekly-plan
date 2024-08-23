<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
class CareerController extends Controller
{
    public function index()
    {
        return Career::get();
    }

    public function store(Request $request)
    {
        $instance = Career::create($request->all());
        return $instance;
    }

    public function show($id)
    {
        return Career::find($id);
    }

    public function update(Request $request, $id)
    {
        $instance = Career::find($id);
        $instance->name = $request->name;
        $instance->shortname = $request->shortname;
        $instance->save();
        return $instance;
    }

    public function destroy($id)
    {
        Career::find($id)->delete();
        return true;
    }
}
