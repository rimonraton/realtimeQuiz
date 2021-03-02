<?php

namespace App\Http\Middleware;

use App\Menu;
use App\MenuRole;
use Closure;

class HasAccess
{
    public function handle($request, Closure $next)
    {
        $mId = Menu::where('action', $request->path())->first()->id;

        // if ($mId == 15) {
        //     dd('No Access');
        // }
//        dd($role =auth()->user()->roleuser->role->role_name);
        //dd(auth()->user()->roleuser);
        $rm = MenuRole::where('role_id', auth()->user()->roleuser->role_id)->first();
        if (in_array($mId, explode(',', $rm->menu_id))|| $role =auth()->user()->roleuser->role->role_name == 'Super Admin') {
            return $next($request);
        };
        return redirect('dashboard');
    }
}
