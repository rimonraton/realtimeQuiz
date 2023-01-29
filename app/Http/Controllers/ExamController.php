<?php

namespace App\Http\Controllers;

use App\Category;
use App\Examination;
use App\Models\Challenge;
use App\Question;
use App\QuestionType;
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
        $exam_data = Examination::paginate(10);
        return view('Admin.Exam.Pages.listOfExam', compact('exam_data'));
    }

    public function createExam()
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        return view('Admin.Exam.Pages.createExam', compact('question_topic'));
    }
    public function traineeExams($id = null)
    {
//        $user = Auth::user();
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
        $exams = Examination::with('category:id,name,bn_name')
           ->withCount(['results' => function ($q) {
               $q->where('user_id', Auth::user()->id);
           }])->orderBy('id', 'desc')->paginate(12);


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
        $examination->save();
        $exam_data = Examination::paginate(10);
        return view('Admin.Exam.Pages.listOfExam', compact('exam_data'));
    }

    public function examPublished(Request $request)
    {
        Examination::find($request->id)->update([
            'is_published' => $request->value
        ]);
        return 'Updated successfuly';
    }

    public function showResult(Examination $examination, $uid)
    {
//        return $uid;
//        return $examination;
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
}
