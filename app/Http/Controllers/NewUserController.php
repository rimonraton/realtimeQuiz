<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mail\UserCredential;
use App\Mail\WelcomeMail;
use App\Role;
use App\RoleUser;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $random= Str::random(2).mt_rand(100000, 999999);
//        $users =  Admin::with('users.roleuser.role')->where('id',auth()->user()->admin->id)->paginate(10);
//       return User::with('admin')->get();
        $admin_id = auth()->user()->admin->id;
        $users = User::with('roleuser.role')->where('admin_id',$admin_id)->orderBy('id','desc')->paginate(10);
        $roles = Role::all()->except(5);
        return view('Admin.PartialPages.NewUser.new_user',compact('users','admin_id','roles','random'));
    }

    public function create(Request $request){
//        return $request->all();


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_id' =>$request->admin_id,
            'token' => Str::random(60),
        ]);
        $ui = new UserInfo();
        $ui->user_id = $user->id;
        $ui->save();
        $ru = new RoleUser();
        $ru->user_id = $user->id;
        $ru->role_id = $request->role_id;
        $ru->save();
//        Mail::to($user->email)->send(new WelcomeMail($user));
        return redirect('new-user');
    }

    public function update(Request $request){
//        return $request->all();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if ($request->password!=null){
        $data['password'] = Hash::make($request->password);
        }
        User::where('id',$request->id)->update($data);
        RoleUser::where('user_id',$request->id)->update([
            'role_id'=>$request->role_id
        ]);
        return redirect('new-user');
    }

    public function sendEmail(User $user){
        \Mail::to($user->email)->send(new UserCredential($user));
        return redirect('new-user');
    }


}
