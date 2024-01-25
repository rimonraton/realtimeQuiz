<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\QuestionType;
use App\Quiz;
use App\Role;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $admin_id;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            $this->admin_id = auth()->user()->admin->id;
            return $next($request);
        });

    }

    public function search($keyword)
    {
        if ($keyword == 'all'){
            $category = Category::where('admin_id', $this->admin_id)->orderBy('id', 'desc')->paginate(10);
            return view('Admin.PartialPages.Questions.partial._searchCategory',compact('category'));
        }
        $category = Category::where(function ($query) use($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('bn_name', 'like', '%' . $keyword . '%');
        })
            ->where('admin_id', $this->admin_id)
            ->paginate(10);
        return view('Admin.PartialPages.Questions.partial._searchCategory',compact('category'));
    }

    public function type_search($keyword)
    {
        if ($keyword == 'all'){
            $quizcategory = QuestionType::where('admin_id', $this->admin_id)->orderBy('id', 'desc')->paginate(10);
            return view('Admin.PartialPages.Questions.partial._searchType',compact('quizcategory'));
        }
        $quizcategory = QuestionType::where(function ($query) use($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('bn_name', 'like', '%' . $keyword . '%');
        })
            ->where('admin_id',$this->admin_id)
            ->paginate(10);
        return view('Admin.PartialPages.Questions.partial._searchType',compact('quizcategory'));
    }

    public function quiz_search($keyword, $tid)
    {
        $role = auth()->user()->roleuser->role->role_name;
        if ($keyword == 'all'){
            $quiz = Quiz::where('admin_id',$this->admin_id)
                ->orderBy('id', 'desc')
                ->where('category_id',$tid)
                ->paginate(10);
            return view('Admin.PartialPages.Quiz.Partial._quiz_search',compact('quiz','role'));
        }
        $quiz = Quiz::where(function ($query) use($keyword) {
            $query->where('quiz_name', 'like', '%' . $keyword . '%')
                ->orWhere('bd_quiz_name', 'like', '%' . $keyword . '%');
        })
            ->where('admin_id',$this->admin_id)
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

    public function search_Q_type($keyword)
    {
        if ($keyword == 'all'){
            $quizcategory = QuestionType::orderBy('id', 'desc')->paginate(10);
            return view('Admin.PartialPages.Questions.partial._searchType',compact('quizcategory'));
        }
        $quizcategory = QuestionType::where(function ($query) use($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('bn_name', 'like', '%' . $keyword . '%');
        })
            ->paginate(10);
        return view('Admin.PartialPages.Questions.partial._searchType',compact('quizcategory'));
    }

    public function search_role($keyword)
    {
        if ($keyword == 'all'){
            $roles = Role::where('id','!=',1)->where('admin_id', $this->admin_id)->orderBy('id', 'desc')->paginate(10);
            return view('Admin.PartialPages.Role.partial._search_role',compact('roles'));
        }
        $roles = Role::where('admin_id', $this->admin_id)->where(function ($query) use($keyword) {
            $query->where('role_name', 'like', '%' . $keyword . '%')
                ->orWhere('bn_role_name', 'like', '%' . $keyword . '%');
        })
            ->paginate(10);
        return view('Admin.PartialPages.Role.partial._search_role',compact('roles'));
    }
}
