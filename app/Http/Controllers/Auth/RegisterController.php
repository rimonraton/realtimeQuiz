<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Providers\RouteServiceProvider;
use App\RoleUser;
use App\Rules\ReCaptcha;
use App\User;
use App\UserInfo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
//        return $request->all();
        if(is_numeric($request->email)){
            if (User::where('email',$request->email.'@gyankosh.org')->count()){
                \Session::flash('status', __('auth.already_registered'));
                return redirect()->back();
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string','email', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//    protected function create(array $data)
//    {
//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
////            'tokan' => Str::random(60),
//        ]);
//        $ui = new UserInfo();
//        $ui->user_id = $user->id;
//        $ui->nick_name = $data['special_name'];
//        $ui->save();
//        $ru = new RoleUser();
//        $ru->user_id = $user->id;
//        $ru->role_id = 5;
//        $ru->save();
//        Mail::to($user->email)->send(new WelcomeMail($user));
//        return $user;
//    }


    protected function create(array $data)
    {
        $email = '';
        $ui = new UserInfo();
        if(is_numeric($data['email'])){
            $email = $data['email'].'@gyankosh.org';
            $ui->mobile = $data['email'];
        }
        else{

            $email = $data['email'];
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $email,
            'password' => Hash::make($data['password']),
//            'tokan' => Str::random(60),
        ]);

        $ui->user_id = $user->id;
        $ui->nick_name = $data['special_name'];
        $ui->save();
        $ru = new RoleUser();
        $ru->user_id = $user->id;
        $ru->role_id = 5;
        $ru->save();
        if(is_numeric($data['email'])){

        }
        else{
            Mail::to($user->email)->send(new WelcomeMail($user));
        }

        return $user;
    }

}
