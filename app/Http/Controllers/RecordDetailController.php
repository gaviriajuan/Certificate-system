<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\record_detail;

class RecordDetailController extends Controller
{
    //
    public function index(Request $request)
    {
        $detail = record_detail::get();

        return ['detail'=>$detail];
    }
    public function getData(Request $request)
    {
        $buscar=$request->idBuscar;

        if($buscar==''){
            $detail = record_detail::select('name')->get();
        }else{
            $detail = record_detail::select('name')->where('id',$buscar)->get();
        }

        
        return ['detail'=>$detail];
    }
    public function store(Request $request)
    {
        $detail = new record_detail;

        $detail->name = $request->name;

        $detail->save();
    }
    public function update(Request $request)
    {
        $detail = record_detail::findOrFail($request->id);

        $detail->name = $request->name;

        $detail->save();
    }
    public function destroy(Request $request)
    {
        $detail = record_detail::findOrFail($request->id);
        
        $detail->delete();
    }
}
