<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\Lang\Bengali;
use App\Question;
use App\QuestionsOption;
use App\QuestionType;
use App\Quiz;
use App\QuizCategory;
use App\Team;
use BeyondCode\LaravelWebSockets\Apps\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        $teams = Team::all();
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
         $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        // $question_category = QuizCategory::all();
        $gameType = Game::all();
        return view('Admin.PartialPages.Quiz.quiz_create', compact(['question_topic', 'gameType','teams']));
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
    public function list($tid = '')
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $catName = '';
        if ($tid) {
            if (app()->getLocale() == 'gb') {
                $catName = Category::find($tid)->name;
            } else {
                $catName = Category::find($tid)->bn_name;
            }
        }

        $category = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        return view('Admin.PartialPages.Quiz.quiz_list', compact('category', 'tid', 'catName'));
    }

    public function getQuestionsByTopic($id)
    {
        $page = \request()->page;
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');

        $id = explode(',',$id);
//        $questions = QuestionType::with(['questions' => function ($q) use ($id) {
//            $q->where('category_id', $id);
//        }])->get();
        $questions = QuestionType::all();

        return view('Admin.PartialPages.Quiz.Partial.questions_list', compact('questions','id','admin_users','page'));
    }

    public function store(Request $request)
    {
//          return $request->all();
        if ($request->quizCreateType == 'qb') {
            $this->storeFromQB($request);
            return redirect('quiz/view/list/' . $request->cid);
        }
         $this->storeFromCustom($request);

        return redirect('quiz/view/list/' . $request->cid);
    }
    public function game_quiz_save(Request $request)
    {
//          return $request->all();
        if ($request->quizCreateType == 'qb') {
            $this->storeFromQB($request);
            return redirect('team_quiz');
        }
//        $this->storeFromCustom($request);
//
//        return redirect('team_quiz');
    }

    public function storeFromQB($request)
    {
        $questions = '';
        $team_id = null;

          if ($request->NOQ){
              $admin = auth()->user()->admin;
              $admin_users = $admin->users()->pluck('id');
              $q_random = Question::where('category_id',$request->cid)->whereIn('user_id',$admin_users)->inRandomOrder()->limit($request->NOQ)->pluck('id')->toArray();
              $questions =  implode(',',$q_random);
//              return 'Number-'.$questions;
          }
          else{
              $questions = $request->selected;
//              return 'No Number -'.$questions;
          }
//        $questions = array();
//        foreach ($request->questions as $q) {
//            $questions[] = $q;
//        }
        if($request->teams){
            $team_id = implode(',', $request->teams);
        }
//        return $team_id;
        Quiz::create([
            'quiz_name'         => $request->quizName,
            'bd_quiz_name'      => $request->bdquizName,
            'game_id'           => $request->game_type,
            'questions'         => $questions,
            'category_id'       => $request->cid,
            'difficulty'        => $request->difficulty,
            'user_id'           => auth()->user()->id,
            'team_ids'          =>$team_id,
            'quiz_time'          =>$request->quizTime,
        ]);
    }
    public function storeFromCustom($request)
    {
        $team_id = null;
         $value = explode(',',$request->selectedindex);
//        return $value[2];
//        $option_value = 0;
        $questionId = array();
        foreach ($request->question as  $k => $qq) {
              $f = $value[$k];

//            if($request->option1){
//                return 'anmi text';
//            }
            $bdoptions = 'bdoption' . $f;
            $options = 'option' . $f;
            $answers = 'answer' . $f;
            $qid = Question::create([
                'question_text'         => $qq,
                'bd_question_text'      => $request->bdquestion[$k],
                'answer_explanation'    => $request->explenation[$k],
                'category_id'           =>  $request->cid,
                'quizcategory_id'       =>  1,
                'user_id'           => auth()->user()->id,
            ])->id;
            $questionId[] = $qid;
            foreach ($request->$options as  $i => $o) {
                $data[$i]['question_id'] = $qid;
                $data[$i]['option'] = $o;
                $data[$i]['bd_option'] = $request->$bdoptions[$i];
                $data[$i]['correct'] = $request->$answers[$i];
            }
            QuestionsOption::insert($data);
            $data = null;
        }

        $questions = implode(',', $questionId);
        if($request->teams){
            $team_id = implode(',', $request->teams);
        }
        Quiz::create([
            'quiz_name'         => $request->quizName,
            'bd_quiz_name'      => $request->bdquizName,
            'game_id'           => $request->game_type,
            'questions'         => $questions,
            'category_id'       => $request->cid,
            'custom_create'     => 1,
            'difficulty'        => $request->difficulty,
            'user_id'           => auth()->user()->id,
            'team_ids'          =>$team_id,
            'quiz_time'          =>$request->quizTime,
        ]);
    }
    public function quiz($id)
    {
        $q = Quiz::find($id);
        $Questions = Question::with('options')->whereIn('id', explode(",", $q->questions))->get();
        return view('Admin.PartialPages.Quiz.Partial.questionwithOption', compact('Questions', 'q'));
    }

    public function quizList($id)
    {
         $role = auth()->user()->roleuser->role->role_name;
         $admin = auth()->user()->admin;
         $admin_users = $admin->users()->pluck('id');
         if ($role ==='Quiz Master'){
             $quiz = Quiz::orderBy('id', 'desc')->where('category_id', $id)->whereIn('user_id',$admin_users)->where('game_id', 1)->where('user_id',auth()->user()->id)->paginate(10);
             return view('Admin.PartialPages.Quiz.Partial.quizzes_list', compact('quiz','role'));
         }
         else{
             $games = Game::all();
             $quizgame = Game::with(['quiz'=>function($q) use ($id,$admin_users){
                 $q->where('category_id', $id)->whereIn('user_id',$admin_users);
             }])->get();
            $quiz = Quiz::orderBy('id', 'desc')->where('category_id', $id)->whereIn('user_id',$admin_users)->where('game_id', 1)->paginate(10);
            return view('Admin.PartialPages.Quiz.Partial.quizzes_list', compact('quiz','role','id','admin_users','games'));
         }

//        return view('Admin.PartialPages.Quiz.Partial.quizzes_list', compact('quiz','role','id','admin_users','games'));
    }
    public function deleteQuiz($id)
    {
        Quiz::where('id', $id)->delete();
        return "Deleted Successfully";
    }
    public function getlistbytopic($topic)
    {
        return 'success';
    }

    public function quizEdit($id)
    {
        $quiz = Quiz::find($id);
        $Questions = Question::with('options')->whereIn('id', explode(",", $quiz->questions))->get();
        return view('Admin.PartialPages.Quiz.Edit.quiz_edit', compact(['Questions', 'quiz']));
    }
    public function quizUpdate(Request $request)
    {
//         return $request->all();
//        return auth()->user()->id;
        $qa = $request->questions;
        $questionId = array();
        if ($request->question) {
            foreach ($request->question as  $k => $qq) {
                $options = 'option' . $k;
                $bdoptions = 'bdoption' . $k;
                $answers = 'answer' . $k;
                $qid = Question::create([
                    'question_text'         => $qq,
                    'bd_question_text'      => $request->bdquestion[$k],
                    'answer_explanation'    => $request->explenation[$k],
                    'category_id'           =>  $request->category_id,
                    'quizcategory_id'       =>  1,
                    'user_id' =>auth()->user()->id,
                ])->id;
                $questionId[] = $qid;
                array_push($qa, $qid);
                foreach ($request->$options as  $i => $o) {
                    $data[$i]['question_id'] = $qid;
                    $data[$i]['option'] = $o;
                    $data[$i]['bd_option'] = $request->$bdoptions[$i];
                    $data[$i]['correct'] = $request->$answers[$i];
                }
                QuestionsOption::insert($data);
                $data = null;
            }
        }
        // return $qa;
        $questions = implode(',', $qa);
        // return $questions;
        Quiz::where('id', $request->quiz_id)->update([
            "questions" => $questions,
            "quiz_name" => $request->quizName,
            "bd_quiz_name" => $request->bdquizName,
        ]);
        return redirect('quiz/' . $request->quiz_id . '/edit');
    }
    public function quizdelete($quiz_id, $question_id)
    {
        $quiz = Quiz::find($quiz_id);
        $questions = explode(",", $quiz->questions);
        array_splice($questions, array_search($question_id, $questions), 1);
        $q = implode(',', $questions);
        Quiz::where('id', $quiz_id)->update([
            "questions" => $q
        ]);
        return redirect()->back();
    }

    public function quizPublished(Request $request)
    {
        //    return $request->all();
        Quiz::where('id', $request->id)->update([
            'status' => $request->value
        ]);
        if ($request->value) {
            return "Quiz Published";
        } else {
            return "Quiz Unpublished";
        }
    }

    public function quizTimeUpdate(Request $request)
    {
//      return  [$request->value ? $request->value : 0, $request->all()];
      $qtime = $request->value ? $request->value : 0;
      $quiz = Quiz::find($request->id);
      $quiz->update([
          'quiz_time' => $qtime
      ]);
      return $quiz;
    }
}
