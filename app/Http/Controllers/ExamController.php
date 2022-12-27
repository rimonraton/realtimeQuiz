<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Admin.Exam.Pages.listOfExam');
    }

    public function createExam()
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        $question_topic = Category::where('sub_topic_id', 0)->whereIn('user_id',$admin_users)->get();
        return view('Admin.Exam.Pages.createExam', compact('question_topic'));
    }
}
