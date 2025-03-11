<?php

namespace App\Policies;

use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
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
    public function QuestionreadOrwrite(User $user, Question $question)
    {
//        dd($user->roleuser->role->role_name);
        if ($user->roleuser->role_id === 5) {
            return false;
        }
//        else if ($user->roleuser->role_id === 1) {
//            return $user->id === $question->user_id;
//        }
        elseif ($user->roleuser->role_id < 3 ) {
            return true;
        }
    }

    public function QM (User $user){
        if ($user->roleuser->role_id === 3){
            return true;
        }
        else if($user->roleuser->role_id === 4 || $user->roleuser->role_id === 5){
            return false;
        }
        return true;
    }
}
