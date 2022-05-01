<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\provinceTo;

class ProvincesTocotroller extends Controller
{
    //
    public function index(){
        $provinces = provinceTo::orderBy('province','asc')->paginate(10);
        return view('transport.provinceTo',compact('provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function store(Request $requset){

        $requset->validate(
            [
                'province' => 'required',
                 
            ],
            [
                'province.required'=> 'กรุณาเลือกจังหวัด',
            ]
            );
        $province = provinceTo::create([
            'provinces_to' => $requset->province,
        ]);

        return redirect()->route('transport.index');
    }
    public function update(Request $requset, $id){
        $province = provinceTo::find($id);
        $province->create($requset->all());

        return redirect()->route('transport.index');
    }
    public function destroy($id){
        $province = provinceTo::find($id);
        $province->delete();

        return redirect()->route('transport.index');
    }
    public function edit($id){
        $province = provinceTo::find($id);
        return view('transport.provinceTo-edit',compact('province'));
    }
}
