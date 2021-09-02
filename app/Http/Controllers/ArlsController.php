<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arls;

class ArlsController extends Controller
{
    //
    public function index(Request $request)
    {
        $auxilio = Arls::get();

        return ['auxilio'=>$auxilio];
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $auxilio = Arls::select('name')->get();
        }else{
            $auxilio = Arls::select('name')->where('id',$buscar)->get();
        }

        
        return ['auxilio'=>$auxilio];
    }
    public function store(Request $request)
    {
        $auxilio = new Arls;

        $auxilio->name = $request->name;

        $auxilio->save();
    }
    public function update(Request $request)
    {
        $auxilio = Arls::findOrFail($request->id);

        $auxilio->name = $request->name;

        $auxilio->save();
    }
    public function destroy(Request $request)
    {
        $auxilio = Arls::findOrFail($request->id);
        
        $auxilio->delete();
    }
}


