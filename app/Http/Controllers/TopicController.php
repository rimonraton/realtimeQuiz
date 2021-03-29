<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search($keyword)
    {

        Category::where(function ($query) use($keyword) {
            $query->where('judul', 'like', '%' . $keyword . '%')
                ->orWhere('writters', 'like', '%' . $keyword . '%');
        })
            ->get();
    }
}
