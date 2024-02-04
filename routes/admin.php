<?php

use App\Http\Controllers\Game\ChallengeController;
use Illuminate\Support\Facades\Route;


Route::get('team/resultList', [\App\Http\Controllers\ShareController::class, 'teamResultList']);
Route::get('team/answer/{id}/{team}', [\App\Http\Controllers\ShareController::class, 'teamAnswertList']);

Route::post('user-remove/{user}', [\App\Http\Controllers\AdminController::class, 'userRemove']);

Route::get('game/mode/challenge/{id?}', [ChallengeController::class, 'gameInAdmin'])->name('game.mode');
//    Route::get('game/mode/{type}/{id?}', [HomeController::class, 'gameInAdmin'])->name('game.mode');
//Route::get('ch-admin', function (){
//    return $challenges =  \App\Models\Challenge::with('user.admin')->get();
//    foreach ($challenges as $challenge) {
//        $challenge->admin_id = $challenge->user->admin->id;
//        $challenge->save();
//    }
//});
//
Route::get('cat-admin', function (){
//    return auth()->user()->admin->id;
    $categories =  \App\Category::with('user.admin')->get();
    foreach ($categories as $category) {
        $category->admin_id = $category->user->admin->id;
        $category->save();
    }
})->middleware('auth');
