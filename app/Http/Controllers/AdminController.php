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

      if (request()->session()->has('isApp')) {
        return redirect('/template');
      }
      if (auth()->user()->roleuser->role->id > 3) {
        return redirect('/template');
      }
        $admin_users = \auth()->user()->admin->users()->pluck('id');

        $quiz_counts = Quiz::whereIn('user_id',$admin_users)->count();
        $quiz_publish = Quiz::published()->whereIn('user_id',$admin_users)->count();
        $totalQuestions = Question::whereIn('user_id',$admin_users)->where('status', 1)->count();

        $totalInReviewQuestions = sprintf("%02d", Question::whereIn('user_id',$admin_users)->where('status', 0)->where('isDraft', 0)->count());
        $totalInDraftQuestions = sprintf("%02d", Question::whereIn('user_id',$admin_users)->where('status', 0)->where('isDraft', 1)->count());

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
