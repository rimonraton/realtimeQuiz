<?php

namespace App\Http\Controllers;

use App\Category;
use App\Examination;
use App\Lang\Bengali;
use App\Models\Challenge;
use App\Question;
use App\QuestionsOption;
use App\QuestionType;
use App\Quiz;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class ExamController extends Controller
{
    public $lang;

    public function __construct()
    {
        $this->middleware('auth');
        $this->lang = app()->getLocale();
    }

    public function index()
    {
//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
        $exam_data = Examination::withCount(['results'])->orderBy('id','desc')->paginate(10);
        return view('Admin.Exam.Pages.listOfExam', compact('exam_data'));
    }

    public function createExam()
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        return view('Admin.Exam.Pages.createExam', compact('question_topic'));
    }

    public function store(Request $request)
    {
//        $timestamp = \Carbon\Carbon::parse($request->schedule);
////       return $banglaDate = $timestamp->format('Mm D Y, h:m A');
//        $banglaDate = $timestamp->format('d F Y, h:m A');
//        $ban = new Bengali();
//       return $ban->bn_date_time($banglaDate);

//        return $request->all();
        if ($request->quizCreateType == 'qb') {
            $this->storeFromQB($request);
            return redirect('list-of-exam');
        }
        $this->storeFromCustom($request);

        return redirect('list-of-exam');
    }

    public function storeFromQB($request)
    {
        $questions = '';
        $time = 0;
        if($request->timeUnit == 's'){
            $time = $request->time;
        } elseif ($request->timeUnit == 'm'){
            $time = $request->time * 60;
        } elseif ($request->timeUnit == 'h') {
            $time = $request->time * 60 * 60;
        }

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
//        if($request->teams){
//            $team_id = implode(',', $request->teams);
//        }
//        return $team_id;
        Examination::create([
            'exam_en'           => $request->quizName,
            'exam_bn'           => $request->bdquizName,
            'questions'         => $questions,
            'category_id'       => $request->cid,
            'option_view_time'  => $request->op_layout,
            'user_id'           => auth()->user()->id,
            'exam_time'         => $request->mode == 'et' ? $time : 0,
            'question_time'     => $request->mode == 'qt' ? $time : 0,
            'time_unit'         => $request->timeUnit,
            'each_question_mark' => $request->each_q_number ? $request->each_q_number : 1,
            'negative_mark'     => $request->negetive_mark ? $request->negetive_mark : 0,
            'schedule'          => \Carbon\Carbon::parse($request->schedule)
        ]);
    }

    public function storeFromCustom($request)
    {
//        return $request->all();
//        $team_id = null;
        $time = 0;
        if($request->timeUnit == 's'){
            $time = $request->time;
        } elseif ($request->timeUnit == 'm'){
            $time = $request->time * 60;
        } elseif ($request->timeUnit == 'h') {
            $time = $request->time * 60 * 60;
        }
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
//        if($request->teams){
//            $team_id = implode(',', $request->teams);
//        }
        Examination::create([
            'exam_en'           => $request->quizName,
            'exam_bn'           => $request->bdquizName,
            'questions'         => $questions,
            'category_id'       => $request->cid,
            'option_view_time'  => $request->op_layout,
            'user_id'           => auth()->user()->id,
            'exam_time'         => $request->mode == 'et' ? $time : 0,
            'question_time'     => $request->mode == 'qt' ? $time : 0,
            'time_unit'         => $request->timeUnit,
            'each_question_mark' => $request->each_q_number ? $request->each_q_number : 1,
            'negative_mark'     => $request->negetive_mark ? $request->negetive_mark : 0,
            'schedule'          => \Carbon\Carbon::parse($request->schedule)
        ]);
    }

    public function traineeExams($id = null)
    {
//        $user = Auth::user();
        $exams = '';
        $admin_users = auth()->user()->admin->users()->pluck('id');
        $catName = '';
        if ($id) {
            $catName = Category::find($id)->name;
        }
        $questionType = QuestionType::all();
        $topic = Category::withCount('questions')->where('sub_topic_id', 0)->get();
        $lang = $this->lang;
//        $challenges = Challenge::latest()->paginate(12);

//        $challenges = Challenge::whereIn('user_id',$admin_users)->latest()->paginate(12);

        $challenges_published = Challenge::whereIn('user_id',$admin_users)->where('is_published',1)->latest()->get();
        $challenges_own = Challenge::where('user_id',Auth::user()->id)->where('is_published',0)->latest()->get();
        $challenges = $challenges_published->merge($challenges_own)->paginate(12);
        $questions = Question::all();
        if (auth()->user()->roleuser->role->id < 4) {
             $exams = Examination::with('category:id,name,bn_name')
                ->whereHas('results')
                ->withCount(['results'])
                ->orderBy('id', 'desc')
                ->paginate(12);

        } else {
            $exams = Examination::with('category:id,name,bn_name')
                ->withCount(['results' => function ($q) {
                    $q->where('user_id', Auth::user()->id);
                }])->orderBy('id', 'desc')->paginate(12);
        }
        return view('Admin.Exam.Pages.traineeExam', compact(['topic', 'id', 'catName', 'questionType', 'lang', 'challenges', 'questions', 'exams']));
    }
