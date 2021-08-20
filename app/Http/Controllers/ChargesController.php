<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charges;

class ChargesController extends Controller
{
    //
    public function index(Request $request)
    {
        $cargo = Charges::get();

        return ['cargo'=>$tcerti];
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $cargo  = Charges::select('name')->get();
        }else{
            $cargo  = Charges::select('name')->where('id',$buscar)->get();
        }

        
        return ['cargo'=>$tcerti];
    }
    public function store(Request $request)
    {
        $cargo  = new Charges;

        $cargo ->name = $request->name;

        $cargo ->save();
    }
    public function update(Request $request)
    {
        $cargo  = Charges::findOrFail($request->id);

        $cargo ->name = $request->name;

        $cargo ->save();
    }
    public function destroy(Request $request)
    {
        $cargo  = Charges::findOrFail($request->id);
        
        $cargo ->delete();
    }
}
