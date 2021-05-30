<?php

use App\Http\Controllers\GameController;
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

Route::post('questionClick', [GameController::class, 'questionClick']);
Route::post('gameStart', [GameController::class, 'gameStart']);
Route::post('gameEndUser', [GameController::class, 'gameEndUser']);
Route::post('gameReset', [GameController::class, 'gameReset']);
Route::post('kickUser', [GameController::class, 'kickUser']);

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



