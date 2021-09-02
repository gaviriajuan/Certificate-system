<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Types_Certificates;
use App\Models\record_detail;
use Carbon\Carbon;

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
        try{
            DB::beginTransaction();
            

            $tcerti = new Types_Certificates;
            
            $tcerti->name=$request->name;
              
            $tcerti->save();

             $detalles= $request->data;
            foreach($detalles as $ep=>$det){
                $recordDet= new Types_Certificates();

                $recordDet->id_official= $detail->id;
                $recordDet->id_types_certificate=$det['id'];
                $recordDet->fec_generation=$det['fec_generation'];

                $recordDet->save();
             }
       
            DB::commit();

        }catch(Exception $e){
            DB::rollback();
        }
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
