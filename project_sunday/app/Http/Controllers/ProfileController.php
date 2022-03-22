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

        $user->update($request->all());

        return redirect()->route('projects.index')
                        ->with('success','อัปเดทสำเร็จ ');
    }
}
