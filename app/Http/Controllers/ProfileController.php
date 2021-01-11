<?php

namespace App\Http\Controllers;

use App\User;
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
        // return $request->all();
        User::where('id', $request->uid)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect('profile');
    }
}
