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
    public function add(){
        return view('Employee.employee-add');
    }

    public function update($id,Request $request){

        $user = User::find($id);
        if($request->hasfile('image_Front')){
            $ImageFront = time() . '-' . $request->name  . 'Front'. '.' .
            $request->image_Front->extension();

            // $ImageBack = time() . '-' . $request->name . 'Back'. '.'  .
            // $request->image_Back->extension();

            $request->image_Front->move(public_path('img/Front'),$ImageFront);
            // $request->image_Back->move(public_path('img/Back'),$ImageBack);

            $user->Path_imageFront = $ImageFront;
            // $user->Path_imageBack = $ImageBack;
        }

        if($request->hasfile('image_Back')){
            $ImageBack = time() . '-' . $request->name . 'Back'. '.'  .
            $request->image_Back->extension();

            $request->image_Back->move(public_path('img/Back'),$ImageBack);

            $user->Path_imageBack = $ImageBack;
        }
        $user->update($request->all());

        return redirect()->route('Employee.show',$user->id)
                        ->with('success','อัปเดทสำเร็จ ');
    }
    public function destroy($id){

    }
    public function store(Request $request)
    {
        $ImageFront = time() . '-' . $request->name  . 'Front'. '.' .
        $request->image_front->extension();

        $ImageBack = time() . '-' . $request->name . 'Back'. '.'  .
        $request->image_Back->extension();

        $request->image_front->move(public_path('img/Front'),$ImageFront);
        $request->image_Back->move(public_path('img/Back'),$ImageBack);

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
            'Path_imageFront' => $ImageFront,
            'Path_imageBack' => $ImageBack,
        ]);

        return redirect()->route('Employee.index');
    }
}