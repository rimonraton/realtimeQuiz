<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Exam;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Mode($type)
    {
        $ce = Category::with('exams')->get();
        $exams = Exam::where('subject_id', 153)
                        ->where('course_id', 44)
                        ->where('exam_type', 'mcq')
                        ->where('is_site', 1)
                        ->paginate(9);
        return view('mode', compact('exams', 'user', 'ce', 'type'));   
    }

    public function Game($type, $id, $uid)
    {
        $exam = \App\Exam::findOrFail($id);
        $questions = $exam->questions()->with('options')->get();
        $user = Auth::user();
        return view('games.'.strtolower($type), compact('id', 'user', 'questions', 'uid'));
    }


    public function home()
    {
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
}
