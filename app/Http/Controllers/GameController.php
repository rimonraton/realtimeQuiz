<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\QuestionClickedEvent;
use App\Events\GameStartEvent;
use App\Events\KickUserEvent;
use App\Events\NextQuestionEvent;
use App\Events\AnswerPredictEvent;
// use App\Events\AnswerPredictEvent;
use Auth;

class GameController extends Controller
{
	public function questionClick(Request $request)
	{
		//$gameId 	= $request->gameId;
	    broadcast(new QuestionClickedEvent($request))->toOthers();
	    return $request;
	}

	public function gameStart(Request $request)
	{
		broadcast(new GameStartEvent($request))->toOthers();
	    return $request;
	}

	public function kickUser(Request $request)
	{
		broadcast(new KickUserEvent($request))->toOthers();
	    return $request;
	}

	public function nextQuestion(Request $request)
	{
		broadcast(new NextQuestionEvent($request))->toOthers();
	    return $request;
	}

	public function answerPredict(Request $request)
	{
		broadcast(new AnswerPredictEvent($request))->toOthers();
	    return $request;
	}

	public function pageReload(Request $request)
	{
		broadcast(new \App\Events\PageReloadEvent($request))->toOthers();
	    return $request;
	}

	public function submitAnswerGroup(Request $request)
	{
		broadcast(new \App\Events\GroupAnsSubEvent($request))->toOthers();
		return $request;
	}



	
}
