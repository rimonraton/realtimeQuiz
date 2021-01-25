<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SubTopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $subtopic = Category::find($id)->childs;
        return view('Admin.PartialPages.Questions.sub_topic', compact('subtopic'));
    }
}
