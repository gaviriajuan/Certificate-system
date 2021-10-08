<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Types_Certificates;
use Carbon\Carbon;
use Inertia\Inertia;

class TypesCertificatesController extends Controller
{
    //
    public function index(Request $request)
    {
        $tcerti = Types_Certificates::get();

        //return ['tcerti'=>$tcerti];
        return Inertia::render('TiposCertificados',['tcerti'=>$tcerti]);
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        
            $tcerti = Types_Certificates::select('id','name')->orderBy('name','asc')->get();
       
        
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
