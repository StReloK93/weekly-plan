<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckType;

class TruckTypeController extends Controller
{
    public function index(){
        return TruckType::all();
    }

    public function store(Request $request){
        return TruckType::create($request->all());
    }

    public function show($id){
        return TruckType::find($id);
    }

    public function update(Request $request, $id){

        $truckType = TruckType::find($id);
        $truckType->name = $request->name;
        $truckType->tonnage = $request->tonnage;
        $truckType->save();

        return $truckType;
    }

    public function destroy($id){
        $truckType = TruckType::find($id);
        return $truckType->delete();
    }
}
