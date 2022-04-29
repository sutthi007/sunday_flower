<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;
use App\Models\province;

class cityController extends Controller
{
    //
    public function index(){
        $provinces = province::orderBy('province','asc')->get();
        return view('transport.city',compact('provinces'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'province' => 'required',
                'city' => 'required|unique:cities',
                 
            ],
            [
                'province.required'=> 'กรุณากรอกจังหวัด',
                'city.required'=> 'กรุณากรอกอำเภอ',
                'city.unique' => 'อำเภอนี้มีในฐานข้อมูลแล้ว'
            ]
            );
            city::create([
                'province_id' => $request->province,
                'city'=> $request->city ]);
            return redirect()->route('city.index')->with('success','เพิ่มอำเภอสำเร็จ');
        }

    public function destroy($id){
            $city = city::find($id);

            $city->delete();

            return redirect()->route('city.index');
    }
    public function edit($id){

        $city = city::find($id);

        return view('transport.city-edit',compact('city'));
    }
    public function update($id,Request $request){
        $city = city::find($id);
        $city->update($request->all());

        return redirect()->route('city.index');
    }
}
