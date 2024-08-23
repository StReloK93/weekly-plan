<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Horizon extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'career_id',
        'code',
        'level',
    ];


    
    public function career(): HasOne
    {
        return $this->hasOne(Career::class, 'id', 'career_id');
    }
}
