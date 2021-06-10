<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Game\ChallengeController;

Route::get('{game}/{id}/{user}/share', [ChallengeController::class, 'shareChallengeBtnLink']);
