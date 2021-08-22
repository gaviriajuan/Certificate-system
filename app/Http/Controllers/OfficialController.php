<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Official;

class OfficialController extends Controller
{
    //
    public function index(Request $request)
    {
        $offi = Official::get();

        return ['offi'=>$offi];
    }

    public function getData(Request $request)
    {
        $offi=$request->idBuscar;

        if($buscar==''){
            $offi = Official::select('name')->get();
        }else{
            $offi = Official::select('name')->where('id',$buscar)->get();
        }

        
        return ['offi'=>$cjcompen];
    }

    public function store(Request $request)
    {
        $offi = new Official;

        $offi->names = $request->names;
        $offi->surnames = $request->surnames;
        $offi->doc_number = $request->doc_number;
        $offi->email = $request->email;
        $offi->phone = $request->phone;
        $offi->fec_contract = $request->fec_contract;
        $offi->fec_entry = $request->fec_entry;
        $offi->address = $request->address;
        $offi->id_contract = $request->id_contract;
        $offi->id_charges = $request->id_charges;
        $offi->id_eps = $request->id_eps;
        $offi->id_arls = $request->id_arls;
        $offi->id_cjcompensation = $request->id_cjcompensation;
        
        $offi->save();
    }

    public function update(Request $request)
    {
        $offi = Official::findOrFail($request->id);

        $offi->name = $request->name;

        $offi->save();
    }
    
    public function destroy(Request $request)
    {
        $offi = Official::findOrFail($request->id);
        
        $offi->delete();
    }
}
