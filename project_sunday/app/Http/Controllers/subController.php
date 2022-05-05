<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\province;
use App\Models\customeradd;
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
    public function getcustomer(Request $request){
        $id = $request->get('select');
        $result =array();
        $query=customeradd::where('name',$id)->get();
        $output = '<input
        class="phone appearance-none block w-full  text-gray-700 border  rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white dark:text-white dark:bg-gray-900"
        type="tel" placeholder="0588888" name="phone" size="10" maxlength="11"
        id="tell" onkeypress="addSpaceTEl()">';

        echo $output;
    }
}
