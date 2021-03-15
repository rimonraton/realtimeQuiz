<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\RoleUser;
use App\UserInfo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $findUser = User::where('email', $socialUser->email)->first();
        if($findUser){
            Auth::login($findUser);
        }else{
            $user = new User;
            $user->name = $socialUser->name;
            $user->email = $socialUser->email;
            $user->avatar = $socialUser->avatar;
            $user->save();

            $ui = new UserInfo();
            $ui->user_id = $user->id;
            $ui->save();
            $ru = new RoleUser();
            $ru->user_id = $user->id;
            $ru->role_id = 5;
            $ru->save();
            // DB::table('role_user')->insert([
            //     'role_id' => 2,
            //     'user_id' => $user->id
            // ]);
            Auth::login($user);
        }
        return redirect()->intended();
    }


}
