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
//        $category = Category::whereIn('user_id',$admin_users)->orderBy('id', 'desc')->paginate(10);
        $category_all = Category::whereIn('user_id',$admin_users)->where('sub_topic_id',0)->orderBy('id', 'desc')->get();
        return view('Admin.PartialPages.Questions.category', compact('category_all'));
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
//       return $request->all();
        $request->validate([
            'name' => 'required',
            // 'bn_name' => 'required',
        ]);
      $category =  Category::where('id', $request->id)->update([
            'name' => $request->name,
            'bn_name' => $request->bn_name,
            'sub_topic_id'=>$request->parent
        ]);
        return [
            'name' =>$request->name,
            'bn_name'=>$request->bn_name,
        ];
//        return redirect('question/category');
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
//        return Question::with('options')->where('id',1)->first();
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $catName = '';
        if ($id) {
            $catName = Category::find($id)->name;
        }
         $topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        return view('Admin.PartialPages.Questions.questions_list', compact(['topic', 'id', 'catName']));
    }
    public function create()
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $category = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        $quizCategory = QuestionType::all();
        return view('Admin.PartialPages.Questions.questions_create', compact(['category', 'quizCategory']));
    }
    public function storeQuestion(Request $request)
    {
//         return $request->all();
//      return array_search(1, array_keys($request->optionimg));
        // $request->validate([
        //     'category_id' => 'required',
        //     'question_text' => 'required',
        //     'option' => 'required',
        //     'correct' => 'required',
        // ]);
//        return $request->all();


        $categoryid = $request->cid;
        $location = '';
        $imgPath = '';
        $optionimglocation = 'images/option_images/';
//        $optionimg = '';
        $fileType = '';


        if ($request->hasFile('file')) {
            if ($request->fileType == 'image') {
                $fileType = $request->fileType;
                $location = 'images/question_images/';
//            $file = $request->file('file');
            } else if ($request->fileType == 'video') {
                $fileType = $request->fileType;
                $location = 'videos/question_videos/';
//            $file = $request->file('video');
            } else {
                $fileType = $request->fileType;
                $location = 'audios/question_audios/';
//            $file = $request->file('video');
            }
        }

        if ($request->hasFile('file')) {
            $original_name = $request->file->getClientOriginalName();
            $ext = strtolower(\File::extension($original_name));
            $created_at = Carbon::now('Asia/Dhaka');
            $t = $created_at->timestamp;
            $r = Str::random(40);
            $random_name = $t . '' . $r . '.' . $ext;
            $path = public_path() . '/' . $location;
            $filename = $location . $random_name;
            $request->file->move($path, $filename);
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
            'fileType' => $fileType,
            'user_id' => Auth::user()->id,
            // 'created_at' => Carbon::,
        ]);

        if($request->hasFile('optionimg'))
        {
            foreach ( $request->file('optionimg') as $key=>$img){
                $original_name = $img->getClientOriginalName();
                $ext = strtolower(\File::extension($original_name));
                $created_at = Carbon::now('Asia/Dhaka');
                $t = $created_at->timestamp;
                $r = Str::random(40);
                $random_name = $t . '' . $r . '.' . $ext;
                $path = public_path() . '/' . $optionimglocation.$question->id.'/';
                $filename = $optionimglocation.$question->id.'/'. $random_name;
                $img->move($path, $filename);
//                $optionimg = $filename;
                $data[$key]['question_id'] = $question->id;
                $data[$key]['img_link'] = $filename;
                $data[$key]['flag'] = 'img';
            }

        }
        else{
            foreach ($request->option as  $k => $o) {
                $data[$k]['question_id'] = $question->id;
                $data[$k]['option'] = $o;
            }
            foreach ($request->optionbd as  $k => $o) {
                $data[$k]['bd_option'] = $o;
            }
        }
