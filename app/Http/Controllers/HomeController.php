<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Exam;
use App\Question;
use App\Quiz;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registerFunction1(Request $r)
    {
        return $r->all();
    }

    public function Mode($type)
    {
        $exams =  Quiz::paginate(9);
        $user = Auth::user();
        $ce = Category::with('exams')->get();
        return view('mode', compact('exams', 'user', 'ce', 'type'));
    }

    public function Game($type, Quiz $quiz, $uid)
    {
        $id = $quiz->id;
        $questions = Question::with('options')->whereIn('id', explode(",", $quiz->questions))->get();
        //  $questions = $exam->questions()->with('options')->get();
        $user = Auth::user();
        return view('games.' . strtolower($type), compact('id', 'user', 'questions', 'uid'));
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
}
