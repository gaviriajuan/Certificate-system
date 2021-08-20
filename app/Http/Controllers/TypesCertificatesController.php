<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Types_Certificates;

class TypesCertificatesController extends Controller
{
    //
    public function index(Request $request)
    {
        $tcerti = Types_Certificates::get();

        return ['tcerti'=>$tcerti];
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $tcerti = Types_Certificates::select('name')->get();
        }else{
            $tcerti = Types_Certificates::select('name')->where('id',$buscar)->get();
        }

        
        return ['tcerti'=>$tcerti];
    }
    public function store(Request $request)
    {
        $tcerti = new Types_Certificates;

        $tcerti->name = $request->name;

        $tcerti->save();
    }
    public function update(Request $request)
    {
        $tcerti = Types_Certificates::findOrFail($request->id);

        $tcerti->name = $request->name;

        $tcerti->save();
    }
    public function destroy(Request $request)
    {
        $tcerti = Types_Certificates::findOrFail($request->id);
        
        $tcerti->delete();
    }
}
