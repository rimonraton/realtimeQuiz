<?php

namespace App\Http\Controllers;

use App\QuestionType;
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

        $admin_users = \auth()->user()->admin->users()->pluck('id');
        $category = Category::whereIn('user_id',$admin_users)->orderBy('id', 'desc')->paginate(10);
        $category_all = Category::whereIn('user_id',$admin_users)->where('sub_topic_id',0)->orderBy('id', 'desc')->get();
        return view('Admin.PartialPages.Questions.category', compact('category','category_all'));
    }
    public function store(Request $request)
    {
        //  return $request->all();
        $request->validate([
            'name' => 'required',
            // 'bn_name' => 'required',
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
            'bn_name' => $request->bn_name,
            'sub_topic_id' => $parentId,
            'user_id'=>\auth()->user()->id,

        ]);
        return redirect('question/category');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'bn_name' => 'required',
        ]);
        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'bn_name' => $request->bn_name,
            'sub_topic_id'=>$request->parent
        ]);
        return redirect('question/category');
    }
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return "Delete Successfully.";
    }
    // End category

    // Questions
    public function list($id = '')
    {
        $catName = '';
        if ($id) {
            $catName = Category::find($id)->name;
        }
        $topic = Category::where('sub_topic_id', 0)->get();
        return view('Admin.PartialPages.Questions.questions_list', compact(['topic', 'id', 'catName']));
    }
    public function create()
    {
        $category = Category::where('sub_topic_id', 0)->get();
        $quizCategory = QuestionType::all();
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
            $file = $request->file('file');
        } else {
            $location = 'videos/question_videos/';
            $file = $request->file('video');
        }
        if ($request->hasFile('file') || $request->hasFile('video')) {
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
        $question = Question::create([
            'category_id' => $categoryid,
            'quizcategory_id' => $request->questionType,
            'question_text' => $request->question,
            'bd_question_text' => $request->questionbd,
            'question_file_link' => $imgPath,
            'answer_explanation' => $request->explenation,
            'bd_answer_explanation' => $request->bdexplenation,
            'user_id' => Auth::user()->id,
            // 'created_at' => Carbon::,
        ]);
        foreach ($request->option as  $k => $o) {
            $data[$k]['question_id'] = $question->id;
            $data[$k]['option'] = $o;
        }
        foreach ($request->optionbd as  $k => $o) {
            $data[$k]['bd_option'] = $o;
        }
        foreach ($request->ans as  $k => $a) {
            $data[$k]['correct'] = $a;
        }
        QuestionsOption::insert($data);
        return redirect('question/list/view' . '/' . $categoryid);
    }
    public function getlist($id)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');

//        return Question::where('category_id', $id)->get();

        $id = explode(',',$id);
        $qus = Question::where('category_id', $id)->count();
        if ($qus) {
            $questions = QuestionType::all();
//            with(['questions' => function ($q) use ($id) {
//                $q->where('category_id', $id);
//            }, 'questions.options','questions.role.role'])
            return view('Admin.PartialPages.Questions.questions_data', compact('questions', 'id','admin_users'));
        }
        return '';
    }

    public function editQuestion($id)
    {
        $QwithO = Question::with('options')->where('id', $id)->first();
        return view('Admin.PartialPages.Questions.question', compact('QwithO'));
    }
    public function updateQuestion(Request $request)
    {
        // return $request->all();
        // return $request->cid;
        Question::where('id', $request->qid)->update([
            'question_text' => $request->question,
            'bd_question_text' => $request->bdquestion,
        ]);
        foreach ($request->option as  $k => $o) {
            QuestionsOption::where('id', $request->oid[$k])->update([
                'option' => $o,
                'bd_option' => $request->bdoption[$k],
                'correct' => $request->ans[$k]
            ]);
        }
        if ($request->cid) {
            return redirect('question/list/view/' . $request->cid);
        } else {
            return redirect('question/list/' . $request->cat_id);
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
//        $questions =  QuestionType::with(['questions' => function ($q) use ($today, $id) {
//            $q->where('created_at', '>', $today);
//            $q->where('category_id', $id);
//        }, 'questions.options'])->get();
        $questions =  QuestionType::all();
        return view('Admin.PartialPages.Questions.questions_list_today', compact('questions', 'id','today'));
    }
    // End Questions
}
