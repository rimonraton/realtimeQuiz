<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Team;
use App\TeamMember;
use App\TeamResult;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [];
        $tids = TeamMember::all();
//        return Arr::collapse([$tids]);
       foreach ($tids as $tid){
          $arr = explode(',',$tid->user_ids);
          $data = Arr::collapse([$arr]);
       }
//       return count($tdata);
//        if(in_array(56,$data))
//        {
//           return $newdata = implode(',',$data);
//           return TeamMember::where('user_ids',$newdata)->get();
//
//        }
//       return count($data);

//       whereNotIn
//        return auth()->user()->roleuser;
//          $user_ids = Team::all();
//      return $user_ids = Team::find(2);
//       return explode(',',$user_ids->user_ids);
//        User::whereIn('id',explode(',',$user_ids->user_ids))->get();
        $admin_users = auth()->user()->admin->users;
        $teams = Team::orderBy('id','desc')->paginate(10);
        return view('Admin.PartialPages.Team.teamlist', compact('teams','admin_users','data'));
    }
    public function createTeam(Request $request)
    {
//        return $request->all();
        $random = Str::random(40);
        $request->validate([
            'name' => 'required',
        ]);
       $id = Team::insert([
            "name" => $request->name,
            'bn_name'=>$request->bn_name,
            'link'=>$random,
            'user_id'=>Auth::id(),
        ]);

        $members = implode(',',$request->members);
        TeamMember::insert([
            'team_id'=>$id->id,
            'user_ids'=>$members
        ]);
        return redirect('teamlist');
    }

    public function updateTeam(Request $request)
    {
//        return $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        Team::where('id', $request->id)->update([
            "name" => $request->name,
            "bn_name"=>$request->bnName,
        ]);
        $members = implode(',',$request->members);
        TeamMember::updateOrInsert(
            ['team_id'=>$request->id],
            [
            'team_id'=>$request->id,
            'user_ids'=>$members
            ]
        );
        return redirect('teamlist');
    }
    public function deleteTeam($id)
    {
        Team::where('id', $id)->delete();
        TeamMember::where('team_id',$id)->delete();
        return "Deleted Successfully";
    }

    public function teamMember(Request $request)
    {
       $members = implode(',',$request->members);
       TeamMember::create([
           'team_id'=>$request->team,
           'user_ids'=>$members
       ]);
        return redirect('teamlist');
    }

    public function teamDelete($id)
    {
        Team::find($id)->delete();
        return 'Success';
    }

    public function save_team(Request $request)
    {
        $random = Str::random(40);
        Team::create([
            'name'=> $request->team_name,
            'bn_name'=>$request->team_name_bang,
            'link'=>$random,
            'user_id'=>Auth::id()
        ]);
        return Team::get()->last();
    }

    public function team_quiz()
    {
//         $quiz = Quiz::find(822);
//         $teams = Team::whereIn('id',explode(',',$quiz->team_ids))->get();
//         $collection = collect($quiz);
//         $merge_qt = $collection->merge($teams);
//         return $result = $merge_qt->quiz_name;

        $quizzes = Quiz::where('game_id',3)->where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('Admin.PartialPages.Team.teamquiz',compact('quizzes'));
    }

    public function delete_team_quiz($id)
    {
        Quiz::find($id)->delete();
        return 'Success';
    }

    public function quiz_info($id)
    {
        $quiz = Quiz::find($id);
        $teams = Team::whereIn('id',explode(',',$quiz->team_ids))->get();
        return [$quiz, $teams];
    }
}
