<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;


class TruckController extends Controller
{
    public function index(){
        return Truck::all();
    }

    public function store(Request $request){
        return Truck::create($request->all());
    }

    public function show($id){
        return Truck::find($id);
    }

    public function update(Request $request, $id){

        $truck = Truck::find($id);
        $truck->truck_type_id = $request->truck_type_id;
        $truck->garage_number = $request->garage_number;
        $truck->ability = $request->ability;
        $truck->save();

        return $truck;
    }

    public function destroy($id){
        $truck = Truck::find($id);
        return $truck->delete();
    }
}
