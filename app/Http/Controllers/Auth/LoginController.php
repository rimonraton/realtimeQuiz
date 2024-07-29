<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\RoleUser;
use App\UserInfo;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use DB;
use function React\Promise\Stream\first;

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

    public function user_cedential($value)
    {
        if(is_numeric($value)){
            if (User::where('email',$value.'@gyankosh.org')->count()){
                return User::where('email',$value.'@gyankosh.org')->first()->email;
            }
            else{
                return '0';
            }
        }
        else{
            if (User::where('email',$value)->count()){
                return User::where('email',$value)->first()->email;
            }
            else{
                return '0';
            }
        }
    }



  public function getLoginFromFlutter($user, $email)
  {
    	return $credentials = \App\User::where('email', $email)->first();
	//Auth::logout();
	//auth()->user();

    if (Hash::check($user, $credentials->password)) {
        Auth::login($credentials);
	//return auth()->user();
        return redirect('/dashboard');
    }

  }


	

}
