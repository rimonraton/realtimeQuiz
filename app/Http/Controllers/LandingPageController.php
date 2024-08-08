<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feature;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function index()
    {
        $features = Game::with('features')->get();
//       return User::where('id',16)->first()->admin_id;
        $category = Category::admin()->where('sub_topic_id', 0)->where('is_published',1)->get();
        return view('LandingPage.landing_page', compact('category', 'features'));
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
    $user = User::where('email', $request->email)->first();
    if($user) {
      return $user;
    }
    return response('Email not found!', 201)
      ->header('Content-Type', 'text/plain');
  }

}
