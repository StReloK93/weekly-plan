<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'x_career_id',
        'y_career_id',
        'count'
    ];
}
