<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $userInfo = Auth::user();
        return view('Admin.PartialPages.Profile.profile', compact('userInfo'));
    }
    public function update(Request $request)
    {
        // return $request->uid;
        // return $request->all();
        UserInfo::where('user_id', $request->id)->update([

        ]);

        User::where('id', $request->uid)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect('profile');
    }
}
