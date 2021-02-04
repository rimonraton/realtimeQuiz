<?php

namespace App\Http\Controllers;

use App\QuizCategory;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $quizcategory = QuizCategory::all();
        return view('Admin.PartialPages.Questions.partial.quiz_category', compact('quizcategory'));
    }
    public function store(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        QuizCategory::create([
            'name' => $request->name
        ]);

        return redirect('questionTypelist');
    }
    public function update(Request $request)
    {
        QuizCategory::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect('questionTypelist');
    }

    public function delete($id)
    {
        QuizCategory::where('id', $id)->delete();
        return 'Delete Successfully.';
    }

}
