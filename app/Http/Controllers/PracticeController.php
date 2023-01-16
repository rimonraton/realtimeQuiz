<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function Game($type, Quiz $quiz)
    {
        if($type != 'Practice') return redirect( 'Mode/'.$type.'/'. $quiz->id . '/' . Auth::id());
        if(\Auth::check()) return redirect( 'Mode/Practice/'. $quiz->id . '/' . Auth::id());
        $game = \DB::table('games')->where('gb_game_name', 'Practice')->first();
        $gmsg = \DB::table('perform_messages')->where('game_id', $game->id)->get();
        $id = $quiz->id;
        $questions = Question::with('options')
                                ->whereIn('id', explode(",", $quiz->questions))
                                ->get();
        $user = \App\User::first();
        $user['lang'] = app()->getLocale();
        $user['log'] = 1;
        $user['start_at'] = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');

        return view('games.practice', compact(['id', 'user', 'questions', 'gmsg', 'quiz']));
    }



}
