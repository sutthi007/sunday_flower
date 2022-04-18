<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\province;
use Illuminate\Http\Request;

class subController extends Controller
{
    //
    public function index(){
        $provinces = province::all();
        return view('transport.sub',compact('provinces'));
    }
    public function store(Request $request){
        city::create($request->all());
        return redirect()->route('transport/subdistrict.index');
    }
    public function fetch(Request $request){
        echo $request;
    }
}
