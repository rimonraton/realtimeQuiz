<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('parent_id', 0)->get();
        return view('Admin.PartialPages.Menu.menu', compact('menus'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        Menu::create([
            'name' => $request->menu,
            'bn_name' => $request->bn_menu,
            'action' => $request->route_name,
            'parent_id' => $request->parent_id,
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
}
