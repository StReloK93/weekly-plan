<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckToir extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_id',
        'day',
        'value',
        'change',
    ];
}
