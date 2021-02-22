<?php

namespace App\Http\Controllers;

use App\QuestionType;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $quizcategory = QuestionType::all();
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
            'bn_name' => $request->bn_name
        ]);

        return redirect('questionTypelist');
    }
    public function update(Request $request)
    {
        QuestionType::where('id', $request->id)->update([
            'name' => $request->name,
            'bn_name' => $request->bn_name,
        ]);
        return redirect('questionTypelist');
    }

    public function delete($id)
    {
        QuestionType::where('id', $id)->delete();
        return 'Delete Successfully.';
    }

}
