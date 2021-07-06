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

        $quiz =  Quiz::with('quizCategory', 'progress');
        $quiz = $quiz->orderBy('id','desc')->paginate(9);

        $user = \Auth::user();
        $categories = Category::where('sub_topic_id', 0)->get();
        return view('mode', compact('quiz', 'user', 'categories', 'type', 'ban'));
    }

    public function getCategory($type, $category)
    {
        if($category == 'Select Quiz Category'){
            $quiz = Quiz::with('quizCategory', 'progress')->paginate(9);
            return view('categorized', compact('quiz', 'type'));
        }
        $cat_id = Category::where('bn_name', $category)->orWhere('name', $category)->first()->id;
        $quiz = Quiz::with('quizCategory', 'progress')->where('category_id', $cat_id)->paginate(9);
        return view('categorized', compact('quiz', 'type'));
    }

}
