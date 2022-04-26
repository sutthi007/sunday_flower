<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\province;
use App\Models\city;
use App\Models\sub;

class ProvinceController extends Controller
{
    //

    public function index(){
        $provinces = province::all();
        
        return view('transport.transport',compact('provinces'));
    }

    public function store(Request $requset){
        $province = province::create([
            'province' => $requset->province,
        ]);

        return redirect()->route('transport.index');
    }
    public function edit($id){
        $province = province::find($id);
        return view('transport.transport-edit',compact('province'));
    }
    public function update($id,Request $requset){
        $province = province::find($id);
        $province->update($requset->all());

        return redirect()->route('transport.index');
    }
    public function destroy($id){
        $province = province::find($id);
        $province->delete();

        return redirect()->route('transport.index');
    }
    // public function sub(){
    //     return view('transport.sub');
    // }
    // public function city(){
    //     return view('transport.city');
    // }
    // public function store_sub(Request $request){
    //     sub::creare($request->all());
    //     return redirect()->route('sub');
    // }
    // public function store_city(Request $request){
    //     city::create($request->all());
    //     return redirect()->route('city');
    // }
}
