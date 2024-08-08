<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcavatorType;
class ExcavatorTypeController extends Controller
{
    public function index(){
        return ExcavatorType::all();
    }

    public function store(Request $request){
        return ExcavatorType::create($request->all());
    }

    public function show($id){
        return ExcavatorType::find($id);
    }

    public function update(Request $request, $id){

        $truckType = ExcavatorType::find($id);
        $truckType->name = $request->name;
        $truckType->tonnage = $request->tonnage;
        $truckType->save();

        return $truckType;
    }

    public function destroy($id){
        $truckType = ExcavatorType::find($id);
        return $truckType->delete();
    }
}
