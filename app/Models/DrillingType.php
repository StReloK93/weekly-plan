<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrillingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speed_per_min',
        'install',
        'move',
        'up_down_mast',
        'montage',
        'drilling',
    ];

    public $timestamps = false;

    protected $casts = [
        'timing' => 'decimal:2',
    ];
}
