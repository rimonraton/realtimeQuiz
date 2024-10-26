<?php

namespace App\Http\Facades;

use App\Menu;
use Illuminate\Support\Facades\Cache;

class Permission
{
    public static function can($route)
    {
        $user = auth()->user();
        if($user->roleuser->role->role_name == 'Super Admin'){
            return true;
        }
        $mId = self::getMenuId($route);
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
    public static function getMenuId($path)
    {
        $menu = Menu::where('router_name', $path)->first();
        if ($menu){
            return $menu->id;
        } else{
            return 0;
        }
    }

    public static function getMenus()
    {
        $userAndLang = auth()->user()->id .'-'. \App::getLocale();
//        return Cache::remember($userAndLang, now()->addHour(), function () {
            $findMenuUser = \App\MenuRole::where('user_id', auth()->user()->id)->count();
            $rm = '';
            if($findMenuUser) {
                $rm = auth()->user()->usermenu;
            }
            else{
                $rm = auth()->user()->roleuser->rolemenu;
            }

            $role = auth()->user()->roleuser->role;

            if($rm)
            {
                $menuIdArray = explode(',', $rm->menu_id);
            }
            else
            {
                $menuIdArray = array("1");
            }
            $menu =\App\Menu::where('parent_id',0)->where('show_menu', 1)->get();
            $lang = \App::getLocale();
            return [
                'menu' => $menu,
                'menuIdArray' => $menuIdArray,
                'lang' => $lang,
                'role' => $role
            ];
//        });
    }
}
