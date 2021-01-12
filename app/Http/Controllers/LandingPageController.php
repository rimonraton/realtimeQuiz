<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('LandingPage.landing_page', compact('category'));
    }
}
