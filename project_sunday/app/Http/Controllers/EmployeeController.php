<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //
    public function index(){

        $users = User::all()->whereNotIn('role','owner');
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
        if($request->hasfile('image_Profile')) {
            $ImgaeProfile = time() . '-' . $request->name  . 'Profile' . '.' .
            $request->image_Profile->extension();

            $request->image_Profile->move(public_path('img/Profile'),$ImgaeProfile);

            $user->Path_imageProfile = $ImgaeProfile;
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
        // dd($request);
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'birthday' => 'required',
            'city' => 'required', //อำเภอ
            'sub' => 'required',
            'province' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{2}[-]{1}[0-9]{7}/|size:11',
            'phone_relative' => 'required|regex:/(0)[0-9]{2}[-]{1}[0-9]{7}/|size:11',
            'zipcode' => 'required',
            'image_Profile' => 'required',
        ],
        [
            'name.required'=> 'กรุณากรอกชื่อ',
            'role.required'=> 'กรุณาเลือกตำแหน่ง',
            

            'birthday.required'=> 'กรุณากรอกวัน/เดือน/ปี เกิด',
            'city.required'=> 'กรุณากรอกอำเภอ',
            'sub.required'=> 'กรุณากรอกตำบล',
            'province.required'=> 'กรุณากรอกจังหวัด',
            'zipcode.required'=> 'กรุณากรอกไปรษณีย์',
            'phone.required'=> 'กรุณากรอกเบอร์โทร',
            'phone.regex'=> 'กรุณากรอก 09 08 05',
            'phone.size'=>'กรุณากรอให้ครบ 10 ตัว',
            'phone_relative.required'=> 'กรุณากรอกเบอร์โทร',
            'phone_relative.regex'=> 'กรุณากรอก 09 08 05',
            'phone_relative.size'=>'กรุณากรอให้ครบ 10 ตัว',
            'image_Profile.required'=>'กรุณาอัปโหลดภาพด้านหลังบัตรประชาชน',
            'email.required'=>'กรุณากรอกอีเมล',
            'email.email'=> 'กรุณากรอบ @gmail'




        ]
    );
        if($request->role == 'employee'){
            $type_role = 'em';
            $num_role = '02';
        }else{
            $type_role = 'am';
            $num_role = '01';
        }

        $userid = 'sunday'.$type_role.$num_role.random_int(00,99);
        // make type file photo
        $ImageProfile = time() . '-' . $request->name  . 'Profile'. '.' .
        $request->image_Profile->extension();

        // path file from public
        $request->image_Profile->move(public_path('img/Profile'),$ImageProfile);

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'city' => $request->city,
            'subdistrict' => $request->sub,
            'province' => $request->province,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'IDuser' => $userid,
            'phone' =>$request->phone,
            'phone_relative' =>$request->phone_relative,
            'zipcode' =>$request->zipcode,
            'Path_imageProfile' => $ImageProfile,

        ]);

        return redirect()->route('Employee.index');
    }
}
