<?php

use App\Events\WsEvent;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Game\ChallengeController;


//challenge
Route::post('update-challenge-option-layout', [HomeController::class, 'updateChallengeOptionLayout'])->name('updateChallengeOptionLayout');
Route::get('Challenge/{challenge}/{user}', [HomeController::class, 'Challenge'])->name('Challenge.challenge');
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
