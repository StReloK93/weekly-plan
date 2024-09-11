<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableProduction extends Model
{
    use HasFactory;



    protected $fillable = [
        'type',
        'career_id',
        'y_career_id',
        'count'
    ];
}
