<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Menu;
use App\Question;
use App\Quiz;
use App\User;
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
//        $quiz_counts = sprintf("%02d", count(Quiz::whereIn('user_id',$admin_users)->get()));
//        $quiz_publish = sprintf("%02d", count(Quiz::where('status', 1)->whereIn('user_id',$admin_users)->get()));
//        $totalQuestions = sprintf("%02d", count(Question::whereIn('user_id',$admin_users)->where('status', 1)->get()));
        $quiz_counts = Quiz::whereIn('user_id',$admin_users)->count();
        $quiz_publish = Quiz::where('status', 1)->whereIn('user_id',$admin_users)->count();
        $totalQuestions = Question::whereIn('user_id',$admin_users)->where('status', 1)->count();

        $totalInReviewQuestions = sprintf("%02d", Question::whereIn('user_id',$admin_users)->where('status', 0)->where('isDraft', 0)->count());
        $totalInDraftQuestions = sprintf("%02d", Question::whereIn('user_id',$admin_users)->where('status', 0)->where('isDraft', 1)->count());

        // $quiz_publish = count(Quiz::where('status', 1)->get());
        // $totalQuestions = count(Question::all());

        $admin = Admin::get()->except(1);

        return view('Admin.PartialPages.home', compact('quiz_counts', 'quiz_publish', 'totalQuestions','admin'));
    }

    public function userRemove(User $user)
    {
        $user->roleuser->delete();
        $user->delete();
        return 'User ' . $user->name . ', deleted successfully!';
    }
}
