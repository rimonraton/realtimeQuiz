<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuRole;
use App\Role;
use Illuminate\Http\Request;
//use App\Http\Middleware\HasAccess;

class MenuPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('hasAccess');
    }
    public function index()
    {
        $roles = Role::all()->except(1);
        $menu = Menu::where('parent_id', 0)->get();
        return view('Admin.PartialPages.Menu.menu_permission', compact('roles', 'menu'));
    }
    public function store(Request $request)
    {
//         return $request->all();
        $menuid = implode(',', $request->menu);
         if ($request->selectUser) {
             MenuRole::updateOrCreate(
                 ['user_id' => $request->selectUser],
                 ['menu_id' => $menuid],
                 ['role_id' => '']
             );
         } else{
             $users = Role::find($request->role_id)->load('users')->users->pluck('user_id');
             MenuRole::whereIn('user_id', $users)->delete();
             MenuRole::updateOrCreate(
                 ['role_id' => $request->role_id],
                 ['menu_id' => $menuid]
             );
         }
        // MenuRole::create([
        //     'role_id' => $request->role_id,
        //     'menu_id' => $menuid
        // ]);

        return redirect('menuPermission');
    }
}
