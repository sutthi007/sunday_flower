<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;
use App\Models\province;

class cityController extends Controller
{
    //
    public function index(){
        $provinces = province::all();

        return view('transport.city',compact('provinces'));
    }
    public function store(Request $request){
            city::create([
                'province_id' => $request->province,
                'city'=> $request->city ]);
            return redirect()->route('city.index');
        }
}
