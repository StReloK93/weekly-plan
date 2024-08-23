<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normative extends Model
{
    use HasFactory;

    protected $fillable = [
        'obed_po',
        'eto_po',
        'peresmenka_po',
        'techno_pereriv_po',

        'techno_pereriv_ac',
        'zapravka_ac',
        'obed_ac',
        'peresmenka_ac',
        'rezerv_ac',
        'vzriv_ac',

        'speed_ac',
        'install_ac',
        'download_ac',
        'waiting_ac',


        'gruz_ac',
        'full_bort_ac',
    ];
    public $timestamps = false;
}
