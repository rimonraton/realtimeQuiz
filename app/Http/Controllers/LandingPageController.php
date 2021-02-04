<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feature;
use App\Game;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $features = Game::with('features')->get();
        $category = Category::where('sub_topic_id', 0)->get();
        return view('LandingPage.landing_page', compact('category', 'features'));
    }
}
