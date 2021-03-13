<?php

namespace App\Policies;

use App\Question;
use App\Quiz;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function update(User $user, Quiz $quiz)
    {
        if ($user->roleuser->role_id === 4||$user->roleuser->role_id === 5) {
            return false;
        }
        return $user->id === $quiz->user_id;
    }

    public function delete(User $user, Quiz $quiz)
    {
        if ($user->roleuser->role_id === 5) {
            return false;
        }
        return $user->id === $quiz->user_id;
    }
    public function publish(User $user, Quiz $quiz)
    {
        if ($user->roleuser->role_id === 5) {
            return false;
        }
        return $user->id === $quiz->user_id;
    }
    public function create(User $user)
    {
        // return true;
//        return $user->roleuser->role_id < 6;
        if ($user->roleuser->role_id === 4 || $user->roleuser->role_id === 5){
            return false;
        }
        return true;
    }

    public function readOrwrite(User $user, Quiz $quiz)
    {
        if ($user->roleuser->role_id === 5) {
            return false;
        } else if ($user->roleuser->role_id === 3) {
            return $user->id === $quiz->user_id;
        } elseif ($user->roleuser->role_id === 1 || $user->roleuser->role_id === 2) {
            return true;
        }
    }


    public function readOwrite(User $user)
    {
//        dd($user->roleuser->role_id);
        // return true;
//        return $user->roleuser->role_id < 6;
        if ($user->roleuser->role_id === 5||$user->roleuser->role_id == 3) {
            return false;
        } elseif ($user->roleuser->role_id === 1) {
            return true;
        }
        elseif ($user->roleuser->role_id === 2){
            return true;
        }
    }

    public function viewQuestion(User $user ){
        if ($user->roleuser->role_id === 5 || $user->roleuser->role_id ===3) {
            return false;
        }
        return true;
    }

}
