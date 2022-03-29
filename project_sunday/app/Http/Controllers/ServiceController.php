<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;

class ServiceController extends Controller
{
    //
    public function index(){

        $services = service::all();
       return view('Serviceprojects.serve',compact('services'));
    }

    public function store(Request $request){
        service::create([
            'list' => $request->list,
            'type' => $request->type,
            'price' => $request->price,
        ]);
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
}
