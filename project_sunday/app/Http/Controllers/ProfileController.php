<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        return view('Profile.profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('Profile.profile-editor', compact('user'));
    }

    public function update($id,Request $request)
    {
        $user = User::find($id);

        if($request->hasfile('image_Profile')) {
            $ImgaeProfile = time() . '-' . $request->name  . 'Profile' . '.' .
            $request->image_Profile->extension();

            $request->image_Profile->move(public_path('img/Profile'),$ImgaeProfile);

            $user->Path_imageProfile = $ImgaeProfile;
        }

        $user->update($request->all());

        return redirect()->route('Profile.index')
                        ->with('success','อัปเดทสำเร็จ ');
    }

    public function show(){
        $current_user = auth::user();

        return view('projects.reset-password',compact('current_user'));
    }
    public function update_password(Request $request)
    {
        $current_user = user::find($request->id);
        $request->validate([
            'old_password' => 'required|min:6|max:100|',
            'new_password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:new_password',
            ],
            [
                'old_password.required' => 'กรุณากรอกรหัสเดิม',
                'new_password.required' => 'กรุณากรอกรหัสใหม่',
                'confirm_password.required' => 'กรุณากรอกรหัสยืนยันรหัสผ่าน',
                'old_password.min' => 'กรอกรหัสมากกว่า 6 ตัว และน้อยกว่า 20 ตัว',
                'new_password.min' => 'กรอกรหัสมากกว่า 6 ตัว และน้อยกว่า 20 ตัว',
                'old_password.same' => 'รหัสผ่านเก่าและใหม่ไม่ตรงกัน',
            ]
        );


        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password' => bcrypt($request->new_password),
            ]);

            return redirect()->route('projects.index')->with('success',('เปลี่ยนรหัสผ่านเรียบร้อย'));
        }else{
            return redirect()->back()->with('error',('รหัสผ่านเก่าไม่ถูกต้อง'));
        }


    }
}
