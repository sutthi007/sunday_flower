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
    public function destroy($id){

    }
    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'Idcard' => $request->Idcard,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'city' => $request->city,
            'province' => $request->province,
            'email' =>$request->email,
            'password' =>$request->password,
            'IDuser' =>$request->IDuser,
            'phone' =>$request->phone,
            'zipcode' =>$request->zipcode,
            'picture' =>$request->picture,
        ]);

        return redirect()->route('Employee.index');
    }
}
