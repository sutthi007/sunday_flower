<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provinceTo;

class ProvincesToController extends Controller
{
    //
    public function index(){
        $provinces = provinceTo::orderBy('provinces_to','asc')->paginate(10);
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

        return redirect()->route('provinceTo.index');
    }
    public function update(Request $requset, $id){
        $province = provinceTo::find($id);
        $province->update($requset->all());

        return redirect()->route('provinceTo.index');
    }
    public function destroy($id){
        $province = provinceTo::find($id);
        $province->delete();

        return redirect()->route('provinceTo.index');
    }
    public function edit($id){
        $province = provinceTo::find($id);
        return view('transport.provinceTo-edit',compact('province'));
    }
}
