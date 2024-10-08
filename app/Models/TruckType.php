<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'tonnage',
        'volume_mass_ruda',
        'volume_mass_top',
    ];
}
