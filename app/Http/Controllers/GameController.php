<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\QuestionClickedEvent;
use App\Events\GameStartEvent;
use App\Events\KickUserEvent;
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
}
