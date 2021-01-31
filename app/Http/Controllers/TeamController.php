<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $teams = Team::all();
        return view('Admin.PartialPages.Team.teamlist', compact('teams'));
    }
    public function createTeam(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Team::create([
            "name" => $request->name
        ]);
        return redirect('teamlist');
    }

    public function updateTeam(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Team::where('id', $request->id)->update([
            "name" => $request->name
        ]);
        return redirect('teamlist');
    }
    public function deleteTeam($id)
    {
        Team::where('id', $id)->delete();
        return "Deleted Successfully";
    }
}
