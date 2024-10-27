<?php

namespace App\Http\Controllers\Game;

use App\Category;
use App\Game;
use App\Http\Controllers\Controller;
use App\Lang\Bengali;
use App\Question;
use App\Quiz;
//use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $selected_category = Category::find(request()->input('category'));
        $quiz =  Quiz::query()
          ->where('game_id', 1)
          ->where('status', 1)
          ->when($selected_category, function ($query) use($selected_category){
            return $query->where('category_id', $selected_category->id);
          })
          ->with('quizCategory', 'progress')
          ->orderBy('id','desc')
          ->paginate(9);
        $user = Auth::user();
        $categories = Category::query()
            ->where('sub_topic_id', 0)
            ->where('is_published',1)
            ->where('admin_id', 1)
//            ->orderBy('name')
            ->get();
        return view('games.practice.index', compact('quiz', 'user', 'categories', 'selected_category'));
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
            $quiz =  Quiz::where('game_id', 1)->published()->with('quizCategory', 'progress');
            $quiz = $quiz->orderBy('id','desc')->paginate(9);
            return view('games.practice.categorized', compact('quiz'));
        }
        $quiz = Quiz::published()->with('quizCategory', 'progress')->where('category_id', $cat_id->id)->paginate(9);
        return view('games.practice.categorized', compact('quiz'));
    }

    public function Game(Quiz $quiz, $uid=null)
    {
        $gmsg = \DB::table('perform_messages')->where('game_id', 1)->get();
        $id = $quiz->id;
        $questions = Question::with('options')
          ->whereIn('id', explode(",", $quiz->questions))
          ->get();
        $user = \App\User::first();
        if($uid) {
            $user = Auth::user();
        }
        $user['lang'] = app()->getLocale();
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('games.practice', compact(['id', 'user', 'questions', 'gmsg', 'quiz']));
    }

  public function quizPractice()
  {
    $practices = Quiz::query()
      ->where('game_id', 1)
      ->where('admin_id', Auth::user()->admin->id)
      ->orderBy('id','desc')
      ->paginate(50);
    return view('Admin.Games.practice.index',compact('practices'));
  }
  public function quizPracticeCreate()
  {
    $admin = auth()->user()->admin;
    $admin_users = $admin->users()->pluck('id');
    $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
    // $question_category = QuizCategory::all();
    $gameType = Game::all();
    return view('Admin.Games.practice.cteate', compact(['question_topic', 'gameType']));
  }

  public function publishPractice(Request $req): string
  {
    Quiz::where('id',$req->id)->update([
      'status'=> $req->value
    ]);
    return 'success';
  }

  public function deletePractice($id)
  {
    Quiz::where('id',$id)->delete();
    return 'Deleted Successfully';
  }
  public function updatePractice(Request $request)
  {
    //return $request->all();
    $quiz = Quiz::find($request->id);
    $quiz->quiz_name = $request->name;
    $quiz->bd_quiz_name = $request->bd_name;
    $quiz->update();
    return $quiz;
  }

  public function practiceViewQuestions(Quiz $quiz)
  {
    return $quiz;
  }

  public function quizPracticeSave(Request $request)
  {
    $questions = '';

    $admin = auth()->user()->admin;
    if ($request->NOQ){
      $admin_users = $admin->users()->pluck('id');
      $q_random = Question::where('category_id',$request->cid)
        ->whereIn('user_id',$admin_users)
        ->where('status', 1)
        ->inRandomOrder()
        ->limit($request->NOQ)
        ->pluck('id')
        ->toArray();
      $questions =  implode(',',$q_random);
    }
    else{
      $questions = $request->selected;
    }
    Quiz::create([
      'quiz_name'         => $request->quizName,
      'bd_quiz_name'      => $request->bdquizName,
      'game_id'           => 1,
      'questions'         => $questions,
      'category_id'       => $request->cid,
      'difficulty'        => $request->difficulty,
      'admin_id'           => $admin->id,
      'user_id'           => auth()->user()->id,
    ]);
    return redirect('quizPractice');
  }

  public function game_quiz_create()
  {
    $teams = Team::all();
    $admin = auth()->user()->admin;
    $admin_users = $admin->users()->pluck('id');
    $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
    // $question_category = QuizCategory::all();
    $gameType = Game::all();
    return view('games.game_quiz_cteate', compact(['question_topic', 'gameType','teams']));
  }

}
