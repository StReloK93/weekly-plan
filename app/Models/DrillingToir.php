<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrillingToir extends Model
{
    use HasFactory;

    protected $fillable = [
        'drilling_id',
        'day',
        'value',
        'change',
    ];
}
