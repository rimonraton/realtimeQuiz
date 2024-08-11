<?php

use App\Http\Controllers\FlutterController;
use Illuminate\Support\Facades\Route;


//Route::get('getLoginFromFlutter/{random}/{user}/{email}', [FlutterController::class, 'getLoginFromFlutter']);
Route::post('loginFlutter', [FlutterController::class, 'loginFlutter']);
Route::post('resetPassword', [FlutterController::class, 'resetPassword']);
Route::post('registration', [FlutterController::class, 'registerFlutter']);



