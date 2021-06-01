<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
         $roles = Role::where('id','!=',1)->paginate(10);
        return view('Admin.PartialPages.Role.role_list', compact('roles'));
    }
    public function createRole(Request $request)
    {
        // return $request->all();
        // Role::insert($request->except('_token'));
        $request->validate([
            'role_name' => 'required',

        ]);
        Role::create([
            'role_name' => $request->role_name,
            'bn_role_name'=>$request->bn_role_name
        ]);
        return redirect('rolelist');
    }

    public function roleUpdate(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);
        Role::where('id', $request->id)->update([
            'role_name' => $request->role_name,
            'bn_role_name'=>$request->bn_role_name
        ]);
        return redirect('rolelist');
    }
    public function roleDelete($id)
    {
        Role::where('id', $id)->delete();
        return "Deleted Successfully.";
    }

    public function assignRoleList()
    {
       $user_id = RoleUser::pluck('user_id');
    //    return Auth()->user()->roleuser->role->role_name;
//       return $user_role = User::with('roleuser.role')->where('id',28)->get();
        $user_role = User::with('roleuser.role')->where('admin_id',\auth()->user()->admin->id)->paginate(10);
        $roles = Role::all()->except(1);
        $users = User::whereNotIn('id',$user_id)->get();
        return view('Admin.PartialPages.Role.role_user', compact(['roles', 'users', 'user_role']));
    }
    public function createRoleUser(Request $request)
    {
//         return $request->all();
        $request->validate([
            'role_id' => 'required',
            'user_id' => 'required',
        ]);
        RoleUser::create([
            'role_id' => $request->role_id,
            'user_id' => $request->user_id
        ]);
        return redirect('assignRoleList');
    }

    public function roleuserUpdate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'uprole_id' => 'required',
            'upuser_id' => 'required',
        ]);
        RoleUser::where('id', $request->id)->update([
            'role_id' => $request->uprole_id,
            'user_id' => $request->upuser_id
        ]);
        return redirect('assignRoleList');
    }

    public function deleteroleUser($id)
    {
        RoleUser::where('id', $id)->delete();
        return "Deleted Successfully";
    }

    public function searchRoleUser($keyword)
    {
//        return $keyword;
        if ($keyword=='all'){
            $user_role = User::with('roleuser.role')->where('admin_id',\auth()->user()->admin->id)->paginate(10);
           return view('Admin.PartialPages.Role.partial._search_role_user',compact('user_role'));
        }
         $user_role = User::with('roleuser.role')->where('admin_id',\auth()->user()->admin->id)->where('name','LIKE',"{$keyword}%")->paginate(10);
        return view('Admin.PartialPages.Role.partial._search_role_user',compact('user_role'));

    }
}
