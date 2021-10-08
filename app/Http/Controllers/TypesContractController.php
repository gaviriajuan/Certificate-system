<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Types_Contract;
use Inertia\Inertia;

class TypesContractController extends Controller
{
    //
    public function index(Request $request)
    {
        $tcontract = Types_Contract::get();

       // return ['tcontract'=>$tcontract];
        return Inertia::render('TiposContrato',['tcontract'=>$tcontract]);
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $tcontract = Types_Contract::select('name')->get();
        }else{
            $tcontract = Types_Contract::select('name')->where('id',$buscar)->get();
        }

        
        return ['tcontract'=>$tcontract];
    }
    public function store(Request $request)
    {
        $tcontract = new Types_Contract;

        $tcontract->name = $request->name;

        $tcontract->save();
    }
    public function update(Request $request)
    {
        $tcontract = Types_Contract::findOrFail($request->id);

        $tcontract->name = $request->name;

        $tcontract->save();
    }
    public function destroy(Request $request)
    {
        $tcontract = Types_Contract::findOrFail($request->id);
        
        $tcontract->delete();
    }
}


