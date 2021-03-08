<?php

namespace App\Http\Controllers;

use App\Game;
use App\PerformMessage;
use Illuminate\Http\Request;

class  PerformController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return Game::find('2')->load('perform_messages');
    }
    public function gamesetup()
    {
         $game = Game::paginate(10);
        return view('Admin.PartialPages.GameSetup.gamesetup', compact('game'));
    }
    public function gamemodestore(Request $request)
    {
        $request->validate([
            'gb_game_name' => 'required',
        ]);
        Game::create([
            'gb_game_name' => $request->gb_game_name,
            'bd_game_name' => $request->bd_game_name,
        ]);
        return redirect('game/setup');
    }
    public function gamemodeupdate(Request $request)
    {
        Game::where('id', $request->id)->update([
            'gb_game_name' => $request->gb_game_name,
            'bd_game_name' => $request->bd_game_name,
        ]);
        return redirect('game/setup');
    }
    public function gamemodedelete($id)
    {
        Game::where('id', $id)->delete();
        return 'Deleted Successfully';
    }
    public function performmessagesetup()
    {
        //    $perfom_message = PerformMessage::all();
        $perfom_message = Game::with('perform_messages')->get();
        return view('Admin.PartialPages.GameSetup.performsetup', compact('perfom_message'));
    }
    public function performmessagesstore(Request $request)
    {
        // return $request->all();
        PerformMessage::create([
            'game_id' => $request->game_id,
            'perform_status' => $request->perform_status,
            'perform_message' => $request->message,
        ]);
        return redirect('game/perform-message');
    }

    public function performmessagesupdate(Request $request)
    {
        PerformMessage::where('id',$request->id)->update([
            'perform_status' => $request->perform_status,
            'perform_message' => $request->message,
            'bd_perform_message' => $request->bn_message,
        ]);
        return redirect('game/perform-message');
    }

    public function performmessagesdelete($id)
    {
        PerformMessage::where('id',$id)->delete();
        return "Deleted Successfully";
    }
}
