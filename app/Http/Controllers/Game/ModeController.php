<?php

namespace App\Http\Controllers\Game;

use App\Category;
use App\Http\Controllers\Controller;
use App\Lang\Bengali;
use App\Quiz;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    public function Mode($type)
    {
        if(!\Auth::check()) {
            if ($type != 'Practice') return redirect('login');
        }
        $ban = new Bengali();

        $quiz =  Quiz::where('game_id', 1)->with('quizCategory', 'progress');
        $quiz = $quiz->orderBy('id','desc')->paginate(9);

        $user = \Auth::user();
        $categories = Category::query()
            ->where('sub_topic_id', 0)
            ->where('is_published',1)
            ->where('admin_id', 1)
            ->get();
        return view('practice', compact('quiz', 'user', 'categories', 'type', 'ban'));
    }



}
