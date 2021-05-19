<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feature;
use App\Game;
use App\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $features = Game::with('features')->get();
//       return User::where('id',16)->first()->admin_id;
        $category = Category::admin()->where('sub_topic_id', 0)->where('is_published',1)->get();
        return view('LandingPage.landing_page', compact('category', 'features'));
    }
}
