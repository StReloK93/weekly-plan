<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;



    protected $fillable = [
        'horizon_id',
        'day',
        'first',
        'second'
    ];


    protected $casts = [
        'first' => 'float',
        'second' => 'float',
    ];
}
