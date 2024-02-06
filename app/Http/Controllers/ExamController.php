<?php

namespace App\Http\Controllers;

use App\Category;
use App\ExamGivenUser;
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
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function index()
    {
//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
        $exam_data = Examination::with(['existUser' =>function($q){
            $q->with('user')->where('unlock_status','>', 0)->whereNotNull('reason');
        }])->withCount(['results'])->orderBy('id','desc')->paginate(10);
        return view('Admin.Exam.Pages.listOfExam', compact('exam_data'));
    }

    public function createExam()
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        $questionHasTopics = Category::whereHas('questions')->get();
        return view('Admin.Exam.Pages.createExam', compact('question_topic', 'questionHasTopics'));
    }

    public function allTopicsHasQuestion()
    {
        $questionHasTopics = Category::whereHas('questioncount')->withCount(['questioncount', 'easy', 'intermidiate', 'difficult'])->paginate(20);
        return view('Admin.PartialPages.Exam.topics', compact('questionHasTopics'));
    }

    public function store(Request $request)
    {
//        $timestamp = \Carbon\Carbon::parse($request->schedule);
////       return $banglaDate = $timestamp->format('Mm D Y, h:m A');
//        $banglaDate = $timestamp->format('d F Y, h:m A');
//        $ban = new Bengali();
//       return $ban->bn_date_time($banglaDate);

//        return $request->advanceValue;

//        foreach ($re)
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
        $cid = 0;
        $questions = '';
        $time = 0;
        if($request->timeUnit == 's'){
            $time = $request->time;
        } elseif ($request->timeUnit == 'm'){
            $time = $request->time * 60;
        } elseif ($request->timeUnit == 'h') {
            $time = $request->time * 60 * 60;
        }
        if ($request->advanceValue){
            $arrData = collect();
            foreach (json_decode($request->advanceValue) as $key=> $adv) {
                $q_random = Question::where('category_id',$adv->id)->where('level',$adv->difficulty_value)->where('status', 1)->inRandomOrder()->limit($adv->value)->pluck('id');
                $arrData->push($q_random);
            }
            $questions =  implode(',', $arrData->collapse()->all());;
        } else{
            $cid = $request->cid;
            if ($request->NOQ){
                $admin = auth()->user()->admin;
                $admin_users = $admin->users()->pluck('id');
                $q_random = Question::where('category_id',$request->cid)->whereIn('user_id',$admin_users)->where('status', 1)->inRandomOrder()->limit($request->NOQ)->pluck('id')->toArray();
                $questions =  implode(',',$q_random);
            }
            else{
                $questions = $request->selected;
            }
        }
        Examination::create([
            'exam_en'           => $request->quizName,
            'exam_bn'           => $request->bdquizName,
            'questions'         => $questions,
            'category_id'       => $cid,
            'option_view_time'  => $request->op_layout,
            'user_id'           => auth()->user()->id,
            'exam_time'         => $request->mode == 'et' ? $time : 0,
            'question_time'     => $request->mode == 'qt' ? $time : 0,
            'time_unit'         => $request->timeUnit,
            'each_question_mark' => $request->each_q_number ? $request->each_q_number : 1,
            'negative_mark'     => $request->negetive_mark ? $request->negetive_mark : 0,
            'schedule'          => \Carbon\Carbon::parse($request->schedule),
            'topics'            => $request->advanceValue ? $request->advanceValue : null
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
        $catName = '';

        if ($id) {
            $catName = Category::find($id)->name;
        }

//        $admin_users = auth()->user()->admin->users()->pluck('id');

        $questionType = QuestionType::all();
        $topic = Category::withCount('questions')->mainTopic()->get();
        $challenges_published = Challenge::where('admin_id',$this->user->admin->id)->published()->latest()->paginate(20);
        $challenges_own = Challenge::where('user_id', $this->user->id)->unPublished()->latest()->get();
        $challenges = $challenges_published->merge($challenges_own)->paginate(12);
//        $questions = Question::all();
        $questions = [];
        if (auth()->user()->roleuser->role->id < 4) {
             $exams = Examination::with(['category:id,name,bn_name', 'existUser'=> function($q){
                 $q->with('user')->where('unlock_status','>', 0)->whereNotNull('reason');
             }])
                ->whereHas('results')
                ->withCount(['results'])
                ->orderBy('id', 'desc')
                ->paginate(12);

        } else {
              $exams = Examination::with(['category:id,name,bn_name', 'existUser' => function($q){
                $q->where('user_id', auth()->user()->id)->where('unlock_status','>', 0);
            }])
                ->withCount(['results' => function ($q) {
                    $q->where('user_id', Auth::user()->id);
                }])->orderBy('id', 'desc')->paginate(12);
        }

        return view('Admin.Exam.Pages.traineeExam', compact(['topic', 'id', 'catName', 'questionType', 'challenges', 'questions', 'exams']));
    }
//    function exam_completed($data){
//        $results = array_filter((array)$data, function($item){
//            return ($item->user_id === Auth::user()->id);
//        });
//        return $results;
//    }
    public function startExam(Examination $examination, $uid)
    {
//        return $examination;

        $now = Carbon::now();
        $futureTime = Carbon::parse($examination->schedule);
        if ($now > $futureTime && $examination->is_published == 0){
            $lang = \App::getLocale();
            $msg = $lang == 'gb' ? 'Exam is expired!' : 'পরীক্ষার মেয়াদ শেষ!' ;
            return \Redirect::back()->with('exam-message', $msg);;
        }
        if (ExamGivenUser::where('user_id', $uid)->where('exam_id', $examination->id)->where('unlock_status', 1)->count()){
            $lang = \App::getLocale();
            $msg = $lang == 'gb' ? 'You start the exam before but have not completed it!' : 'আগে পরীক্ষা শুরু করলেও শেষ করেননি!' ;
            return \Redirect::back()->with('exam-message', $msg);;
        }
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

    public function showUserOwnResult(Examination $examination, $uid)
    {

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

    public function updateReason(Request $request)
    {
        ExamGivenUser::where('user_id', $request->user)->where('exam_id', $request->exam)->update([
            'reason' => $request->reasonValue
        ]);
        return redirect()->back();
    }
}
