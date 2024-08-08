<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'truck_type_id',
        'garage_number',
        'ability',
    ];
}
