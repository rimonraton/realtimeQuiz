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
        $category = Category::all();
        return view('LandingPage.landing_page', compact('category', 'features'));
    }
}