//    function exam_completed($data){
//        $results = array_filter((array)$data, function($item){
//            return ($item->user_id === Auth::user()->id);
//        });
//        return $results;
//    }
    public function startExam(Examination $examination, $uid)
    {
        $result = Result::where('examination_id', $examination->id)->where('user_id', $uid)->first();
         $result_count = $result ? count(json_decode($result->result)) : 0;
        if ($result_count > 0) {
            return redirect('exams');
        }
        $gmsg = \DB::table('perform_messages')->where('game_id', 2)->get();
        $id = $examination;
        $questions = Question::with('options')
            ->whereIn('id', explode(",", $examination->questions))->get();
        $user = Auth::user();
        $user['lang'] = app()->getLocale();
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        return view('Admin.Exam.Pages.exam', compact(['id', 'user', 'questions', 'uid', 'gmsg', 'examination']));


    }

    public function timeModeUpdate(Request $request)
    {
//        return $request->all();
        $time = 0;
        if($request->timeUnit == 's'){
            $time = $request->time;
        } elseif ($request->timeUnit == 'm'){
            $time = $request->time * 60;
        } elseif ($request->timeUnit == 'h') {
            $time = $request->time * 60 * 60;
        }
        $examination = Examination::find($request->id);
        if ($request->mode == 'qt') {
            $examination->exam_time = 0;
            $examination->question_time = $time;
            $examination->time_unit = $request->timeUnit;
        }
        if ($request->mode == 'et') {
            $examination->exam_time = $time;
            $examination->question_time = 0;
            $examination->time_unit = $request->timeUnit;
        }
        $examination->option_view_time = $request->op_layout;
        $examination->save();
//        $exam_data = Examination::paginate(10);
//        return view('Admin.Exam.Pages.listOfExam', compact('exam_data'));
        return redirect('list-of-exam');
    }

    public function examPublished(Request $request)
    {
        Examination::find($request->id)->update([
            'is_published' => $request->value
        ]);
        return 'Updated successfuly';
    }

    public function showUserResult(Examination $examination, $uid)
    {
//        return $uid;
//         Result::with('user')->where('examination_id', $examination->id)->get();
         $result = Result::where('examination_id', $examination->id)->where('user_id', $uid)->first();
        $result_count = count(json_decode($result->result));
//        return count(json_decode($result->result));
        if ($result_count > 0) {
              $exam_result = $examination->load(['results' => function($q) use($uid) {
                $q->where('user_id', $uid);
            }]);
            $user = Auth::user();
            $user['lang'] = app()->getLocale();
            $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
            return view('Admin.Exam.Pages.result', compact(['exam_result','user', 'result_count']));
        } else{
//            $exam_result = $examination;
             $questions = Question::with('options')
                ->whereIn('id', explode(",", $examination->questions))->get();
            $user = Auth::user();
            $user['lang'] = app()->getLocale();
            $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
            return view('Admin.Exam.Pages.result', compact(['questions','user', 'result_count', 'examination']));
        }

    }

    public function showExamResult(Examination $examination)
    {
        $userResult = $examination->load(['results' => function($q) {
            $q->with('user');
        }]);
//       $userResult = Result::with('user')->where('examination_id', $examination->id)->get();
        return view('Admin.Exam.Pages.examResult', compact(['userResult']));
    }

    public function markUpdate(Request $request)
    {
//        return $request->all();
        Examination::where('id', $request->id)->update([
            'each_question_mark' => $request->each_q_number,
            'negative_mark' => $request->negativemarkvalue
        ]);
        $lang = \App::getLocale();
        $msg = $lang == 'gb' ? 'Updated successfully!' : 'আপডেট সফল হয়েছে!' ;
       return \Redirect::to('list-of-exam')->with('message', $msg);
//        return redirect('list-of-exam');
    }

    public function examNameUpdate(Request $request)
    {
        Examination::where('id', $request->id)->update([
            'exam_en' => $request->uquizName,
            'exam_bn' => $request->ubnquizName,
        ]);
        $lang = \App::getLocale();
        $msg = $lang == 'gb' ? 'Updated successfully!' : 'আপডেট সফল হয়েছে!' ;
        return \Redirect::to('list-of-exam')->with('message', $msg);
    }
    public function scheduleUpdate(Request $request)
    {
        if($request->schedule) {
            Examination::where('id', $request->id)->update([
                'schedule' => \Carbon\Carbon::parse($request->schedule)
            ]);
        }
        $lang = \App::getLocale();
        $msg = $lang == 'gb' ? 'Updated successfully!' : 'আপডেট সফল হয়েছে!' ;
        return \Redirect::to('list-of-exam')->with('message', $msg);
    }
}
