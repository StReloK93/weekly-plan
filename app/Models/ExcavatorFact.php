<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcavatorFact extends Model
{
    use HasFactory;


    protected $fillable = [
        'plan',
        'fact',
        'excavator_id',
        'day',
    ] ;


    protected $casts = [
        'plan' => 'decimal:2',
        'fact' => 'decimal:2',
    ];
}
