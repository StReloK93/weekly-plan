<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrillingType;
class DrillingTypeController extends Controller
{
   public function index()
   {
      return DrillingType::all();
   }

   public function store(Request $request)
   {
      return DrillingType::create($request->all());
   }

   public function show($id)
   {
      return DrillingType::find($id);
   }

   public function update(Request $request, $id)
   {

      $instance = DrillingType::find($id);
      $instance->name = $request->name;
      $instance->speed_per_min = $request->speed_per_min;
      $instance->install = $request->install;
      $instance->move = $request->move;
      $instance->up_down_mast = $request->up_down_mast;
      $instance->montage = $request->montage;
      $instance->drilling = $request->drilling;
      $instance->save();

      return $instance;
   }

   public function destroy($id)
   {
      $drilling = DrillingType::find($id);
      return $drilling->delete();
   }
}
