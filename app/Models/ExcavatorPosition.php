<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcavatorPosition extends Model
{
    use HasFactory;


    protected $fillable = [
        'excavator_id',
        'day',
        'career_id',
        'change',
        'download',
        'type_material',
        'distance',
    ];
}
