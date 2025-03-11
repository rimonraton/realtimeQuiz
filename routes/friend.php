<?php

use App\Http\Controllers\Friend\FriendController;
use App\Http\Controllers\Friend\FriendRequestController;
use Illuminate\Support\Facades\Route;


Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
Route::post('/friendRequest/send', [FriendRequestController::class, 'sendRequest'])->name('friends.send');
Route::post('/friendAccept/{friend}', [FriendRequestController::class, 'acceptRequest'])->name('friends.accept');
Route::post('/friendCancel/{friend}', [FriendRequestController::class, 'cancelRequest'])->name('friends.cancel');
Route::post('/friend-request/reject/{id}', [FriendRequestController::class, 'rejectRequest'])->name('friends.reject');

Route::get('/similar_questions', [\App\Http\Controllers\Friend\SimilarQuestionCheckController::class, 'question'])->name('similar.question');
Route::post('/similar_questions', [\App\Http\Controllers\Friend\SimilarQuestionCheckController::class, 'store'])->name('similar.question.store');


