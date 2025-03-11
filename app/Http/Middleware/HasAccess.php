<?php

namespace App\Http\Middleware;

use App\Http\Facades\Permission;
use App\Http\Traits\hasPermission;
use Closure;
use Illuminate\Support\Facades\Route;

class HasAccess
{
//    use hasPermission;
    public function handle($request, Closure $next)
    {
      if (auth()->user()){
        if(auth()->user()->roleuser->role->role_name == 'Super Admin'){
          return $next($request);
        }

        $routeName = Route::currentRouteName();

        if (Permission::can($routeName) || $routeName == 'flutter.login') {
          return $next($request);
        };
      }
//      return redirect('dashboard');
      return $next($request);

    }

}
