<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuRole;
use App\Role;
use Illuminate\Http\Request;

class MenuPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $menu = Menu::where('parent_id', 0)->get();
        return view('Admin.PartialPages.Menu.menu_permission', compact('roles', 'menu'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $menuid = implode(',', $request->menu);
        // MenuRole::create([
        //     'role_id' => $request->role_id,
        //     'menu_id' => $menuid
        // ]);
        MenuRole::updateOrCreate(
            ['role_id' => $request->role_id],
            ['menu_id' => $menuid]
        );
        return redirect('menuPermission');
    }
}
