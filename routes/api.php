<?php

use App\Http\Controllers\Game\SingleQuestionDisplayQuizController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('token', [AuthTokenController::class, 'requestToken']);

Route::post('questionClick', [GameController::class, 'questionClick']);
Route::post('gameStart', [GameController::class, 'gameStart']);
Route::post('gameTeamModeratorStart', [GameController::class, 'gameTeamModeratorStart']);
Route::post('gameEndUser', [GameController::class, 'gameEndUser']);
Route::post('gameReset', [GameController::class, 'gameReset']);
Route::post('kickUser', [GameController::class, 'kickUser']);
Route::post('newGameQuiz', [GameController::class, 'newGameQuiz']);
Route::post('makeHost/{user}/{channel}/{status?}', [GameController::class, 'makeHost']);

//SingleDisplayQuiz
Route::post('userJoin', [SingleQuestionDisplayQuizController::class, 'userJoin']);
Route::post('audioVideoEnd', [SingleQuestionDisplayQuizController::class, 'audioVideoEnd']);



//Moderator
Route::post('nextQuestion', [GameController::class, 'nextQuestion']);
Route::post('answerPredict', [GameController::class, 'answerPredict']);
Route::post('pageReload', [GameController::class, 'pageReload']);
Route::post('submitAnswerGroup', [GameController::class, 'submitAnswerGroup']);

//Practice
Route::post('savePractice', [GameController::class, 'savePractice']);

//Challenge
Route::post('challengeResult', [\App\Http\Controllers\ShareController::class, 'challengeResult']);
Route::post('jointeam',[GameController::class,'joinTeam']);
Route::post('addQuestion',[GameController::class,'addQuestion']);
Route::post('addTeam',[GameController::class,'addTeam']);
Route::post('deleteTeam',[GameController::class,'deleteTeam']);
Route::post('teamResult',[GameController::class,'teamResult']);


// api section
Route::get('get-categories', [APIController::class, 'getCategories'])->middleware('auth:sanctum');
Route::get('get-sub-categories/{categoryId}', [APIController::class, 'getSubCategories']);
Route::get('get-quizzes/{subCategoryId}', [APIController::class, 'getQuizzes']);
Route::get('get-questions/{quizId}', [APIController::class, 'getQuestions']);

//result
Route::post('save-results', [APIController::class, 'saveResults']);

//Chat
Route::post('getMessage', [GameController::class, 'getMessage']);
Route::post('sendMessage', [GameController::class, 'sendMessage']);
Route::post('deleteMessage/{channel}', [GameController::class, 'deleteMessage']);

//Exist Exam Given User
Route::post('save-exist-exam-given-user', [GameController::class, 'storeExistExam']);
Route::post('delete-exist-exam-given-user', [GameController::class, 'deleteExistExam']);
Route::post('unlock-exam', [GameController::class, 'unlockExistExam']);

//Flutter Routes
//Route::post('loginFromFlutter', [\App\Http\Controllers\Auth\LoginController::class, 'loginFromFlutter']);
Route::get('getLoginFromFlutter/{user}/{email}', [\App\Http\Controllers\Auth\LoginController::class, 'getLoginFromFlutter']);
//temporary
Route::post('loginFlutter', [\App\Http\Controllers\LandingPageController::class, 'loginFlutter']);
Route::get('resetPassword', [\App\Http\Controllers\LandingPageController::class, 'resetPassword']);
Route::post('registration', [\App\Http\Controllers\Auth\RegisterController::class, 'registerFlutter']);




