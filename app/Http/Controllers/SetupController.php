<?php

namespace App\Http\Controllers;

use App\FAQ;
use App\Feature;
use App\Game;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function features()
    {
        // $features = Feature::all();
        $perfom_message = Game::with('features')->get();
        return view('Admin.PartialPages.Feature.features', compact('perfom_message'));
    }
    public function featureStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'game_id' => 'required',
            'gb_feature_name' => 'required',
            // 'bn_name' => 'required',
        ]);
        Feature::create([
            "game_id" => $request->game_id,
            "gb_feature_name" => $request->gb_feature_name,
            "bd_feature_name" => $request->bd_feature_name,
        ]);
        return redirect('features');
    }
    public function featureUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'gb_feature_name' => 'required',
            // 'bn_name' => 'required',
        ]);
        Feature::where('id', $request->id)->update([
            "gb_feature_name" => $request->gb_feature_name,
            "bd_feature_name" => $request->bd_feature_name,
        ]);
        return redirect('features');
    }
    public function featureDelete($id)
    {
        Feature::where('id', $id)->delete();
        return "Delete Successfully";
    }
    public function faq()
    {
        $faq = FAQ::all();
        return view('Admin.PartialPages.FAQ.faq', compact('faq'));
    }
}
