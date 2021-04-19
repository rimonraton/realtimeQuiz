<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\QuestionType;
use App\Quiz;
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

    public function type_search($keyword)
    {
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        if ($keyword == 'all'){
            $quizcategory = QuestionType::whereIn('user_id',$admin_users)->orderBy('id', 'desc')->paginate(10);
            return view('Admin.PartialPages.Questions.partial._searchType',compact('quizcategory'));
        }
        $quizcategory = QuestionType::where(function ($query) use($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('bn_name', 'like', '%' . $keyword . '%');
        })
            ->whereIn('user_id',$admin_users)
            ->paginate(10);
        return view('Admin.PartialPages.Questions.partial._searchType',compact('quizcategory'));
    }

    public function quiz_search($keyword,$tid)
    {
        $role = auth()->user()->roleuser->role->role_name;
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        if ($keyword == 'all'){
            $quiz = Quiz::whereIn('user_id',$admin_users)->orderBy('id', 'desc')->where('category_id',$tid)->paginate(10);
            return view('Admin.PartialPages.Quiz.Partial._quiz_search',compact('quiz','role'));
        }
        $quiz = Quiz::where(function ($query) use($keyword) {
            $query->where('quiz_name', 'like', '%' . $keyword . '%')
                ->orWhere('bd_quiz_name', 'like', '%' . $keyword . '%');
        })
            ->whereIn('user_id',$admin_users)
            ->where('category_id',$tid)
            ->paginate(10);
        return view('Admin.PartialPages.Quiz.Partial._quiz_search',compact('quiz','role'));
    }

    public function search_game_cat($keyword)
    {
//        $role = auth()->user()->roleuser->role->role_name;
//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
        if ($keyword == 'all'){
            $game = Game::orderBy('id', 'desc')->paginate(10);
            return view('Admin.Games.partials._game_search',compact('game'));
        }
        $game = Game::where(function ($query) use($keyword) {
            $query->where('gb_game_name', 'like', '%' . $keyword . '%')
                ->orWhere('bd_game_name', 'like', '%' . $keyword . '%');
        })
            ->paginate(10);
        return view('Admin.Games.partials._game_search',compact('game'));
    }
}
