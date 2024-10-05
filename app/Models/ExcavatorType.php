<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcavatorType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'bucket_volume',
        'normal_procent',
        'easy_procent',
        'hard_procent',
        'normal_time',
        'easy_time',
        'hard_time',
        'count_bucket',
    ];

}