//        foreach ($request->option as  $k => $o) {
//            $data[$k]['question_id'] = $question->id;
//            $data[$k]['option'] = $o;
//            if ($request->hasFile('optionimg')){
//                if(array_search($k, array_keys($request->optionimg)) >= 0){
//                    $ofile = $this->optionFile($request->optionimg[$k]);
//                    $data[$k]['img_link'] = $ofile['img_link'];
//                    $data[$k]['flag'] = $ofile['flag'];
//                } else {
//                    $data[$k]['img_link'] = '';
//                }
//
//            }
//        }
//
//        foreach ($request->optionbd as  $k => $o) {
//            $data[$k]['bd_option'] = $o;
//        }

        foreach ($request->ans as  $k => $a) {
            $data[$k]['correct'] = $a;
        }


        QuestionsOption::insert($data);

        return redirect('question/list/view' . '/' . $categoryid);
    }

    public function optionFile($file)
    {
        $rand = rand(0,10);
        $original_name = $file->getClientOriginalName();
        $ext = strtolower(\File::extension($original_name));
        $created_at = Carbon::now('Asia/Dhaka');
        $t = $created_at->timestamp;
        $r = Str::random(40);
        $random_name = $t . '' . $r . '.' . $ext;
        $path = public_path() . '/' . $rand.'/';
        $filename = $rand.'/'. $random_name;
        $file->move($path, $filename);
        return [
            'img_link'=> $filename,
            'flag'=> 'img'
        ];
//                $optionimg = $filename;
//        $data[$key]['question_id'] = $question->id;
//        $data[$key]['img_link'] = $filename;
//        $data[$key]['flag'] = 'img';
    }
    public function getlist($id)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');

//        return Question::where('category_id', $id)->get();

        $id = explode(',',$id);
        $qus = Question::where('category_id', $id)->whereIn('user_id',$admin_users)->count();
        if ($qus) {
            $questions = QuestionType::all();
//            with(['questions' => function ($q) use ($id) {
//                $q->where('category_id', $id);
//            }, 'questions.options','questions.role.role'])
            return view('Admin.PartialPages.Questions.questions_data', compact('questions', 'id','admin_users'));
        }
        return '';
    }

    public function qListByTopic($tid)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');

