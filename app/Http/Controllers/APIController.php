<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use App\Question;
use App\Quiz;
use App\Category;

class APIController extends Controller
{
    public function getCategories()
    {
        return Category::withCount('childs')->where('sub_topic_id', 0)->get();
    }
    public function getSubCategories($categoryId)
    {
        return Category::find($categoryId)->childs;
    }
    public function getQuizzes($subCategoryId)
    {
        return Category::find($subCategoryId)->quizzes;
    }
    public function getQuestions($quizId)
    {
        $q = Quiz::find($quizId);
       return $questions = Question::with('options')->whereIn('id', explode(",", $q->questions))->get();
        $collection = collect($q);
        $merged = $collection->merge(['q' => $questions]);
        return $merged->all();
    }
    public function saveResults(Request $request)
    {
//        return $request->all();
        Result::create([
            'user_id' => $request->user_id,
            'examination_id' => $request->examination_id,
            'result' => json_encode($request->results)
        ]);
        return 'Exam submitted';
    }
}
