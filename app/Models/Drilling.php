<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Drilling extends Model
{
    use HasFactory;

    protected $fillable = [
        'drilling_type_id',
        'garage_number',
    ];

    public $timestamps = false;
    public function type(): HasOne
    {
        return $this->hasOne(DrillingType::class, 'id', 'drilling_type_id');
    }
}
