<?php

namespace App\Http\Controllers\Game;

use App\Events\SingleDisplay\AudioVideoEndEvent;
use App\Events\SingleDisplay\UserJoinEvent;
use App\Events\SingleDisplayJoinEvent;
use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use stdClass;
use Auth;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class SingleQuestionDisplayQuizController extends Controller
{
    public function game(Challenge $challenge, $uid)
    {
        $gmsg = \DB::table('perform_messages')->where('game_id', 2)->get();
        $questions = Question::with('options')
            ->whereIn('id', explode(",", $challenge->question_id))->get();
        $user = Auth::user();
        if(!$user) {
            $user = new stdClass();
        }
        $user->lang = app()->getLocale();
        $user->start_at = Carbon::now('Asia/Dhaka')->format('Y-m-d h:i:s');
        $geoip = new GeoIPLocation();
        if($geoip->getIp()) $geoip->setIP('27.147.187.184');
        $country = strtolower($geoip->getCountryCode());
        $user->country =  $country == null ? 'bd': $country;
        //event(new SingleDisplayJoinEvent('SingleQuestionDisplay.280.69'));
        return view('games.single_question', compact(['challenge', 'questions', 'gmsg', 'user', 'uid']));
   }

    public function userJoin(Request $request): string
    {
//        return $request->user;
        broadcast(new UserJoinEvent($request))->toOthers();
        return 'user Join Event';
    }

    public function audioVideoEnd(Request $request): string
    {
        broadcast(new AudioVideoEndEvent($request))->toOthers();
        return 'audio Video End Event';
    }
}
