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
        $truckType->bucket_volume = $request->bucket_volume;
        $truckType->easy_procent = $request->easy_procent;
        $truckType->normal_procent = $request->normal_procent;
        $truckType->hard_procent = $request->hard_procent;
        $truckType->easy_time = $request->easy_time;
        $truckType->normal_time = $request->normal_time;
        $truckType->hard_time = $request->hard_time;
        $truckType->count_bucket = $request->count_bucket;
        $truckType->save();

        return $truckType;
    }

    public function destroy($id){
        $truckType = ExcavatorType::find($id);
        return $truckType->delete();
    }
}
