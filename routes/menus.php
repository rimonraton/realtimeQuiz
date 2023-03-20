<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPermissionController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PerformController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionTypeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
Route::middleware(['hasAccess'])->group(function () {
    // dashboard
    Route::get('dashboard', [AdminController::class,'index'])->name('dashboard');

//features
    Route::get('features', [SetupController::class,'features'])->name('features');

//questions
    Route::get('question/list/{id?}', [QuestionController::class, 'list'])->name('question.list');
    Route::get('question/create', [QuestionController::class,'create'])->name('question.create');
    Route::get('question_excel',[ExcelController::class,'index'])->name('question_excel');
    Route::get('review-questions/{id?}', [QuestionController::class, 'reviewQuestions'])->name('question.review');
    Route::get('draft-questions/{id?}', [QuestionController::class, 'draftQuestions'])->name('question.draft');



//questions category
    Route::get('question/category', [QuestionController::class,'index'])->name('question.category');

//question type
    Route::get('questionTypelist', [QuestionTypeController::class,'index'])->name('question.type');

//quiz
    Route::get('quiz/view/list/{tid?}', [QuizController::class, 'list'])->name('practice.list');
    Route::get('quiz/create', [QuizController::class,'create'])->name('practice.create');

//game message
//    Route::get('game/setup', [PerformController::class,'gamesetup'])->name('game.create');
    Route::get('game/perform-message', [PerformController::class,'performmessagesetup'])->name('game.performMessage');

//team
    Route::get('teamlist', [TeamController::class,'index'])->name('teamList');
    Route::get('team_quiz',[TeamController::class,'team_quiz'])->name('teamQuiz');


//profile
    Route::get('profile', [ProfileController::class,'index'])->name('profile');

//Role
    Route::get('rolelist', [RoleController::class,'index'])->name('roleList');
    Route::get('assignRoleList', [RoleController::class,'assignRoleList'])->name('assignRoleList');

//payment
    Route::get('payment', [PaymentController::class,'index'])->name('payment');

//menu
    Route::get('menu',[MenuController::class,'index'])->name('menu');
    Route::get('menuPermission',[MenuPermissionController::class,'index'])->name('menuPermission');

//challange
    Route::get('challenge_setup',[HomeController::class,'challenge_setup'])->name('challengeSetup');
    Route::get('challenge/resultList', [ShareController::class, 'challengeUserResultList'])->name('challenge.resultList');
    Route::get('game/mode/challenge/{id?}', [HomeController::class, 'gameInAdmin'])->name('game.mode');
//    Route::get('game/mode/{type}/{id?}', [HomeController::class, 'gameInAdmin'])->name('game.mode');

//exam
    Route::get('list-of-exam', [ExamController::class, 'index'])->name('listOfExam');
    Route::get('create-exam', [ExamController::class, 'createExam'])->name('createExam');
    Route::get('exams/{id?}', [ExamController::class, 'traineeExams'])->name('exams');

    //new user
    Route::get('new-user',[NewUserController::class,'index'])->name('newUser');
});
