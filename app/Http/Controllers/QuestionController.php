<?php

namespace App\Http\Controllers;

use App\Difficulty;
use App\QuestionLogReport;
use App\QuestionType;
use App\ShareQuestion;
use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\QuestionsOption;
use App\QuizCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;

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
//       return $category_all = Category::whereIn('user_id',$admin_users)->where('sub_topic_id',0)->orderBy('id', 'desc')->get();
        $category_all = Category::whereIn('user_id',$admin_users)->orderBy('id', 'desc')->get();
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
        $questionType = QuestionType::all();
        return view('Admin.PartialPages.Questions.questions_list', compact(['topic', 'id', 'catName', 'questionType']));
    }
    public function create()
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $category = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        $quizCategory = QuestionType::all();
        $difficulty = Difficulty::all();
        return view('Admin.PartialPages.Questions.questions_create', compact(['category', 'quizCategory', 'difficulty']));
    }
    public function storeQuestion(Request $request)
    {
        if ($request->shot_answer){
            $option = $request->option[0];
            $optionbd = $request->optionbd[0];
            $ans = $request->ans[0];
            $request->request->remove('option','optionbd','ans');
            $request->request->add(['option' => [$option], 'optionbd' => [$optionbd], 'ans' => [$ans]]);
//            return $request->all();

        }
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
        $shot_ans = $request->shot_answer ? 1 : 0 ;
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
        $geoip = new GeoIPLocation();
        $userIpInfo = [
            'user_id' => \auth()->user()->id,
            'ip' => $geoip->getIP(),
            'city' => $geoip->getCity(),
            'from' => 'create',
            'actionType' => 'insert',
            'dateTime' => Carbon::now()
        ];
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
            'level' => $request->difficulty,
            'user_ip_info' => json_encode($userIpInfo),
            'short_answer' => $shot_ans
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
        QuestionLogReport::create([
            'question_id' => $question->id,
            'user_id' => \auth()->user()->id,
            'details' => json_encode($userIpInfo)
        ]);
        return redirect('/draft-questions');
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
    public function getlist($id, $keyword = '', $qType = '')
    {
////        return $id;
//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
//
////        return Question::where('category_id', $id)->get();
//
//        $id = explode(',',$id);
//        $qus = Question::where('category_id', $id)->whereIn('user_id',$admin_users)->count();
//        if ($qus) {
//            $questions = QuestionType::all();
////            with(['questions' => function ($q) use ($id) {
////                $q->where('category_id', $id);
////            }, 'questions.options','questions.role.role'])
//            return view('Admin.PartialPages.Questions.questions_data', compact('questions', 'id','admin_users','keyword'));
//        }
//        return '';


        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $questions = null;
        $et = 1;
        if ($qType){
            $et = $qType;
        }
        if($keyword){
            $questions = Question::where('status', 0)
                ->whereIn('user_id', $admin_users)
                ->where('question_text', 'like', '%' . $keyword . '%')
                ->orWhere('bd_question_text', 'like', '%' . $keyword . '%')
                ->where('category_id', $id)
                ->with('difficulty')
                ->where('quizcategory_id', $et)
                ->orderBy('id','desc')
                ->paginate(10);
        } else {
            $questions = Question::where('category_id', $id)
                ->where('quizcategory_id', $et)
                ->whereIn('user_id',$admin_users)
                ->orderBy('id','desc')
                ->paginate(10);
        }
//        $questionType = QuestionType::all();
//       return count($questions);
        if(count($questions)){
            return view('Admin.PartialPages.Questions.questions_data', compact('questions', 'id', 'et'));
        }
        return '';

    }
    public function getreviewlist($id, $keyword = '', $qType = '')
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $questions = null;
        $et = 1;
        if ($qType){
            $et = $qType;
        }
        if($keyword){
            $questions = Question::where('status', 0)
                ->whereIn('user_id', $admin_users)
                ->where('question_text', 'like', '%' . $keyword . '%')
                ->orWhere('bd_question_text', 'like', '%' . $keyword . '%')
                ->where('category_id', $id)
                ->with('difficulty')
                ->where('isDraft', 0)
                ->where('status', 0)
                ->where('quizcategory_id', $et)
                ->orderBy('id','desc')
                ->paginate(10);
        } else {
            $questions = Question::where('category_id', $id)
                ->where('isDraft', 0)
                ->where('status', 0)
                ->where('quizcategory_id', $et)
                ->whereIn('user_id',$admin_users)
                ->orderBy('id','desc')
                ->paginate(10);
        }
//        $questionType = QuestionType::all();
//       return count($questions);
        if(count($questions)){
            return view('Admin.PartialPages.Questions.review_questions_data', compact('questions', 'id', 'et'));
        }
        return '';
    }


    public function qListByTopic($tid)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');

