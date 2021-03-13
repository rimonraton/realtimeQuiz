<?php

namespace App\Http\Controllers;

use App\Admin;
use App\RoleUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Auth()->user()->roleuser->role;
        $institute = Admin::all();
        $user = User::find(Auth::user()->id);
        return view('Admin.PartialPages.Payment.payment', compact('user','institute'));
    }
    public function store(Request $request){
        return $request->all();
        $imgPath ='';
        $user_id = \auth()->user()->id;
        if($request->instituteorother == 'I'){
            if ($request->hasFile('file')) {
                $original_name = $request->file('file')->getClientOriginalName();
                $ext = strtolower(\File::extension($original_name));
                $created_at = Carbon::now('Asia/Dhaka');
                $t = $created_at->timestamp;
                $r = Str::random(40);
                $random_name = $t . '' . $r . '.' . $ext;
                $path = public_path() . '/' . 'institute_image';
                $filename = 'institute_image/' . $random_name;
                $request->file('file')->move($path, $filename);
                $imgPath = $filename;
            }
            $admin = Admin::create([
                'user_id'=>$user_id,
                'institute_name'=>$request->institute_name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'photo'=>$imgPath,
            ]);
            RoleUser::where('user_id',$user_id)->update([
                'role_id'=> 1,
            ]);
            User::where('id',$user_id)->update([
                'admin_id'=>$admin->id
            ]);
            return redirect('dashboard');
        }
        RoleUser::where('user_id',$user_id)->update([
            'role_id'=>3,
        ]);
        User::where('id',$user_id)->update([
            'admin_id'=>$request->institute_id,
        ]);
        return redirect('dashboard');
    }
}
