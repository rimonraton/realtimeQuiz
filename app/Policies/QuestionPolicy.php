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
//        dd($user);
        if ($user->roleuser->role_id === 6) {
            return false;
        } else if ($user->roleuser->role_id === 1) {
            return $user->id === $question->user_id;
        } elseif ($user->roleuser->role_id === 5) {
            return true;
        }
    }
}
