<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputRuda;
class InputRudaController extends Controller
{
    public function index()
    {
       return InputRuda::all();
    }
}
