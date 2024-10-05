<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ExcavatorPosition extends Model
{
    use HasFactory;
    
    protected $with = [
        'horizon',
        'material',
        'down'
    ];

    protected $fillable = [
        'excavator_id',
        'day',
        'career_id',
        'change',
        'download',
        'type_material',
        'distance',
        'massa',
    ];


    public function horizon(): HasOne
    {
        return $this->hasOne(Horizon::class, 'id', 'career_id')->with('career');
    }
    public function down(): HasOne
    {
        return $this->hasOne(InputRuda::class, 'id', 'download');
    }

    public function material(): HasOne
    {
        return $this->hasOne(InputTypematerial::class, 'id', 'type_material');
    }
}
