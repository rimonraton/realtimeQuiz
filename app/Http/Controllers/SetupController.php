<?php

namespace App\Http\Controllers;

use App\FAQ;
use App\Feature;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function features()
    {
        $features = Feature::all();
        return view('Admin.PartialPages.Feature.features', compact('features'));
    }
    public function featureStore(Request $request)
    {
        Feature::create([
            "feature_name" => $request->name
        ]);
        return redirect('features');
    }
    public function featureUpdate(Request $request)
    {
        Feature::where('id', $request->id)->update([
            "feature_name" => $request->name
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
