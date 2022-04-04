<?php

namespace App\Http\Controllers;

use App\Models\animal;
use App\Models\flower;
use App\Models\motorcycle;
use App\Models\parcel;
use Illuminate\Http\Request;
use App\Models\service;

class ServiceController extends Controller
{
    //
    public function index(){

        $flower = flower::all();
        $motorcycle = motorcycle::all();
        $animal = animal::all();
        $percel = parcel::all();
       return view('Serviceprojects.serve',compact('flower','motorcycle','animal','percel'));
    }

    public function store(Request $request){
       if($request->type == 1){
            flower::created($request->all());
       }elseif($request->type == 2){
            motorcycle::created($request->all);
       }elseif($request->type == 3){
           animal::created($request->all());
       }elseif($request->type == 4){
           parcel::created($request->all());
        }

        return redirect()->route('service.index');
    }
    public function update($id,Request $request){
        $service = service::find($id);

        $service->update($request->all());
    }
    public function destroy($id,Request $request){
        $service = service::find($id);
        $service->delete($request->all());
    }
    public function edit($id){
        $service = service::find($id);

    }
    public function show($id){
        $service = service::find($id);
    }
    public function addlistP(){
        return view('Serviceprojects.serve-increase');
    }
    public function addlistflower(){
        return view('Serviceprojects.serve-increase-1');
    }
    public function addlistanimal(){
        return view('Serviceprojects.serve-increase-3');
    }
    public function addlistmotorcle(){
        return view('Serviceprojects.serve-increase-2');
    }
}
