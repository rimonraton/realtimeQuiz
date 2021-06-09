<?php

namespace App\Http\Controllers;

use App\Events\GameEndUserEvent;
use App\Events\GameResetEvent;
use App\Events\TeamJoin;
use App\Models\Challenge;
use App\Events\GroupAnsSubEvent;
use App\Events\PageReloadEvent;
use App\Models\Share;
use App\Progress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\QuestionClickedEvent;
use App\Events\GameStartEvent;
use App\Events\KickUserEvent;
use App\Events\NextQuestionEvent;
use App\Events\AnswerPredictEvent;
use Illuminate\Support\Str;

// use App\Events\AnswerPredictEvent;

class GameController extends Controller
{
	public function questionClick(Request $request): Request
    {
		//$gameId 	= $request->gameId;
	    broadcast(new QuestionClickedEvent($request))->toOthers();
	    return $request;
	}

    public function gameStart(Request $request)
    {
        $uid = implode(',', $request->uid);
        $link = Str::random(50);
        return $share = new Share(array('users_id' => $uid, 'link' => $link, 'users' => json_encode($request->users),'host_id'=>$request->host_id));
        return $challenge = Challenge::find($request->id);
        $cs = $challenge->share()->save($share);
        $request->request->add(['share' => $cs]);

        broadcast(new GameStartEvent($request))->toOthers();
        return $cs;

    }
    public function gameReset(Request $request)
    {
        broadcast(new GameResetEvent($request))->toOthers();
        return 'GameResetEvent call from server';
    }
    public function gameEndUser(Request $request)
    {
        broadcast(new GameEndUserEvent($request))->toOthers();
        return 'GameEndUserEvent call from server';
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

    public function joinTeam(Request $request)
    {
//        dd($request->all());
        broadcast(new TeamJoin($request))->toOthers();
        return $request->all();
    }




}
