<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Truck extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'truck_type_id',
        'garage_number',
        'ability',
    ];


    public function type(): HasOne
    {
        return $this->hasOne(TruckType::class, 'id', 'truck_type_id');
    }
}
