<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Excavator extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'excavator_type_id',
        'garage_number',
    ];


    public function type(): HasOne
    {
        return $this->hasOne(ExcavatorType::class, 'id', 'excavator_type_id');
    }
}
