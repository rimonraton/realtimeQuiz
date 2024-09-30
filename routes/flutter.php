<?php

use App\Http\Controllers\FlutterController;
use Illuminate\Support\Facades\Route;


Route::post('loginFlutter', [FlutterController::class, 'loginFlutter']);
Route::post('resetPassword', [FlutterController::class, 'resetPassword']);
Route::post('registration', [FlutterController::class, 'registerFlutter']);
Route::post('updatePassword', [FlutterController::class, 'updatePassword']);





