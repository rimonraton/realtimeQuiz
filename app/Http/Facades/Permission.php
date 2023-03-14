<?php


namespace App\Http\Facades;


use App\Menu;

class Permission
{
    public function can($route)
    {
        $user = auth()->user();
        $mId = $this->getMenuId($route);
        $findMenuUser = \App\MenuRole::where('user_id', $user->id)->count();
//        $rm = '' ;
        if ($findMenuUser) {
            $rm = $user->usermenu;
        } else{
            $rm = $user->roleuser->rolemenu;
        }
        if (in_array($mId, explode(',', $rm->menu_id))) {
            return true;
        };
        return false;
    }
    public function getMenuId($path)
    {
        $menu = Menu::where('router_name', $path)->first();
        if ($menu){
            return $menu->id;
        } else{
            return 0;
        }
    }
}
