<?php

namespace App\Policies;

use App\File;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FilePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, File $file)
    {
      if($user->admin->id === $file->admin_id && $file->status === 1) {
        return Response::allow();
      }
        return $user->id === $file->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
        //return $user->id === $file->user_id;
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    public function delete(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }


    public function restore(User $user, File $file)
    {
        //
    }


    public function forceDelete(User $user, File $file)
    {
        //
    }

    public function before($user, $ability, ...$arguments)
    {
        if($user->hasRole('Super Admin')){
          return true;
        }
//        if ($user->roleuser->role_id ==1) {
//            return true;
//        }
        if (isset($arguments[0]) && $arguments[0] instanceof File)
        {
            $file = $arguments[0];
            if ($user->hasRole('Admin')){
                return $user->admin->id === $file->admin_id;
            }

        }
        return null;
    }
}
