<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\province;
use App\Models\city;
use App\Models\sub;
use App\Models\user;

class ProvinceController extends Controller
{
    //

    public function index(){
        $provinces = province::orderBy('province','asc')->paginate(10);
        return view('transport.transport',compact('provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }

    public function store(Request $requset){

        $requset->validate(
            [
                'province' => 'required|unique:provinces',
                 
            ],
            [
                'province.required'=> 'กรุณาเลือกจังหวัด',
                'province.unique' => 'จังหวัดนี้มีในฐานข้อมูลแล้ว'
            ]
            );
        $province = province::create([
            'province' => $requset->province,
        ]);

        return redirect()->route('transport.index');
    }
    public function edit($id){
        $province = province::find($id);
        return view('transport.transport-edit',compact('province'));
    }
    public function update(Request $requset, $id){
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
    public function editTransportEmployee($id,$date) {
        $employee = province::find($id);
        $employees = user::all()->where('role','employee');
        return view('summary.transport-order',compact('employee','employees','date'));
    }
    public function updateTransportEmployee($id,$date,Request $request){
        $employee = province::find($id);
        $employee->update($request->all());
        return redirect()->route('transport-em-up',$date);
    }
}
