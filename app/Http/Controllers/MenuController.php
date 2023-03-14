<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuRole;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $menus = Menu::where('parent_id', 0)->with('childs')->paginate(10);
        $parent_menus = Menu::where('parent_id', 0)->get();
        return view('Admin.PartialPages.Menu.menu', compact('menus', 'parent_menus'));
    }
    public function store(Request $request)
    {
        Menu::create([
            'name' => $request->menu,
            'bn_name' => $request->bn_menu,
            'router_name' => $request->route_name,
            'parent_id' => $request->parent_id,
            'show_menu' => $request->actionRoute ? 0 : 1
        ]);
        return redirect('menu');
    }
    public function updateMenu(Request $request)
    {
        // return $request->all();
        Menu::where('id', $request->id)->update([
            'name' => $request->menu,
            'bn_name' => $request->bn_menu,
            // 'action' => $request->route_name,
            // 'parent_id' => $request->parent_id,
        ]);
        return redirect('menu');
    }
    public function delete($id)
    {
        Menu::where('id',$id)->delete();
        return "Deleted Successfully";
    }

   public function getselectedMenu($role_id){
//        return
         $menu_id = MenuRole::where('role_id',$role_id)->first()->menu_id;
//         return Role::where('id', $role_id)->first()->load('users.user');
//       $admin_id = auth()->user()->admin_id;
//        $users = User::query()
//           ->select('users.*', 'role_users.role_id')
//           ->join('role_users', 'role_users.user_id', 'users.id')
//           ->where('role_id', $role_id)
//           ->where('admin_id',$admin_id)
//           ->orderBy('id','desc')
//           ->get();
//         return [
//             'menuIds' => explode(',',$menu_id),
//             'users' => $users
//         ];

       return explode(',',$menu_id);

    }

    public function getUserSelectedMenu($userId)
    {
        $findMenuUser = \App\MenuRole::where('user_id', $userId)->count();

       if ($findMenuUser) {
           $menu_id = \App\MenuRole::where('user_id', $userId)->first()->menu_id;
           return explode(',',$menu_id);
       } else{
          $menu_id = User::find($userId)->roleuser->rolemenu->menu_id;
           return explode(',',$menu_id);
       }
       return '';
    }
}
