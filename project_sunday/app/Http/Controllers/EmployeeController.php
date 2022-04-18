<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = User::find($id);

        $user->delete();

        return redirect()->route('Employee.index')->with('success', ',ลบบัญชีผู้ใช้สำเร็จ');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'Idcard' => 'required|min:13|numeric',
            'birthday' => 'required',
            'city' => 'required', //อำเภอ
            'sub' => 'required',
            'province' => 'required',
            'email' => 'required|email',
            'IDuser' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9}/|size:10',
            'zipcode' => 'required',
            'image_front' => 'required',
            'image_Back' => 'required',
        ],
        [
            'name.required'=> 'กรุณากรอกชื่อ',
            'role.required'=> 'กรุณาเลือกตำแหน่ง',
            'Idcard.required'=> 'กรุณากรอกเลขประชาชน',
            'Idcard.min'=> 'กรุณากรอกเลขบัตรประชาชนให้ครบ 13 ตัว',
            'Idcard.numeric'=> 'กรุณากรอกเลขบัตรประชาชนเป็นตัวเลข',
            'birthday.required'=> 'กรุณากรอกวัน/เดือน/ปี เกิด',
            'city.required'=> 'กรุณากรอกอำเภอ',
            'sub.required'=> 'กรุณากรอกตำบล',
            'province.required'=> 'กรุณากรอกจังหวัด',
            'zipcode.required'=> 'กรุณากรอกไปรษณีย์',
            'phone.required'=> 'กรุณากรอกเบอร์โทร',
            'phone.regex'=> 'กรุณากรอก 09 08 05',
            'phone.size'=>'กรุณากรอให้ครบ 10 ตัว',
            'image_front.required'=>'กรุณาอัปโหลดภาพด้านหน้าบัตรประชาชน',
            'image_Back.required'=>'กรุณาอัปโหลดภาพด้านหลังบัตรประชาชน',
            'email.required'=>'กรุณากรอกอีเมล',
            'email.email'=> 'กรุณากรอบ @gmail'


          
            
        ]
    );

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
            'subdistrict' => $request->sub,
            'province' => $request->province,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'IDuser' =>$request->IDuser,
            'phone' =>$request->phone,
            'zipcode' =>$request->zipcode,
            'Path_imageFront' => $ImageFront,
            'Path_imageBack' => $ImageBack,
        ]);

        return redirect()->route('Employee.index');
    }
}
