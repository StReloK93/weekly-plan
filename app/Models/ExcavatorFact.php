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
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
