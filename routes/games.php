<?php

use App\Events\WsEvent;
use App\Http\Controllers\Game\ModeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Game\ChallengeController;


Route::get('Mode/{type}/', [ModeController::class, 'Mode']);
//Route::get('Mode/Practice', [PracticeController::class, 'Practice'])->name('practice');
//Route::get('Mode/Challenge', [ChallengeController::class, 'Challenge'])->name('challenge');

Route::get('Team/{quiz}/{user}', [HomeController::class, 'Team'])->name('team.quiz');


Route::get('getCategory/{type}/{category}', [ModeController::class,'getCategory']);

Route::get('Mode/{type}/{quiz}/{user}', [HomeController::class, 'Game'])->name('mode');
Route::get('Mode{type}/{quiz}', [\App\Http\Controllers\PracticeController::class, 'Game'])->name('modeType');

Route::get('Mode/{type}/{id}/{user}/share', [HomeController::class,'shareBtnLink'])->name('modeShare');

// Route::get('game/{id}/{user}', 'HomeController@game');

Route::get('singleGame/{id}/{user}', 'HomeController@singleGame')->name('singleGame');

//challenge
Route::get('Challenge/{challenge}/{user}', [HomeController::class, 'Challenge'])->name('Challenge.challenge');
Route::post('update-challenge-option-layout', [HomeController::class, 'updateChallengeOptionLayout'])->name('updateChallengeOptionLayout');
Route::post('createChallenge', [HomeController::class, 'createChallenge'])->name('createChallenge');
//challamge setup
Route::post('challange-Published',[HomeController::class,'challenge_publish'])->name('challangePublished');
Route::get('delete_challange/{id}',[HomeController::class,'delete_challange'])->name('deleteChallange');
Route::get('challange_search/{keyword}',[HomeController::class,'challange_search'])->name('challangeSearch');
Route::get('ws', function (){
    event(new WsEvent('Helllo from the other side'));
    return 'success';
});

//Share link
Route::get('{game}/{id}/{user}/share', [ChallengeController::class, 'shareChallengeBtnLink']);
