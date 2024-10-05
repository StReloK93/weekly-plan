<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputTypematerial;
class InputTypematerialController extends Controller
{
    public function index()
    {
       return InputTypematerial::all();
    }
}
