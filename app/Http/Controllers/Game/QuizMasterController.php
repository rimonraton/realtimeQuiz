<?php

namespace App\Http\Controllers\Game;

use App\Category;
use App\Game;
use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;
use App\Team;
use Auth;
use Carbon\Carbon;

class QuizMasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->lang = app()->getLocale();
    }

    public function index()
    {
        $quizzes = Quiz::query()
            ->where('game_id', 4)
//            ->where('user_id', Auth::id())
                ->where('admin_id', Auth::user()->admin->id)
            ->orderBy('id','desc')
            ->get();
        return view('games.quiz_master.index',compact('quizzes'));
    }

    public function quizMasterCreate()
    {
//        return 'quizMasterCreate';
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        // $question_category = QuizCategory::all();
        $gameType = Game::all();
        return view('games.quiz_master.cteate', compact(['question_topic', 'gameType']));
    }
    public function quizMasterStart(Quiz $quiz, $uid)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $topic = Category::whereIn('user_id',$admin_users)->get();

        $team = \App\Team::whereIn('id',explode(',',$quiz->team_ids))->get();
        $gmsg = \DB::table('perform_messages')->where('game_id', 3)->get();
        $id = $quiz->id;
        $questions = Question::with('options')
            ->whereIn('id', explode(",", $quiz->questions))->get();
        $user = Auth::user();
        $user['lang'] = $this->lang;
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');

        return view('games.quiz_master', compact(['id', 'user', 'questions', 'uid', 'gmsg','team','topic', 'quiz']));

    }
}
