<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrillingPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'drilling_id',
        'day',
        'career_id',
        'change',
    ];
}
