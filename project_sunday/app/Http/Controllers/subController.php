<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subController extends Controller
{

    public function fetch(Request $request){
        $id = $request->get('select');
        $result =array();
        $query=DB::table('provinces')
        ->join('cities','provinces.id','=','cities.province_id')
        ->select('cities.city','cities.id')
        ->where('provinces.id',$id)
        ->groupBy('cities.city','cities.id')
        ->get();

        $output = '<option value="">---เลือกอำเภอ----</option>';
        foreach($query as $row){
            $output.='<option value="'.$row->id.'">'.$row->city.'</option>';
        }
        echo $output;
    }
}
