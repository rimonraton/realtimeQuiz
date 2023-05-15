<?php

namespace App\Http\Controllers;

use App\Events\AddQuestionEvent;
use App\Events\AddTeamEvent;
 use App\Events\ChangeQuestionEvent;
use App\Events\DeleteMessageEvent;
use App\Events\DeleteTeamEvent;
use App\Events\GameEndUserEvent;
use App\Events\GameResetEvent;
use App\Events\GameTeamModeratorStartEvent;
use App\Events\MakeHostEvent;
use App\Events\SendMessageEvent;
use App\Events\TeamJoin;
use App\Message;
use App\Models\Challenge;
use App\Events\GroupAnsSubEvent;
use App\Events\PageReloadEvent;
use App\Models\Share;
use App\Progress;
use App\Question;
use App\Quiz;
use App\Team;
use App\TeamResult;
use App\User;
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
    public function makeHost(User $user, $channel, $status = null)
    {
        broadcast(new MakeHostEvent($user, $channel, $status))->toOthers();
        return [$user, $channel, $status];
    }
	public function questionClick(Request $request): Request
    {
		//$gameId 	= $request->gameId;
	    broadcast(new QuestionClickedEvent($request))->toOthers();
	    return $request;
	}

    public function newGameQuiz(Request $request)
    {
//        return $request->all();
        $challenge = Challenge::find($request->id);
        $catIds = explode(',', $challenge->cat_id);
        $questions = Question::with('options')->whereIn('category_id', $catIds)->inRandomOrder()->limit($challenge->quantity)->get();
//        $data = [
//            'questions' => $questions,
//            'channel' => $request->channel,
//        ];
//        $request->request->add(['questions' => $questions]);
        $qData = json_encode($questions);
        broadcast(new ChangeQuestionEvent($qData, $request->channel))->toOthers();
        return $questions;

//       return $questions = Question::whereIn('category_id', $catIds)->where('status', 1)->inRandomOrder()->limit($challenge->quantity);
	}

    public function gameStart(Request $request)
    {
        $uid = implode(',', $request->uid);
        $link = Str::random(50);
        $share = new Share(array('users_id' => $uid, 'link' => $link, 'users' => json_encode($request->users),'host_id'=>$request->host_id));
        $challenge = Challenge::find($request->id);
        $cs = $challenge->share()->save($share);
        $request->request->add(['share' => $cs]);

        broadcast(new GameStartEvent($request))->toOthers();
        return $cs;

    }
    public function gameTeamModeratorStart(Request $request)
    {
        broadcast(new GameTeamModeratorStartEvent($request))->toOthers();
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

    public function addQuestion(Request $request)
    {
        $channel = $request->channel;
        $cat_id = $request->formdata['topics'];
        $q_num = $request->formdata['q_number'];
        $ext_qids = $request->existing_qids;
        $questions = Question::with('options')
            ->where('category_id',$cat_id)->whereNotIn('id',$ext_qids)->inRandomOrder()->limit($q_num)->get()->toArray();
        //$request->request->add(['questions' => $questions]);
        broadcast(new AddQuestionEvent($channel, $questions))->toOthers();
        return $questions;
    }

    public function addTeam(Request $request)
    {
//        return $request->all();
        $channel = $request->channel;
       $team = Team::create([
            'name'=>$request->teamData['team_english'],
            'bn_name'=>$request->teamData['team_bangla'],
           'user_id'=>$request->user_id,
        ]);

       $team_quiz = Quiz::find($request->qid);

        $team_quiz->update([
           'team_ids'=>$team_quiz->team_ids.','.$team->id
       ]);
        $newTeam = Team::find($team->id);
        broadcast(new AddTeamEvent($channel,$newTeam))->toOthers();
        return $newTeam;
//        return $team_quiz->team_ids.','.$team->id;

    }

    public function deleteTeam(Request $request)
    {
        $channel = $request->channel;
        Team::find($request->id)->delete();
        broadcast(new DeleteTeamEvent($channel,$request->id))->toOthers();
        return $request->id;
    }

    public function teamResult(Request $request)
    {
//        return $request->all();
        $uid = implode(',', $request->users);
        $link = Str::random(50);
        $team_result = new TeamResult(array('qid' => $request->qid, 'host_id' => $request->host, 'link' => $link,'users_id'=>$uid,'results'=>json_encode($request->results)));
        $team_result->save();
        broadcast(new \App\Events\TeamResult($request))->toOthers();
        return $team_result;
    }

    public function getMessage(Request $request)
    {
        return Message::with('user')->where('channel_id', $request->channel)->get();
    }

    public function sendMessage(Request $request)
    {
        broadcast(new SendMessageEvent($request))->toOthers();
        return Message::create([
            'user_id' => $request->user['id'],
            'channel_id' => $request->channel,
            'message' => $request->message,
        ]);
    }

    public function deleteMessage($channel)
    {
        Message::where('channel_id', $channel)->delete();
        broadcast(new DeleteMessageEvent($channel))->toOthers();
        return 'success';
    }

}
