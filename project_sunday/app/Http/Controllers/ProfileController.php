<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

        return redirect()->route('Profile.index')
                        ->with('success','อัปเดทสำเร็จ ');
    }
}
