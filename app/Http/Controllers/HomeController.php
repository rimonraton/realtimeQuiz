<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Game;
use App\QuestionType;
use App\Role;
use App\RoleUser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Exam;
use App\Question;
use App\Quiz;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Imagick;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Lang\Bengali;
use Carbon\Carbon;
use App\User;

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


    public function ModeWithCategory($type, $category)
    {
        $quiz =  Quiz::with('quizCategory')->paginate(9);
        $user = Auth::user();
        $categories = Category::where('sub_topic_id', 0)->get();
        return view('mode', compact('quiz', 'user', 'categories', 'type'));
    }

    public function Game($type, Quiz $quiz, $uid)
    {
        if($type == 'Moderator') {
            $type = 'Quiz Master';
        }
        $game = \DB::table('games')->where('gb_game_name', $type)->first();
//        dd($game);
        $gmsg = \DB::table('perform_messages')->where('game_id', $game->id)->get();
        $id = $quiz->id;
        $questions = Question::with('options')->whereIn('id', explode(",", $quiz->questions))->get();
        // return json_encode($questions, JSON_UNESCAPED_UNICODE);
        //  $questions = $exam->questions()->with('options')->get();
        $user = Auth::user();
        $user['lang'] = app()->getLocale();
        $user['group'] = Auth::user()->group;
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('games.' . Str::slug($type), compact(['id', 'user', 'questions', 'uid', 'gmsg', 'quiz']));
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

    public function gameInAdmin($type, $id = null)
    {
        $questionHasTopics = Category::whereHas('questioncount')->withCount(['questioncount', 'easy', 'intermidiate', 'difficult'])->get();

        $admin_users = auth()->user()->admin->users()->pluck('id');

        $catName = '';
        if ($id) {
            $catName = Category::find($id)->name;
        }
        $questionType = QuestionType::all();
        $topic = Category::withCount('questions')
            ->where('sub_topic_id', 0)->get();
        $lang = $this->lang;
        $challenges_published = Challenge::whereIn('user_id',$admin_users)
            ->where('is_published',1)
            ->latest()->get();
        $challenges_own = Challenge::where('user_id',Auth::user()->id)
            ->where('is_published',0)
            ->latest()->get();
        $challenges = $challenges_published->merge($challenges_own)->paginate(12);
        return view('Admin.Games.challenge', compact(['topic', 'id', 'catName', 'questionType', 'lang', 'challenges', 'questionHasTopics']));
    }

    public function createChallenge(Request $request)
    {
//        return $request->all();
//       return $totalQ = json_decode($request->topicwiseQ)->sum('noq');
//        return sum($totalQ);
        $arrData = collect();
        foreach (json_decode($request->topicwiseQ) as $key=> $adv) {
            $q_random = Question::where('category_id',$adv->id)->where('level',$adv->difficulty_value)->where('status', 1)->inRandomOrder()->limit($adv->noq)->pluck('id');
            $arrData->push($q_random);
        }
        $q_ids =  implode(',', $arrData->collapse()->all());
        $is_published = $request->is_published ? 1 : 0;
        $cat = explode(',', $request->category);
//        $q_ids = Question::whereIn('category_id', $cat)->where('status', 1)->inRandomOrder()->limit($request->qq)->pluck('id')->toArray();
        $name = $request->name;
        if($name == '' || $name == null){
            $name = 'Challenge-'. (Challenge::max('id') + 1 );
        }

        $challenge = new Challenge();
        $challenge->name = $name;
        $challenge->user_id = auth()->user()->id;
        $challenge->quantity = $request->qq;
//        $challenge->question_id = implode(',', $q_ids);
        $challenge->question_id =  $q_ids;
        $challenge->cat_id = $request->category;
        $challenge->qt_id = implode(',', $request->question_type);
        $challenge->schedule = $request->schedule;
        $challenge->share_link = Str::random(50);
        $challenge->is_published = $is_published;
        $challenge->save();

        return redirect()->back();
    }
    public function Challenge(Challenge $challenge, $uid)
    {
        $gmsg = \DB::table('perform_messages')->where('game_id', 2)->get();
        // $id = $challenge;
        $questions = Question::with('options')
            ->whereIn('id', explode(",", $challenge->question_id))->get();
        $user = Auth::user();
//        return gettype($user);
        $user['lang'] = app()->getLocale();
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('games.challenge', compact(['challenge', 'user', 'questions', 'uid', 'gmsg']));

    }
    public function Team(Quiz $quiz, $uid)
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
        $user['lang'] = app()->getLocale();
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('games.teamwisequiz', compact(['id', 'user', 'questions', 'uid', 'gmsg','team','topic', 'quiz']));

    }

    public function challenge_setup()
    {

        $admin_users = auth()->user()->admin->users()->pluck('id');
        $role_id = Auth::user()->roleuser->role_id;
        $role_user = RoleUser::with('users')->where('role_id','<',3)->pluck('user_id');
       if($role_id < 3){
           $challange = Challenge::whereIn('user_id',$role_user)->latest()->paginate(10);
       }
       else{
           $challange =  Auth::user()->challange()->latest()->paginate(10);
       }

        return view('Admin.Games.challenge_setup',compact('challange',));
    }

    public function challenge_publish(Request $req)
    {

        Challenge::where('id',$req->id)->update([
            'is_published'=>$req->value
        ]);
        return 'success';
    }

    public function delete_challange($id)
    {
        Challenge::where('id',$id)->delete();
        return 'Deleted Successfully';
    }

    public function challange_search($keyword)
    {
        $role_id = Auth::user()->roleuser->role_id;
        $role_user = RoleUser::with('users')->where('role_id','<',3)->pluck('user_id');
        if ($keyword == 'all'){
            if($role_id < 3){
                $challange = Challenge::whereIn('user_id',$role_user)->latest()->paginate(10);
            }
            else{
                $challange =  Auth::user()->challange()->latest()->paginate(10);
            }
            return view('Admin.Games.partials._challange_search',compact('challange'));
        }
        if($role_id < 3){
            $challange = Challenge::whereIn('user_id',$role_user)->where('name', 'like', '%' . $keyword . '%')->paginate(10);
        }
        else{
            $challange =  Challenge::where('user_id',Auth::user()->id)->where('name', 'like', '%' . $keyword . '%')->paginate(10);
        }

        return view('Admin.Games.partials._challange_search',compact('challange'));
    }

    public function updateChallengeOptionLayout(Request $request)
    {
      $challenge =  Challenge::find($request->id);
      $challenge->update([
          'option_view_time' => $request->value
      ]);
      return 'updated successfully';
    }
}