//        return Question::where('category_id', $id)->get();
        $questions = Question::where('category_id', $tid)->whereIn('user_id',$admin_users)->get(['id','question_text', 'bd_question_text', 'fileType', 'question_file_link']);
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
                    ->get(['id','question_text', 'bd_question_text', 'fileType', 'question_file_link']);
        return view('Admin.PartialPages.Questions.partial.exists_question', compact('questions', 'tid'));
    }

    public function editQuestion($id)
    {
         $QwithO = Question::with('options')->where('id', $id)->first();
        $difficulty = Difficulty::all();
        return view('Admin.PartialPages.Questions.question', compact('QwithO', 'difficulty'));
    }

    public function viewQuestion($id)
    {
         $QwithO = Question::with('options', 'difficulty')->where('id', $id)->first();
       return view('Admin.PartialPages.Questions.view_question', compact('QwithO'));
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
//        dd($request->difficulty);
//        return  explode(',', $request->oid);
//            return file_exists($request->old_file_path);
//        return json_decode($request->bdoption);

        $geoip = new GeoIPLocation();
        $userIpInfo = [
            'user_id' => \auth()->user()->id,
            'ip' => $geoip->getIP(),
            'city' => $geoip->getCity(),
            'from' => $request->from,
            'actionType' => 'update',
            'dateTime' => Carbon::now()
        ];
        QuestionLogReport::create([
            'question_id' => $request->qid,
            'user_id' => \auth()->user()->id,
            'details' => json_encode($userIpInfo)
        ]);
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
                'fileType' => $fileType,
                'level' => $request->difficulty,
            ]);
            if(file_exists($request->old_file_path))
            {
                unlink($request->old_file_path);
            }
        } else {
            Question::where('id', $request->qid)->update([
                'question_text' => $request->question,
                'bd_question_text' => $request->bdquestion,
                'level' => $request->difficulty
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
            foreach (json_decode($request->option) as  $k => $o) {
                $oid = explode(',', $request->oid)[$k];
                if (explode(',', $request->oid)[$k]=='new'){
                    $oid =$max_id;
                    $max_id++;
                }
                QuestionsOption::updateOrCreate(
                    ['id' => $oid],
                    [
                        'bd_option' => json_decode($request->bdoption)[$k],
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

       return $question = Question::with('options', 'difficulty')->where('id',$request->qid)->first();;
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

    public function reviewQuestions($id= '')
    {
        $lang = \App::getLocale();
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $catName = '';
        if ($id) {
            $catName =  $lang == 'gb' ? Category::find($id)->name : Category::find($id)->bn_name;
        }
        $topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        $questionType = QuestionType::all();
        $questions = Question::where('isDraft', 0)
            ->where('status', 0)
            ->whereIn('user_id',$admin_users)
            ->orderBy('id','desc')
            ->paginate(10);

        if(request()->ajax()){
            return view('Admin.PartialPages.Questions.all_review_questions_data', compact('questions', 'id'));
        }

        return view('Admin.PartialPages.Questions.review_questions_list', compact(['topic', 'id', 'catName','questionType', 'questions']));
    }

    public function verifyQuestionUpdate(Request $request)
    {

//        return $request->ids;
//       return gettype($request->ids);

       $ids = explode(",", $request->ids);
//      return gettype($ids);
        Question::whereIn('id', $ids)->update([
            'status' => 1
        ]);
        return Question::whereIn('id', $ids)->get();
    }
    public function verifyDraftQuestionUpdate(Request $request)
    {

//        return $request->ids;
//       return gettype($request->ids);

        $ids = explode(",", $request->ids);
//      return gettype($ids);
        Question::whereIn('id', $ids)->update([
            'isDraft' => 0
        ]);
        return Question::whereIn('id', $ids)->get();
    }

    public function draftQuestions($id= '')
    {
        $shareQCount = 0;
        $lang = \App::getLocale();
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $catName = '';
        if ($id) {
            $catName =  $lang == 'gb' ? Category::find($id)->name : Category::find($id)->bn_name;
        }
        $topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        $questionType = QuestionType::all();
        if(auth()->user()->roleuser->role_id <= 2) {
            $questions = Question::where('isDraft', 1)
                ->whereIn('user_id',$admin_users)
                ->with('shareQuestion.user')
                ->orderBy('id','desc')
                ->paginate(10);
            if(count($questions)) {
                $shareQCount = $questions->pluck('shareQuestion')->filter()->count();
            }
        } else {
            $questions = Question::where('isDraft', 1)
                ->where('user_id', auth()->user()->id)
                ->with('shareQuestion.user')
                ->orderBy('id','desc')
                ->paginate(10);
//            return count($questions);

            if(count($questions)){
                $shareQCount = $questions->pluck('shareQuestion')->filter()->count();
            }

//           return count($array);
        }
//        return auth()->user()->id;
//        return $questions;
        return view('Admin.PartialPages.Questions.draft_questions_list', compact(['topic', 'id', 'catName','questionType', 'questions', 'shareQCount']));
    }
//    public function getDraftList($id, $keyword = '', $qType='')
//    {
////        return $keyword ? 'true' : 'fale';
//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
//        $questions = null;
//        $et = 1;
//        if ($qType){
//            $et = $qType;
//        }
//        if (auth()->user()->roleuser->role_id <= 2){
//            if($keyword){
//                $questions = Question::whereIn('user_id', $admin_users)
//                    ->where('status', 0)
//                    ->where('question_text', 'like', '%' . $keyword . '%')
//                    ->orWhere('bd_question_text', 'like', '%' . $keyword . '%')
//                    ->where('category_id', $id)
//                    ->with('difficulty')
//                    ->where('isDraft', 1)
//                    ->where('quizcategory_id', $et)
//                    ->orderBy('id','desc')
//                    ->paginate(10);
//            } else {
//                $questions = Question::whereIn('user_id',$admin_users)
//                    ->where('category_id', $id)
//                    ->where('status', 0)
//                    ->where('category_id', $id)
//                    ->with('difficulty')
//                    ->where('isDraft', 1)
//                    ->where('quizcategory_id', $et)
//                    ->orderBy('id','desc')
//                    ->paginate(10);
//            }
//        } else{
//            if($keyword){
//                $questions = Question::where('user_id', auth()->user()->id)
//                    -> where('status', 0)
//                    ->where('question_text', 'like', '%' . $keyword . '%')
//                    ->orWhere('bd_question_text', 'like', '%' . $keyword . '%')
//                    ->where('category_id', $id)
//                    ->with('difficulty')
//                    ->where('isDraft', 1)
//                    ->where('quizcategory_id', $et)
//                    ->orderBy('id','desc')
//                    ->paginate(10);
//            } else {
//                $questions = Question::where('user_id',auth()->user()->id)
//                    ->where('isDraft', 1)
//                    ->where('category_id', $id)
//                    ->where('quizcategory_id', $et)
//                    ->orderBy('id','desc')
//                    ->paginate(10);
//            }
//        }
//
////        $questionType = QuestionType::all();
////       return count($questions);
//       if(count($questions)){
//            return view('Admin.PartialPages.Questions.draft_questions_data', compact('questions', 'id', 'et'));
//       }
//        return '';
//    }

    public function getDraftList($id, $keyword = '', $qType = 1)
    {
        $auth_user = auth()->user();
        $admin_users = $auth_user->admin->users()->pluck('id');
        $questions = Question::query();
        $questions->when($auth_user->roleuser->role_id <= 2, function ($q) use($admin_users) {
            return $q->whereIn('user_id', $admin_users);
        });
        $questions->when($auth_user->roleuser->role_id > 2, function ($q) use($admin_users) {
            return $q->where('user_id', auth()->user()->id);
        });

        $questions->where('status', 0)
            ->where('category_id', $id)
            ->where('isDraft', 1)
            ->where('quizcategory_id', $qType)
            ->with('difficulty', 'shareQuestion')
            ->orderBy('id','desc')
            ->when($keyword, function ($q) use($keyword) {
            $q->where(function ($query) use($keyword) {
                $query->where('question_text', 'like', '%' . $keyword . '%')
                    ->orWhere('bd_question_text', 'like', '%' . $keyword . '%');
            });
        });
        $questions = $questions->paginate(10);
        if(count($questions)){
            $shareQCount = $questions->pluck('shareQuestion')->filter()->count();
            $et = $qType;
            return view('Admin.PartialPages.Questions.draft_questions_data', compact('questions', 'id', 'et', 'shareQCount'));
        }
        return '';
    }

    public function shareQuestion()
    {
         $user = \auth()->user()->id;
          $shareQuestion = ShareQuestion::where('shareToUser', $user)->where('status', 1)->with('questions.options', 'questions.difficulty', 'shareFromUserData')->paginate(10);
//        $shareQuestion->count();
        return view('Admin.PartialPages.Questions.share_questions_list', compact('shareQuestion'));
    }

    public function verifyShareQuestionUpdate(Request $request)
    {
//        return $request->all();

        $ids = json_decode($request->ids);
        $sids = json_decode($request->sids);

//        $ids = explode(",", $request->ids);
//        $sids = explode(",", $request->sids);
//      return gettype($ids);

        Question::whereIn('id', $ids)->update([
            'isDraft' => 0
        ]);
        ShareQuestion::whereIn('id', $sids)->update([
            'status' => 0
        ]);
        return Question::whereIn('id', $ids)->get();
    }
}
