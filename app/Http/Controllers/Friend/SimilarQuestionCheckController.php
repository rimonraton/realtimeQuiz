<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Atomescrochus\StringSimilarities\Compare;
use Illuminate\Http\Request;

use App\Question;

class SimilarQuestionCheckController extends Controller
{
  public function question()
  {
    return view('Admin.Friends.question');
  }

  public function store(Request $request)
  {
    $request->validate([
      'question' => 'required|string|max:255',
    ]);

    $keywords = explode(' ', $request->input('question'));
    $query = Question::query();

    foreach ($keywords as $keyword) {
      $query->orWhere('question_text', 'like', "%{$keyword}%");
    }

    return $existingQuestions = $query->get();

    $newQuestion = $request->input('question');

    // Fetch all existing questions
    $existingQuestions = Question::whereNotNull('question_text')->get();

    // Check for similar questions
    $similarQuestions = [];
    foreach ($existingQuestions as $question) {
      if ($this->isQuestionSimilar($newQuestion, $question->question_text)) {
        $similarQuestions[] = $question;
      }
    }

    // If similar questions exist, return them
    if (!empty($similarQuestions)) {
      return response()->json([
        'message' => 'Similar questions found.',
        'similar_questions' => $similarQuestions,
      ], 200);
    }

    // If no similar questions exist, insert the new question
//    Question::create(['question' => $newQuestion]);

    return response()->json([
      'message' => 'Question added successfully.',
    ], 201);
  }

  private function isQuestionSimilar($newQuestion, $existingQuestion)
  {
    $compare = new Compare();
    return $compare->smg($newQuestion, $existingQuestion);
  }

public function simi()
{
  $comparison = new Compare();

// the functions returns similarity percentage between strings
  $jaroWinkler = $comparison->jaroWinkler('first string', 'second string'); // JaroWinkler comparison
  $levenshtein = $comparison->levenshtein('first string', 'second string'); // Levenshtein comparison
  $smg = $comparison->smg('first string', 'second string'); // Smith Waterman Gotoh comparison
  $similar = $comparison->similarText('first string', 'second string'); // Using "similar_text()"

// This next one will return an array containing the results of all working comparison methods
// plus an array of 'data' that includes the first and second string, and the time in second it took to run all
// comparison. BE AWARE that comparing long string can results in really long compute time!
  $all = $comparison->all('first string', 'second string');
}




}
