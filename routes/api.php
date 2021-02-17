<?php

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

Route::post('questionClick', 'GameController@questionClick');
Route::post('gameStart', 'GameController@gameStart');
Route::post('kickUser', 'GameController@kickUser');

//Moderator
Route::post('nextQuestion', 'GameController@nextQuestion');
Route::post('answerPredict', 'GameController@answerPredict');
Route::post('pageReload', 'GameController@pageReload');
Route::post('submitAnswerGroup', 'GameController@submitAnswerGroup');

//Practice
Route::post('savePractice', 'GameController@savePractice');



