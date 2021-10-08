<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cj_compensation;
use Inertia\Inertia;

class CjCompensationController extends Controller
{
    //
    public function index(Request $request)
    {
        $cjcompen = cj_compensation::get();

        //return ['cjcompen'=>$cjcompen];
        return Inertia::render('CajaCompensacion',['cjcompen'=>$cjcompen]);
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $cjcompen = cj_compensation::select('name')->get();
        }else{
            $cjcompen = cj_compensation::select('name')->where('id',$buscar)->get();
        }

        
        return ['cjcompen'=>$cjcompen];
    }
    public function store(Request $request)
    {
        $cjcompen = new cj_compensation;

        $cjcompen->name = $request->name;

        $cjcompen->save();
    }
    public function update(Request $request)
    {
        $cjcompen = cj_compensation::findOrFail($request->id);

        $cjcompen->name = $request->name;

        $cjcompen->save();
    }
    public function destroy(Request $request)
    {
        $cjcompen = cj_compensation::findOrFail($request->id);
        
        $cjcompen->delete();
    }
}


