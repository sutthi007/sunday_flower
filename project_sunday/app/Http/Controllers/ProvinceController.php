<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    //
    
    public function index(){
        
    }

    public function store(Request $requset){
        $province = province::create([
            'province' => $requset->province,
            'sub' => $requset->sub,
            'city' => $requset->city,
        ]);
    }
    public function edit($id){
        
        return redirect()->route('.update');
    }
    public function update($id,Request $requset){
        $province = province::find($id);
        $province->update($requset->all());
    }
    public function destroy($id){
        $province = province::find($id);
        $province->delete();
    }
}
