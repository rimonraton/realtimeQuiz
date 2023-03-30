<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Events\UserCredentialEvent;
use App\Mail\UserCredential;
use App\Mail\WelcomeMail;
use App\Role;
use App\RoleUser;
use App\ShareQuestion;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class NewUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
//        $geoip = new GeoIPLocation();
//         $geoip->setIP('27.147.187.184');
//         return $geoip->getCity();
//        return Request()->root();


        $admin_id = auth()->user()->admin_id;
//        $role_wise_user = Role::where('admin_id',$admin_id)->with(['users.user'=>function ($q) use ($admin_id){
//                $q->where('admin_id',$admin_id);
//        }])->get()->except(1);
        $role_wise_user = Role::where('admin_id',$admin_id)->with(['users.user'])->get()->except(1);
        $random= Str::random(2).mt_rand(100000, 999999);
//        $users =  Admin::with('users.roleuser.role')->where('id',auth()->user()->admin->id)->paginate(10);
//       return User::with('admin')->get();

        $users = User::with('roleuser.role')
            ->where('admin_id',$admin_id)
            ->orderBy('id','desc')
            ->paginate(10);
        $roles = Role::where('admin_id', $admin_id)->get()->except(1);
        return view('Admin.PartialPages.NewUser.new_user',compact('users','admin_id','roles','random','role_wise_user'));
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
        return "success";
//        event(new UserCredentialEvent($user));
//        return redirect('new-user');
    }

    public function roleWiseUsers(Role $role)
    {
        $admin_id = auth()->user()->admin_id;
        $users = User::query()
            ->select('users.*', 'role_users.role_id')
            ->join('role_users', 'role_users.user_id', 'users.id')
            ->where('role_id', $role->id)
            ->where('admin_id',$admin_id)
            ->orderBy('id','desc')
            ->paginate(20);
        $roles = Role::all()->except(1);
        $random= Str::random(2).mt_rand(100000, 999999);
       return view('Admin.PartialPages.NewUser.userList', compact('role', 'users', 'roles','random'));
    }
    public function roleUsers(Role $role)
    {
        $admin_id = auth()->user()->admin_id;
        $users = User::query()
            ->select('users.*', 'role_users.role_id')
            ->join('role_users', 'role_users.user_id', 'users.id')
            ->where('role_id', $role->id)
            ->where('admin_id',$admin_id)
            ->orderBy('id','desc')
            ->get();
       return view('Admin.PartialPages.NewUser._roleUsers', compact('users'));
    }
    public function userVerify(Request $request)
    {
//        return $request->all();
        $user = \auth()->user();
      return Hash::check($request->password, $user->password);
//        Auth::loginUsingId($user->id);
//        return redirect('profile')->with('success', 'Create Your New Password'); ;
    }

    public function search_user($keyword)
    {
        $admin_id = auth()->user()->admin_id;
        $userId = auth()->user()->id;
            $users = User::where('admin_id', $admin_id)
                ->where('name', 'like', $keyword . '%')
                ->orWhere('email', 'like', $keyword . '%')->get();
        $users = $users->where('id', '!=', $userId);

       return view('Admin.PartialPages.NewUser.__userList', compact('users'));
    }

    public function shareQuestionStore(Request $request)
    {
//        return $request->all();
        $ids = explode(",", $request->questionIds);
       $id = \auth()->user()->id;
       foreach ($ids as $qid) {
           ShareQuestion::create([
               'shareToUser' => $request->userId,
            'shareFromUser' => $id,
            'question_id' => $qid
        ]);
       }
       return redirect('draft-questions');

    }

}
