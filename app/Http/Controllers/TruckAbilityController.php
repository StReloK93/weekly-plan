<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckAbility;
class TruckAbilityController extends Controller
{
    public function index(){
        return TruckAbility::all();
    }
}
