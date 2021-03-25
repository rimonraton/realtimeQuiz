<?php

namespace App\Http\Controllers\Game;

use App\Category;
use App\Http\Controllers\Controller;
use App\Lang\Bengali;
use App\Quiz;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function Practice()
    {
        $quiz =  Quiz::with('quizCategory', 'progress')->paginate(9);
        $user = \Auth::user();
        return view('games.mode.practice', compact('quiz', 'user'));
    }
}
