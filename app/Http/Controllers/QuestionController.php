<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\QuestionsOption;
use App\QuizCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Questions Category
    public function index()
    {
        //  $c = array(Category::find(13)->name);
        //  $c = Category::find(13)->name;
        //  implode(", ",array_keys($c));
        // $values  = explode(",", $c);

        //    return Question::whereIn('id', $values)->get();
        // dd($values);
        $category = Category::orderBy('id', 'desc')->get();
        return view('Admin.PartialPages.Questions.category', compact('category'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        $parentId = '';
        if ($request->topic == '') {
            $parentId = 0;
        } else {
            $parentId = $request->topic;
        }
        // return $parentId;
        Category::create([
            'name' => $request->name,
            'sub_topic_id' => $parentId
        ]);
        return redirect('question/category');
    }
    public function update(Request $request)
    {
        Category::where('id', $request->id)->update(['name' => $request->name]);
        return redirect('question/category');
    }
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return "Delete Successfully.";
    }
    // End category

    // Questions
    public function list($id ='')
    {
        $topic = Category::all();
        // $Qcategory = QuizCategory::all();
        return view('Admin.PartialPages.Questions.questions_list', compact('topic','id'));
    }
    public function create()
    {
        $category = Category::where('sub_topic_id', 0)->get();
        $quizCategory = QuizCategory::all();
        return view('Admin.PartialPages.Questions.questions_create', compact(['category', 'quizCategory']));
    }
    public function storeQuestion(Request $request)
    {
        // return $request->all();
        // $request->validate([
        //     'category_id' => 'required',
        //     'question_text' => 'required',
        //     'option' => 'required',
        //     'correct' => 'required',
        // ]);
        $categoryid = $request->cid;
        $location = '';
        $imgPath = '';
        if ($request->customRadio == 'image') {
            $location = 'images/question_images/';
        } else {
            $location = 'videos/question_videos/';
        }
        // if ($request->subtopic == '') {
        //     $categoryid = $request->category;
        // } else {
        //     $categoryid = $request->subtopic;
        // }
        // return $categoryid;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $original_name = $file->getClientOriginalName();
            $ext = strtolower(\File::extension($original_name));
            $created_at = Carbon::now('Asia/Dhaka');
            $t = $created_at->timestamp;
            $r = Str::random(40);
            $random_name = $t . '' . $r . '.' . $ext;
            $path = public_path() . '/' . $location;
            $filename = $location . $random_name;
            $file->move($path, $filename);
            $imgPath = $filename;
        }
        // return $imgPath;
        $question = Question::create([
            'category_id' => $categoryid,
            'quizcategory_id' => $request->questionType,
            'question_text' => $request->question,
            'question_file_link' => $imgPath,
            'answer_explanation' => $request->explenation,
            'user_id' => Auth::user()->id,
            // 'created_at' => Carbon::,
        ]);
        foreach ($request->option as  $k => $o) {
            $data[$k]['question_id'] = $question->id;
            $data[$k]['option'] = $o;
        }
        foreach ($request->ans as  $k => $a) {
            $data[$k]['correct'] = $a;
        }
        QuestionsOption::insert($data);
        return redirect('question/list/view' . '/' . $categoryid);
    }
    public function getlist($id)
    {
        $questions = QuizCategory::with(['questions' => function ($q) use ($id) {
            $q->where('category_id', $id);
        }, 'questions.options'])->get();
        return view('Admin.PartialPages.Questions.questions_data', compact('questions'));
    }

    public function editQuestion($id)
    {
        $QwithO = Question::with('options')->where('id', $id)->first();
        return view('Admin.PartialPages.Questions.question', compact('QwithO'));
    }
    public function updateQuestion(Request $request)
    {
        //  return $request->all();
        // return $request->cid;
        Question::where('id', $request->qid)->update([
            'question_text' => $request->question
        ]);
        foreach ($request->option as  $k => $o) {
            QuestionsOption::where('id', $request->oid[$k])->update([
                'option' => $o,
                'correct' => $request->ans[$k]
            ]);
        }
        if ($request->cid) {
            return redirect('question/list/view/' . $request->cid);
        } else {
            return redirect('question/list/'.$request->cat_id);
        }
    }

    public function deleteQuestion($id)
    {
        Question::where('id', $id)->delete();
        QuestionsOption::where('question_id', $id)->delete();
        return redirect('question/list');
    }

    public function getQuestiontoday($id)
    {
        $today = Carbon::parse(Carbon::now())->format('Y-m-d');
        // return $question = Question::where('created_at', '>', $today)->get();
        $questions =  QuizCategory::with(['questions' => function ($q) use ($today, $id) {
            $q->where('created_at', '>', $today);
            $q->where('category_id', $id);
        }, 'questions.options'])->get();
        return view('Admin.PartialPages.Questions.questions_list_today', compact('questions', 'id'));
    }
    // End Questins
}