//        return Question::where('category_id', $id)->get();

        $questions = Question::where('category_id', $tid)->whereIn('user_id',$admin_users)->get(['id','question_text', 'bd_question_text']);
       return view('Admin.PartialPages.Questions.partial.exists_question', compact('questions', 'tid'));
    }
    public function qListByTopicKeyword($tid, $keyword)
    {
//        return $tid;
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');

//        return Question::where('category_id', $id)->get();

         $questions = Question::where('category_id', $tid)
                    ->whereIn('user_id',$admin_users)
                    ->where('question_text', 'like', '%' . $keyword . '%')
                    ->orWhere('bd_question_text', 'like', '%' . $keyword . '%')
                    ->get(['id','question_text', 'bd_question_text']);
        return view('Admin.PartialPages.Questions.partial.exists_question', compact('questions', 'tid'));
    }

    public function editQuestion($id)
    {
         $QwithO = Question::with('options')->where('id', $id)->first();
        return view('Admin.PartialPages.Questions.question', compact('QwithO'));
    }
    public function updateQuestion(Request $request)
    {
//        return $request->all();
       $max_id =  QuestionsOption::max('id') + 1;
        // return $request->cid;
        Question::where('id', $request->qid)->update([
            'question_text' => $request->question,
            'bd_question_text' => $request->bdquestion,
        ]);
        foreach ($request->option as  $k => $o) {
            $oid =$request->oid[$k];
            if ($request->oid[$k]=='new'){
                $oid =$max_id;
                $max_id++;
            }
//            QuestionsOption::where('id', $request->oid[$k])->update([
//                'option' => $o,
//                'bd_option' => $request->bdoption[$k],
//                'correct' => $request->ans[$k]
//            ]);
             QuestionsOption::updateOrCreate(
                ['id' => $oid],
                [
                    'bd_option' => $request->bdoption[$k],
                    'option' => $o,
                    'correct' => $request->ans[$k],
                    'question_id'=>$request->qid,
//                    'dami'=>'english'
                ]
            );
        }

//        QuestionsOption::insert();
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
        $questions =  QuestionType::all();
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        return view('Admin.PartialPages.Questions.questions_list_today', compact('questions', 'id','today','admin_users'));
    }
    // End Questions
    //option delete
    public function deleteOption($id)
    {
        QuestionsOption::where('id',$id)->delete();
        return 'Delete Successfully';
    }
    //category published
    public function published_category(Request $request)
    {
//        return $request->all();
        Category::where('id',$request->id)->update([
            'is_published'=>$request->value
        ]);

        return 'success';
    }

    public function question_update(Request $request)
    {
//        dd($request->all());
//        return  explode(',', $request->oid);
//            return file_exists($request->old_file_path);
        if ($request->file){
            $location = '';
            $imgPath = '';
            $fileType = '';

            if ($request->hasFile('file')) {
                if ($request->fileType == 'image') {
                    $fileType = $request->fileType;
                    $location = 'images/question_images/';
                } else if ($request->fileType == 'video') {
                    $fileType = $request->fileType;
                    $location = 'videos/question_videos/';
                } else {
                    $fileType = $request->fileType;
                    $location = 'audios/question_audios/';
                }
            }

            if ($request->hasFile('file')) {
                $original_name = $request->file->getClientOriginalName();
                $ext = strtolower(\File::extension($original_name));
                $created_at = Carbon::now('Asia/Dhaka');
                $t = $created_at->timestamp;
                $r = Str::random(40);
                $random_name = $t . '' . $r . '.' . $ext;
                $path = public_path() . '/' . $location;
                $filename = $location . $random_name;
                $request->file->move($path, $filename);
                $imgPath = $filename;
            }
            Question::where('id', $request->qid)->update([
                'question_text' => $request->question,
                'bd_question_text' => $request->bdquestion,
                'question_file_link' =>  $imgPath,
                'fileType' => $fileType
            ]);
            if(file_exists($request->old_file_path))
            {
                unlink($request->old_file_path);
            }
        } else {
            Question::where('id', $request->qid)->update([
                'question_text' => $request->question,
                'bd_question_text' => $request->bdquestion,
            ]);
        }
//        return $request->bdoption[3];

        $max_id =  QuestionsOption::max('id') + 1;
        // return $request->cid;
//        Question::where('id', $request->qid)->update([
//            'question_text' => $request->question,
//            'bd_question_text' => $request->bdquestion,
//        ]);
        if ($request->option || $request->bdoption){
            foreach (explode(',', $request->option) as  $k => $o) {
                $oid = explode(',', $request->oid)[$k];
                if (explode(',', $request->oid)[$k]=='new'){
                    $oid =$max_id;
                    $max_id++;
                }
                QuestionsOption::updateOrCreate(
                    ['id' => $oid],
                    [
                        'bd_option' => explode(',',$request->bdoption)[$k],
                        'option' => $o,
                        'correct' => explode(',', $request->ans)[$k],
                        'question_id'=>$request->qid,
//                    'dami'=>'english'
                    ]
                );
            }
        } else {
            foreach (explode(',', $request->ans) as  $k => $a) {
                $oid = explode(',', $request->oid)[$k];
                if (explode(',', $request->oid)[$k]=='new'){
                    $oid =$max_id;
                    $max_id++;
                }
                QuestionsOption::updateOrCreate(
                    ['id' => $oid],
                    [
//                        'bd_option' => explode(',',$request->bdoption)[$k],
//                        'option' => $o,
                        'correct' => $a,
//                        'question_id'=>$request->qid,
//                    'dami'=>'english'
                    ]
                );
            }
        }

       return $question = Question::with('options')->where('id',$request->qid)->first();;
        return 'Success';
    }

    public function optionFileUpdate(Request $request)
    {
//        dd($request->all());
//        dd(file_exists($request->old_file));
        $optionimglocation = 'images/option_images/';
        if ($request->hasFile('file')) {
            $original_name = $request->file->getClientOriginalName();
            $ext = strtolower(\File::extension($original_name));
            $created_at = Carbon::now('Asia/Dhaka');
            $t = $created_at->timestamp;
            $r = Str::random(40);
            $random_name = $t . '' . $r . '.' . $ext;
            $path = public_path() . '/' . $optionimglocation.$request->qid.'/';
            $filename = $optionimglocation.$request->qid.'/'. $random_name;
            $request->file->move($path, $filename);
//            $data['img_link'] = $filename;
//            $data['flag'] = 'img';
            if ($request->id) {
                QuestionsOption::where('id', $request->id)->update(
                    [
                        'img_link' => $filename,
//                    'correct' => 0,
//                        'question_id'=> $request->qid,
//                        'flag'=> 'img',
                    ]
                );
                if(file_exists($request->old_file))
                {
                    unlink($request->old_file);
                }
            } else {
                QuestionsOption::create([
                    'img_link' => $filename,
                    'correct' => 0,
                    'question_id'=> $request->qid,
                    'flag'=> 'img',
                ]);
            }

        }
        return 'success';
    }
}
