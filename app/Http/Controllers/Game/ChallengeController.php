<?php

namespace App\Http\Controllers\Game;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\QuestionType;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{

    public $lang;

    public function __construct()
    {
        $this->middleware('auth');
        $this->lang = app()->getLocale();
    }

    public function Challenge()
    {
        $quiz =  Quiz::with('quizCategory', 'progress')->paginate(9);
        $user = \Auth::user();
        return view('games.practice.practice', compact('quiz', 'user'));
    }
    public function shareChallengeBtnLink($game,$id, $uid)
    {
//        return $id;
        if (Auth::id() != $uid) {
            return redirect($game.'/' . $id . '/' . $uid);
        }
        return view('share_btn_link_challenge', compact('game','id', 'uid'));
    }

    public function gameInAdmin($id = null)
    {
//        return 'challenge Mode';
        $questionHasTopics = Category::whereHas('questioncount')
            ->withCount(['questioncount', 'easy', 'intermidiate', 'difficult'])
            ->get();

        $admin_users = auth()->user()->admin->users()->pluck('id');

        $catName = '';
        $lang = $this->lang;

        if ($id) {
            $catName = Category::find($id)->name;
        }

        $questionType = QuestionType::all();

        $topic = Category::withCount('questions')
            ->where('sub_topic_id', 0)->get();

        $challenges_published = Challenge::whereIn('user_id',$admin_users)
            ->where('is_published', 1)
            ->latest()
            ->get();

        $challenges_own = Challenge::where('user_id',Auth::user()->id)
            ->where('is_published', 0)
            ->latest()->get();

        $challenges = $challenges_published->merge($challenges_own)->paginate(12);

        return view('Admin.Games.challenge', compact([
            'topic', 'id', 'catName', 'questionType', 'lang', 'challenges', 'questionHasTopics'
        ]));
    }
}
