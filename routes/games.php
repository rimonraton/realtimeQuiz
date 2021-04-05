<?php

use App\Http\Controllers\Game\ChallengeController;

Route::get('Challenge/{id}/{user}/share', [ChallengeController::class, 'shareChallengeBtnLink']);
