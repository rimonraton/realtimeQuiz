<?php

use Illuminate\Support\Facades\Route;


Route::get('admintest', function (){
   return 'Admin tests';
});

Route::get('team/resultList', [\App\Http\Controllers\ShareController::class, 'teamResultList']);
Route::get('team/answer/{id}/{team}', [\App\Http\Controllers\ShareController::class, 'teamAnswertList']);

