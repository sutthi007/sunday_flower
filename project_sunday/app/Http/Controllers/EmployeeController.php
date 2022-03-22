<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(){

        $users = User::all();
        return view('Employee.employee-information',compact('users'));
    }

    public function show($id){

        $user = User::find($id);

        return view('Employee.employee-data',compact('user'));
    }

    public function edit($id){

        $user = User::find($id);

        return view('Employee.employee-editor',compact('user'));
    }

    public function update($id,Request $request){

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('Employee.show',$user->id)
                        ->with('success','อัปเดทสำเร็จ ');
    }
    public function delete(){

    }
}
