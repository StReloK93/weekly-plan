<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Normative;
class NormativeController extends Controller
{

    public function show($id)
    {
        return Normative::find(1);
    }

    public function update(Request $request, $id)
    {

        $instance = Normative::find(1);
        $instance->obed_po = $request->obed_po;
        $instance->eto_po = $request->eto_po;
        $instance->peresmenka_po = $request->peresmenka_po;
        $instance->techno_pereriv_po = $request->techno_pereriv_po;

        $instance->techno_pereriv_ac = $request->techno_pereriv_ac;
        $instance->zapravka_ac = $request->zapravka_ac;
        $instance->obed_ac = $request->obed_ac;
        $instance->peresmenka_ac = $request->peresmenka_ac;
        $instance->rezerv_ac = $request->rezerv_ac;
        $instance->vzriv_ac = $request->vzriv_ac;

        $instance->speed_ac = $request->speed_ac;
        $instance->install_ac = $request->install_ac;
        $instance->download_ac = $request->download_ac;
        $instance->waiting_ac = $request->waiting_ac;
        
        $instance->gruz_ac = $request->gruz_ac;
        $instance->full_bort_ac = $request->full_bort_ac;
        $instance->save();
        return $instance;
    }
}
