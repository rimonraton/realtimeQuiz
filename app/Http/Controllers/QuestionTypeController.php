<?php

namespace App\Http\Controllers;

use App\QuestionType;
use Illuminate\Http\Request;
use App\Http\Middleware\HasAccess;

class QuestionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hasAccess',['except'=>[
            'store',
            'update',
            'delete',
        ]]);
    }

    public function index()
    {
       $admin_users = auth()->user()->admin->users->pluck('id');
        $quizcategory = QuestionType::whereIn('user_id',$admin_users)->paginate(10);
        return view('Admin.PartialPages.Questions.partial.quiz_category', compact('quizcategory'));
    }
    public function store(Request $request)
    {

        //    return $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        QuestionType::create([
            'name' => $request->name,
            'bn_name' => $request->bn_name,
            'user_id'=>auth()->user()->id,
        ]);

        return redirect('questionTypelist');
    }
    public function update(Request $request)
    {
//        return $request->all();

        QuestionType::where('id', $request->id)->update([
            'name' => $request->name,
            'bn_name' => $request->bn_name,
        ]);
        return [
            'name'=>$request->name,
            'bn_name'=>$request->bn_name,
        ];
//        return redirect('questionTypelist');
    }

    public function delete($id)
    {
        QuestionType::where('id', $id)->delete();
        return 'Delete Successfully.';
    }

}
