<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Quiz;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function Challenge()
    {
        $quiz =  Quiz::with('quizCategory', 'progress')->paginate(9);
        $user = \Auth::user();
        return view('games.mode.practice', compact('quiz', 'user'));
    }
}
