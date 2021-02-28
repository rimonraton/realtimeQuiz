<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCredential extends Controller
{
    public function userCredential($token)
    {
        $user = User::where('token',$token)->first();
        Auth::loginUsingId($user->id);
        return redirect('profile')->with('success', 'Create Your New Password'); ;
    }
}
