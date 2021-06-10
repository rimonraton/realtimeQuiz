<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function Challenge()
    {
        $quiz =  Quiz::with('quizCategory', 'progress')->paginate(9);
        $user = \Auth::user();
        return view('games.mode.practice', compact('quiz', 'user'));
    }
    public function shareChallengeBtnLink($game,$id, $uid)
    {
//        return $id;
        if (Auth::id() != $uid) {
            return redirect($game.'/' . $id . '/' . $uid);
        }
        return view('share_btn_link_challenge', compact('id', 'uid'));
    }
}
