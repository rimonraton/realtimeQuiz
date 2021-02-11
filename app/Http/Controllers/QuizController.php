<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\Question;
use App\QuestionsOption;
use App\Quiz;
use App\QuizCategory;
use BeyondCode\LaravelWebSockets\Apps\App;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        $question_topic = Category::where('sub_topic_id', 0)->get();
        // $question_category = QuizCategory::all();
        $gameType = Game::all();
        return view('Admin.PartialPages.Quiz.quiz_create', compact(['question_topic', 'gameType']));
    }

    public function list($tid = '')
    {
        $catName = '';
        if ($tid) {
            if (app()->getLocale() == 'gb') {
                $catName = Category::find($tid)->name;
            } else {
                $catName = Category::find($tid)->bn_name;
            }
        }
        $category = Category::where('sub_topic_id', 0)->get();
        return view('Admin.PartialPages.Quiz.quiz_list', compact('category', 'tid', 'catName'));
    }

    public function getQuestionsByTopic($id)
    {
        $questions = QuizCategory::with(['questions' => function ($q) use ($id) {
            $q->where('category_id', $id);
        }])->get();

        return view('Admin.PartialPages.Quiz.Partial.questions_list', compact('questions'));
    }

    public function store(Request $request)
    {
        //  return $request->all();
        if ($request->quizCreateType == 'qb') {
            $this->storeFromQB($request);
            return redirect('quiz/view/list/' . $request->cid);
        }
        $this->storeFromCustom($request);

        return redirect('quiz/view/list/' . $request->cid);
    }

    public function storeFromQB($request)
    {
        $questions = array();
        foreach ($request->questions as $q) {
            $questions[] = $q;
        }
        $questionsid = implode(',', $questions);
        Quiz::create([
            'quiz_name'         => $request->quizName,
            'bd_quiz_name'      => $request->bdquizName,
            'game_id'           => $request->game_type,
            'questions'         => $questionsid,
            'category_id'       => $request->cid,
            'difficulty'       => $request->difficulty,
        ]);
    }
    public function storeFromCustom($request)
    {
        $questionId = array();
        foreach ($request->question as  $k => $qq) {
            $bdoptions = 'bdoption' . $k;
            $options = 'option' . $k;
            $answers = 'answer' . $k;
            $qid = Question::create([
                'question_text'         => $qq,
                'bd_question_text'      => $request->bdquestion[$k],
                'answer_explanation'    => $request->explenation[$k],
                'category_id'           =>  $request->cid,
                'quizcategory_id'       =>  1,
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
        Quiz::create([
            'quiz_name'         => $request->quizName,
            'bd_quiz_name'      => $request->bdquizName,
            'game_id'           => $request->game_type,
            'questions'         => $questions,
            'category_id'       => $request->cid,
            'custom_create'     => 1,
            'difficulty'       => $request->difficulty,
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
        $quiz = Quiz::orderBy('id', 'desc')->where('category_id', $id)->get();
        return view('Admin.PartialPages.Quiz.Partial.quizzes_list', compact('quiz'));
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
        // return $request->all();
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
                    // 'quizcategory_id'       =>  1,
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
}
