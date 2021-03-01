<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Game;
use App\QuestionType;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Exam;
use App\Question;
use App\Quiz;
use Illuminate\Support\Facades\Http;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Lang\Bengali;
use Carbon\Carbon;

class HomeController extends Controller
{
    public $lang;

    public function __construct()
    {
        $this->middleware('auth');
        $this->lang = app()->getLocale();
    }


    public function registerFunction1(Request $r)
    {
        return $r->all();
    }

    public function Mode($type, $category = null)
    {
        $ban = new Bengali();

        $quiz =  Quiz::with('quizCategory', 'progress');
        $quiz->when($category, function($q) use($category){
          return $q->where('category_id', $category);
        });
        $quiz = $quiz->paginate(9);

        $user = Auth::user();
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

    public function ModeWithCategory($type, $category)
    {
        $quiz =  Quiz::with('quizCategory')->paginate(9);
        $user = Auth::user();
        $categories = Category::where('sub_topic_id', 0)->get();
        return view('mode', compact('quiz', 'user', 'categories', 'type'));
    }

    public function Game($type, Quiz $quiz, $uid)
    {
        $game = \DB::table('games')->where('gb_game_name', $type)->first();
        $gmsg = \DB::table('perform_messages')->where('game_id', $game->id)->get();
        $id = $quiz->id;
        $questions = Question::with('options')->whereIn('id', explode(",", $quiz->questions))->get();
        // return json_encode($questions, JSON_UNESCAPED_UNICODE);
        //  $questions = $exam->questions()->with('options')->get();
        $user = Auth::user();
        $user['lang'] = app()->getLocale();
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('games.' . strtolower($type), compact(['id', 'user', 'questions', 'uid', 'gmsg']));
    }


    public function home()
    {
        $user = Auth::user();
        $ce = Category::with('exams')->get();
        $exams = Exam::where('subject_id', 153)
            ->where('course_id', 44)
            ->where('exam_type', 'mcq')
            ->where('is_site', 1)
            ->paginate(9);
        return view('home', compact('exams', 'user', 'ce'));
    }
    public function game2($id, $uid)
    {
        $exam = \App\Exam::findOrFail($id);
        $questions = $exam->questions()->with('options')->get();
        $user = Auth::user();
        return view('game', compact('id', 'user', 'questions', 'uid'));
    }
    public function singleGame($id, $user)
    {
        $exam = \App\Exam::findOrFail($id);
        $questions = $exam->questions()->with('options')->get();
        $user = Auth::user();
        return view('singleGame', compact('id', 'user', 'questions'));
    }

    public function shareBtnLink($type, $id, $uid)
    {
        if (Auth::id() != $uid) {
            return redirect('Mode/' . $type . '/' . $id . '/' . $uid);
        }
        return view('share_btn_link', compact('type', 'id', 'uid'));
    }

    public function getProgress($id)
    {
        $progress = Auth::user()->progress->where('quiz_id', $id);
        return view('quiz_progress', compact('progress'));
    }

    public function gameInAdmin($type,$id = null)
    {
        $catName = '';
        if ($id) {
            $catName = Category::find($id)->name;
        }
        $questionType = QuestionType::all();
        $topic = Category::withCount('questions')->where('sub_topic_id', 0)->get();
        $lang = $this->lang;
        return view('Admin.Games.challenge', compact(['topic', 'id', 'catName', 'questionType', 'lang']));
    }

    public function createChallenge(Request $request)
    {
        $cat = explode(',', $request->category);
        $q_ids =Question::whereIn('category_id', $cat)->inRandomOrder()->limit($request->qq)->pluck('id')->toArray();
        $name =$request->name;
        if($name == '' || $name == null){
            $name = 'Challenge-'. (Challenge::max('id') + 1 );
        }

        $challenge = new Challenge();
        $challenge->name = $name;
        $challenge->user_id = auth()->user()->id;
        $challenge->quantity = $request->qq;
        $challenge->question_id = implode(',', $q_ids);
        $challenge->cat_id = $request->category;
        $challenge->qt_id = implode(',', $request->question_type);
        $challenge->schedule = $request->schedule;
        $challenge->save();

        return $request->all();

        return Question::whereIn('category_id', $cat)->inRandomOrder()->limit($request->qq)->get();
        return $request->all();
    }

}
