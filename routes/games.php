<?php

use App\Events\WsEvent;
use App\Http\Controllers\Game\ModeController;
use App\Http\Controllers\Game\QuizMasterController;
use App\Http\Controllers\Game\PracticeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Game\ChallengeController;
use App\Http\Controllers\TeamController;


//Route::get('Mode/{type}/', [ModeController::class, 'Mode']);
//Route::get('template', [PracticeController::class, 'template'])->name('game.template');
Route::get('Practice', [PracticeController::class, 'index'])->name('game.practice');
Route::get('Practice/{quiz}/{user?}', [PracticeController::class, 'Game'])->name('game.practice.start');
Route::get('getProgress/{id}', [PracticeController::class, 'getProgress'])->name('getProgress');
Route::get('getCategory/{category}', [PracticeController::class,'getCategory']);
//Route::get('getCategory/{type}/{category}', [ModeController::class,'getCategory']);

//For Dashboard
Route::get('quizPractice', [PracticeController::class, 'quizPractice'])->name('quizPractice');
Route::get('quizPracticeCreate', [PracticeController::class, 'quizPracticeCreate'])->name('game.quizPractice.create');
Route::post('quizPracticeSave', [PracticeController::class,'quizPracticeSave'])->name('quizPracticeSave');
Route::post('publishPractice',[PracticeController::class,'publishPractice'])->name('publishPractice');
Route::get('deletePractice/{id}',[PracticeController::class,'deletePractice'])->name('deletePractice');
Route::post('updatePractice',[PracticeController::class,'updatePractice'])->name('updatePractice');


//Challenge
Route::get('challenge/{id?}', [ChallengeController::class, 'gameInAdmin'])->name('game.challenge');
Route::get('challenge/{challenge}/{user}', [HomeController::class, 'Challenge'])->name('game.challenge.start');
Route::post('update-challenge-option-layout', [HomeController::class, 'updateChallengeOptionLayout'])->name('updateChallengeOptionLayout');
Route::post('createChallenge', [HomeController::class, 'createChallenge'])->name('createChallenge');
//challamge setup
Route::post('challange-Published',[HomeController::class,'challenge_publish'])->name('challangePublished');
Route::get('delete_challange/{id}',[HomeController::class,'delete_challange'])->name('deleteChallange');
Route::get('challange_search/{keyword}',[HomeController::class,'challange_search'])->name('challangeSearch');
Route::get('ws', function (){
    event(new WsEvent('Hello from the other side'));
    return 'success';
});

Route::get('quizMaster', [QuizMasterController::class, 'index'])->name('game.moderator');
Route::get('quizMaster/{quiz}/{user}', [QuizMasterController::class, 'quizMasterStart'])->name('game.quizMaster.start');
Route::get('quizMasterCreate', [QuizMasterController::class, 'quizMasterCreate'])->name('game.quizMaster.create');

//Practice and Moderator
Route::get('Mode/{type}/{quiz}/{user}', [HomeController::class, 'Game'])->name('mode');
Route::get('Moderator/{quiz}/{user}', [HomeController::class, 'Moderator'])->name('Moderator');


//team

Route::get('Team/{quiz}/{user}', [HomeController::class, 'Team'])->name('game.team.start');

Route::get('team_quiz',[TeamController::class, 'team_quiz'])->name('game.team');
Route::get('teamlist', [TeamController::class, 'index'])->name('teamList');
Route::get('team/resultList', [\App\Http\Controllers\ShareController::class, 'teamResultList']);
Route::get('team/answer/{id}/{team}', [\App\Http\Controllers\ShareController::class, 'teamAnswertList']);

// Quiz Team
Route::get('game_quiz_create', [QuizController::class, 'game_quiz_create'])->name('gameQuizCreate');
Route::post('game_quiz_save', [QuizController::class,'game_quiz_save'])->name('gameQuizSave');



//Practice Mode Game Old
//Route::get('Mode{type}/{quiz}', [\App\Http\Controllers\PracticeController::class, 'Game'])->name('modeType');

Route::get('Mode/{type}/{id}/{user}/share', [HomeController::class,'shareBtnLink'])->name('modeShare');

// Route::get('game/{id}/{user}', 'HomeController@game');

Route::get('singleGame/{id}/{user}', 'HomeController@singleGame')->name('singleGame');



//Share link
Route::get('{game}/{id}/{user}/share', [ChallengeController::class, 'shareChallengeBtnLink']);
