<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search($keyword)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        if ($keyword == 'all'){
            $category = Category::whereIn('user_id',$admin_users)->orderBy('id', 'desc')->paginate(10);
            return view('Admin.PartialPages.Questions.partial._searchCategory',compact('category'));
        }
        $category = Category::where(function ($query) use($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('bn_name', 'like', '%' . $keyword . '%');
        })
            ->whereIn('user_id',$admin_users)
            ->paginate(10);
        return view('Admin.PartialPages.Questions.partial._searchCategory',compact('category'));
    }
}
