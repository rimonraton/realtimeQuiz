<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetFlutter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class FlutterController extends Controller
{
  public function getLoginFromFlutter($random, $user, $email)
  {
    if(strlen($random) !== 136) {
      abort(404);
    }
    $credentials = \App\User::where('email', $email)->first();
    if (Hash::check($user, $credentials->password)) {
      Auth::login($credentials);
      return redirect('/dashboard');
    }
    abort(404);
  }

  public function loginFlutter(Request $request)
  {
    $credentials = User::where('email', $request->email)->first();
    if (Hash::check($request->password, $credentials->password)) {
      return $credentials;
    }
    return response('Password', 201)
      ->header('Content-Type', 'text/plain');
  }

  public function resetPassword(Request $request)
  {
    $user = User::where('email', trim($request->email))->first();
    if($user) {
      $verification = rand(6, 999999);
      Mail::to($user->email)->send(new PasswordResetFlutter($user, $verification));
      return $user['verification'] = $verification;
    }
    return response('Email not found!', 201)
      ->header('Content-Type', 'text/plain');
  }

  public function registerFlutter(Request $request): User
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
    ]);
    $data['special_name'] = $data['name'];
    $user = $this->create($data);
    $user->markEmailAsVerified();
    return $user;

  }
  public function forgotPassword(Request $request): User
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
    ]);
    $data['special_name'] = $data['name'];
    $user = $this->create($data);
    $user->markEmailAsVerified();
    return $user;

  }




}
