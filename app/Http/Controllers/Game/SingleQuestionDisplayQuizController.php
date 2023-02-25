<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;
use Auth;

class SingleQuestionDisplayQuizController extends Controller
{
    public function game(Challenge $challenge, $uid)
    {
        $gmsg = \DB::table('perform_messages')->where('game_id', 2)->get();
        // $id = $challenge;
        $questions = Question::with('options')
            ->whereIn('id', explode(",", $challenge->question_id))->get();
        $user = Auth::user();

        $user->lang = app()->getLocale();
        $user->start_at = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        //return gettype($user);
        return view('games.single_question', compact(['challenge', 'questions', 'gmsg', 'user', 'uid']));
   }
}
