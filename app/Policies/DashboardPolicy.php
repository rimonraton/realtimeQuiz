<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function view(User $user ){
        $role_id =$user->roleuser->role_id;
        if ($role_id < 3  ) {
            return true;
        }
        elseif($role_id )
        return true;
    }
}
