<?php

use App\Http\Controllers\Game\ChallengeController;
use Illuminate\Support\Facades\Route;




Route::post('user-remove/{user}', [\App\Http\Controllers\AdminController::class, 'userRemove']);

Route::get('setAdminId/{modelName}', function ($modelName){
    $model = '\App\\' . $modelName;

    $colllections =  $model::with('user.admin')->get();
    foreach ($colllections as $colllection) {
        $colllection->admin_id = $colllection->user->admin->id;
        $colllection->save();
    }
    return 'Successfully set admin_id to Model => '. $modelName;

})->middleware('auth');





 
