<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $admin_users = \auth()->user()->admin->users()->pluck('id');
        
        //return Auth::user()->id;
        $quiz_counts = sprintf("%02d", count(Quiz::whereIn('user_id',$admin_users)->get()));
        $quiz_publish = sprintf("%02d", count(Quiz::where('status', 1)->whereIn('user_id',$admin_users)->get()));
        $totalQuestions = sprintf("%02d", count(Question::whereIn('user_id',$admin_users)->get()));

        // $quiz_publish = count(Quiz::where('status', 1)->get());
        // $totalQuestions = count(Question::all());

        return view('Admin.PartialPages.home', compact('quiz_counts', 'quiz_publish', 'totalQuestions'));
    }
}
