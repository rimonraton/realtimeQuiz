<?php

namespace App\Http\Controllers\Game;

use App\Category;
use App\Http\Controllers\Controller;
use App\Lang\Bengali;
use App\Question;
use App\Quiz;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PracticeController extends Controller
{

  public function getLoginFromFlutter($user, $email)
  {
    	$credentials = \App\User::where('email', $email)->first();
	//Auth::logout();
	//auth()->user();

    if (Hash::check($user, $credentials->password)) {
        Auth::login($credentials);
	//return auth()->user();
        return redirect('/dashboard');
    }

  }

    public function index()
    {
        $quiz =  Quiz::where('game_id', 1)->with('quizCategory', 'progress');
        $quiz = $quiz->orderBy('id','desc')->paginate(9);
        $user = \Auth::user();
        $categories = Category::query()
            ->where('sub_topic_id', 0)
            ->where('is_published',1)
            ->where('admin_id', 1)
            ->get();
        return view('games.practice.index', compact('quiz', 'user', 'categories'));
    }

    public function getProgress($id)
    {
        $progress = Auth::user()->progress()->where('quiz_id', $id)->orderBy('id', 'desc')->get();
        return view('games.practice.progress', compact('progress'));
    }

    public function getCategory($category)
    {
        $cat_id = Category::where('bn_name', $category)->orWhere('name', $category)->first();
        if(!$cat_id) {
            $quiz =  Quiz::where('game_id', 1)->with('quizCategory', 'progress');
            $quiz = $quiz->orderBy('id','desc')->paginate(9);
            return view('games.practice.categorized', compact('quiz'));
        }
        $quiz = Quiz::with('quizCategory', 'progress')->where('category_id', $cat_id->id)->paginate(9);
        return view('games.practice.categorized', compact('quiz'));
    }

    public function Game(Quiz $quiz, $uid=null)
    {
        $gmsg = \DB::table('perform_messages')->where('game_id', 1)->get();
        $id = $quiz->id;
        $questions = Question::with('options')->whereIn('id', explode(",", $quiz->questions))->get();
        $user = \App\User::first();
        if($uid) {
            $user = Auth::user();
        }
        $user['lang'] = app()->getLocale();
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('games.practice', compact(['id', 'user', 'questions', 'gmsg', 'quiz']));
    }

}
