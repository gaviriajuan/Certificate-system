<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eps;
use Inertia\Inertia;

class EpsController extends Controller
{
    //
    public function index(Request $request)
    {
        $salud = eps::get();

        //return ['salud'=>$salud];
        return Inertia::render('EPS',['salud'=>$salud]);
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $salud  = eps::select('name')->get();
        }else{
            $salud  = eps::select('name')->where('id',$buscar)->get();
        }

        
        return ['salud'=>$salud];
    }
    public function store(Request $request)
    {
        $salud  = new eps;

        $salud ->name = $request->name;

        $salud ->save();
    }
    public function update(Request $request)
    {
        $salud  = eps::findOrFail($request->id);

        $salud ->name = $request->name;

        $salud ->save();
    }
    public function destroy(Request $request)
    {
        $salud  = eps::findOrFail($request->id);
        
        $salud ->delete();
    }
}


