<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcavatorToir extends Model
{
    use HasFactory;

    protected $fillable = [
        'excavator_id',
        'day',
        'value',
        'change',
    ];
}
