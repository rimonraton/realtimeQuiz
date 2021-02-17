<?php

namespace App\Http\Controllers;

use App\Events\GroupAnsSubEvent;
use App\Events\PageReloadEvent;
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
	public function savePractice()
	{
		return 'success';
	}




}
