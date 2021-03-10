<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Events\GroupAnsSubEvent;
use App\Events\PageReloadEvent;
use App\Progress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\QuestionClickedEvent;
use App\Events\GameStartEvent;
use App\Events\KickUserEvent;
use App\Events\NextQuestionEvent;
use App\Events\AnswerPredictEvent;
// use App\Events\AnswerPredictEvent;

class GameController extends Controller
{
	public function questionClick(Request $request): Request
    {
		//$gameId 	= $request->gameId;
	    broadcast(new QuestionClickedEvent($request))->toOthers();
	    return $request;
	}

	public function gameStart(Request $request): Request
    {
		broadcast(new GameStartEvent($request))->toOthers();
		$challenge = Challenge::find($request->id);
		$challenge->users = implode(',', $request->uid);
		$challenge->save();

	    return $request;
	}

	public function kickUser(Request $request): Request
    {
		broadcast(new KickUserEvent($request))->toOthers();
	    return $request;
	}

	public function nextQuestion(Request $request): Request
    {
		broadcast(new NextQuestionEvent($request))->toOthers();
	    return $request;
	}

	public function answerPredict(Request $request): Request
    {
		broadcast(new AnswerPredictEvent($request))->toOthers();
	    return $request;
	}

	public function pageReload(Request $request): Request
    {
		broadcast(new PageReloadEvent($request))->toOthers();
	    return $request;
	}

	public function submitAnswerGroup(Request $request): Request
    {
		broadcast(new GroupAnsSubEvent($request))->toOthers();
		return $request;
	}
	public function savePractice(Request $request)
	{
        $created_at = ['created_at' => Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s')];
        return Progress::insert(array_merge($request->all(), $created_at));

    }




}
