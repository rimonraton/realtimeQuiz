<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\Game\ChallengeController;
use App\Http\Controllers\Game\ModeController;
use App\Http\Controllers\Game\PracticeController;
use App\Http\Controllers\Game\SingleQuestionDisplayQuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPermissionController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionTypeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserCredential;
use App\Http\Middleware\HasAccess;
use App\Mail\WelcomeMail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
//use Mail;
// use Victorybiz\GeoIPLocation\GeoIPLocation;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('testregistration', function () {
//    $user = \App\User::find(9);
//     Mail::to($user->email)->send(new WelcomeMail($user));
//     return 'Success';

//     return \App\UserInfo::where('mobile','01723144904')->first()->user;
     return view('auth.registertoday');
 });

Route::get('/', 'LandingPageController@index');
// Route::get('landing/page', 'LandingPageController@index');
// website setup
Route::post('features/save', [SetupController::class,'featureStore'])->name('features.save');
Route::post('features/update', [SetupController::class,'featureUpdate'])->name('features.update');
Route::get('features/delete/{id}', [SetupController::class,'featureDelete'])->name('features.delete');
Route::get('faq', [SetupController::class,'faq']);

// Question subtopic
Route::get('question/subtopic/{id}', 'SubTopicController@index')->name('question.subtopic');

//testlogin
//Route::get('t_reset',function (){
//    return view('LandingPage.reset');
//});

// Game
Route::get('perform-message', 'PerformController@index')->name('performMessage');
Route::post('game/gamemode/save', 'PerformController@gamemodestore')->name('game.save');
Route::post('game/gamemode/update', 'PerformController@gamemodeupdate')->name('game.update');
Route::get('game/gamemode/delete/{id}', 'PerformController@gamemodedelete')->name('game.delete');
Route::post('game/perform-message/save', 'PerformController@performmessagesstore')->name('performMessage.save');
Route::post('game/perform-message/edit', 'PerformController@performmessagesupdate')->name('performMessage.edit');
Route::get('game/perform-message/delete/{id}', 'PerformController@performmessagesdelete')->name('performMessage.delete');
//Route::get('search_game_cat/{keyword}', 'SearchController@search_game_cat');

// Payment
Route::post('create-institute',[\App\Http\Controllers\PaymentController::class,'store'])->name('createInstitute');
//new User create

Route::get('userCredential/{token}',[UserCredential::class,'userCredential'])->name('userCredential');


Auth::routes();

Route::get('/home', function () {
	return redirect('/');
});

// Route::get('/home', 'HomeController@home')->name('home');

Route::get('Mode/{type}/', [ModeController::class, 'Mode']);
//Route::get('Mode/Practice', [PracticeController::class, 'Practice'])->name('practice');
//Route::get('Mode/Challenge', [ChallengeController::class, 'Challenge'])->name('challenge');

Route::get('getCategory/{type}/{category}', [ModeController::class,'getCategory']);

Route::get('Mode/{type}/{quiz}/{user}', [HomeController::class, 'Game'])->name('mode');
Route::get('Mode{type}/{quiz}', [\App\Http\Controllers\PracticeController::class, 'Game'])->name('modeType');

Route::get('Mode/{type}/{id}/{user}/share', [HomeController::class,'shareBtnLink'])->name('modeShare');

// Route::get('game/{id}/{user}', 'HomeController@game');

Route::get('singleGame/{id}/{user}', 'HomeController@singleGame')->name('singleGame');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('setLanguage/{locale}', function ($locale) {
	App::setLocale($locale);
	session(['locale' => $locale]);
	return redirect()->back();
});

Route::post('contact', [\App\Http\Controllers\ContractController::class ,'sendMessage']);

Route::get('getProgress/{id}', [HomeController::class, 'getProgress'])->name('getProgress');
Route::get('/lang-{lang}.js', 'LanguageController@show');


Route::get('SingleQuestionDisplay/{challenge}/{uid}', [SingleQuestionDisplayQuizController::class, 'Game'])->name('SingleQuestionDisplay');



Route::get('challengeShareResult/{link}', [\App\Http\Controllers\ShareController::class, 'challengeShareResult'])->name('challengeShareResult');
Route::get('challengeShareResult/{link}/details', [\App\Http\Controllers\ShareController::class, 'challengeShareResultDetails'])->name('challengeShareResult.details');
Route::get('challengeShare/{link}', [\App\Http\Controllers\ShareController::class, 'challengeShare'])->name('challengeShare');
//Route::get('product',function (){
//
//    \Excel::import(new \App\Imports\QuestionImport(), public_path('prods.xlsx'));
//});

Route::post('saveFile',[\App\Http\Controllers\FileController::class,'store'])->name('saveFile');
Route::get('deleteFile/{path}',[\App\Http\Controllers\FileController::class,'deleteFile'])->name('deleteFile');


//export

Route::get('export_questions',[\App\Http\Controllers\ExcelController::class,'export'])->name('exportQuestions');
Route::get('newreset',function (){
return view('auth.passwords.newreset');
});

//Search

Route::get('search_quiz/{keyword}/{tid}',[\App\Http\Controllers\SearchController::class,'quiz_search'])->name('searchQuiz');
Route::get('search_role/{keyword}',[\App\Http\Controllers\SearchController::class,'search_role'])->name('searchRole');



//login User Cedentials
Route::get('user_cedential/{value}',[\App\Http\Controllers\Auth\LoginController::class,'user_cedential'])->name('userCedential');

Route::post('question-update',[QuestionController::class,'question_update'])->name('questionUpdate');
Route::get('search-user/{keyword}',[NewUserController::class,'search_user'])->name('searchUser');
Route::post('shareStore',[NewUserController::class,'shareQuestionStore'])->name('shareStore');

//delete Result
Route::get('deleteresult/{id}',[\App\Http\Controllers\ShareController::class,'deleteResult'])->name('deleteResult');

//Team Member
Route::post('team-members',[\App\Http\Controllers\TeamController::class,'teamMember'])->name('teamMembers');
Route::get('delete-team/{id}',[\App\Http\Controllers\TeamController::class,'teamDelete'])->name('deleteTeam');
Route::post('save_team',[\App\Http\Controllers\TeamController::class,'save_team'])->name('saveTeam');

//Team Quiz
Route::get('delete_team_quiz/{id}',[\App\Http\Controllers\TeamController::class,'delete_team_quiz'])->name('deleteTeamQuiz');
Route::get('quiz_info/{id}',[\App\Http\Controllers\TeamController::class,'quiz_info'])->name('quiz_info');

//role user search
Route::get('rolo-user-search/{keyword}',[\App\Http\Controllers\RoleController::class,'searchRoleUser'])->name('roleUserSearch');


// Questions
Route::get('question/delete/{id}', 'QuestionController@deleteQuestion')->name('question.delete');
Route::get('question/list/view/{cid}', 'QuestionController@getQuestiontoday')->name('question.list');
Route::post('question_store_by_excel',[ExcelController::class,'store'])->name('questionStoreByExcel');


Route::get('quiz/getlist/{topic}', [QuizController::class,'getlistbytopic'])->name('quiz.getList');



Route::get('quiz/{quiz_id}/{question_id}/delete', [QuizController::class,'quizdelete'])->name('quiz.question.delete');
Route::get('quiz/quiz/{id}', [QuizController::class,'quiz'])->name('quiz.withOption');
Route::post('createRoleUser', 'RoleController@createRoleUser')->name('createRoleUser');


Route::post('storeRole', [RoleController::class,'storeRole'])->name('createRolestoreRole');


Route::middleware(['hasAccess'])->group(function () {
    //new user
    Route::post('create-new-user',[NewUserController::class,'create'])->name('createNewUser');
    Route::post('update-new-user',[NewUserController::class,'update'])->name('updateNewUser');
    Route::get('send-email/{user}',[NewUserController::class,'sendEmail'])->name('sendEmail');
    Route::get('role-wise-users/{role}',[NewUserController::class,'roleWiseUsers'])->name('roleWiseUsers');

    //question
    Route::get('question-list/{tid}', [QuestionController::class, 'qListByTopic'])->name('questionListView');
    Route::get('question-list-with-keyword/{tid}/{keyword}', [QuestionController::class, 'qListByTopicKeyword'])->name('questionListWithKeyword');
    Route::post('question/save', [QuestionController::class,'storeQuestion'])->name('question.save');
    Route::post('option-file-update',[QuestionController::class,'optionFileUpdate'])->name('optionFileUpdate');
    Route::get('deleteoption/{id}','QuestionController@deleteOption')->name('deleteOption');
    Route::get('question/getlist/{id}/{keyword?}/{qType?}', [QuestionController::class, 'getlist'])->name('question.getList');
    Route::get('question/edit/{id}', [QuestionController::class,'editQuestion'])->name('question.edit');
    Route::post('user-verify',[NewUserController::class, 'userVerify'])->name('userVerify');
    Route::post('question/update', 'QuestionController@updateQuestion')->name('question.update');
    Route::get('share-questions', [QuestionController::class,'shareQuestion'])->name('shareQuestion');

    //review question
    Route::get('question/get-review-list/{id}/{keyword?}/{qType?}', [QuestionController::class, 'getreviewlist'])->name('question.getReviewList');
    Route::get('reviewQuestion/edit/{id}', [QuestionController::class,'editQuestion'])->name('reviewQuestion.edit');
    Route::post('verify-question-update', [QuestionController::class, 'verifyQuestionUpdate'])->name('verifyQuestionUpdate');

    //Draft question
    Route::post('verify-draft-question-update', [QuestionController::class, 'verifyDraftQuestionUpdate'])->name('verifyDraftQuestionUpdate');
    Route::get('question/get-draft-list/{id}/{keyword?}/{qType?}', [QuestionController::class, 'getDraftList'])->name('question.getDraftList');
    Route::get('draftQuestion/edit/{id}', [QuestionController::class,'editQuestion'])->name('draftQuestion.edit');
    Route::get('question-view/{id}', [QuestionController::class,'viewQuestion'])->name('question.view');

    //share question
    Route::post('verify-share-question-update', [QuestionController::class, 'verifyShareQuestionUpdate'])->name('verifyShareQuestionUpdate');
    Route::get('shareQuestion/edit/{id}', [QuestionController::class,'editQuestion'])->name('shareQuestion.edit');

    // Menu
    Route::post('saveMenu',[MenuController::class,'store'])->name('saveMenu');
    Route::post('menuUpdate',[MenuController::class,'updateMenu'])->name('menuUpdate');
    Route::post('savemenuPermission',[MenuPermissionController::class,'store'])->name('saveMenuPermission');
    Route::get('deleteMenu/{id}',[MenuController::class,'delete'])->name('deleteMenu');
    Route::get('selectedMenu/{role_id}',[MenuController::class, 'getselectedMenu'])->name('selectedMenu');
    Route::get('selectedUserMenu/{user_id}',[MenuController::class, 'getUserSelectedMenu'])->name('selectedUserMenu');
    Route::get('role-users/{role}',[NewUserController::class,'roleUsers'])->name('roleUsers');

    //Exam
    Route::get('start-exams/{examination}/{uid}', [ExamController::class, 'startExam'])->name('startExams');
    Route::post('save-examination', [ExamController::class, 'store'])->name('saveExamination');
    Route::post('mode-update', [ExamController::class, 'timeModeUpdate'])->name('modeUpdate');
    Route::post('examPublished', [ExamController::class, 'examPublished'])->name('examPublished');
    Route::get('show-result/{examination}/{uid}', [ExamController::class, 'showUserResult'])->name('showResult');
    Route::get('exam-result/{examination}', [ExamController::class, 'showExamResult'])->name('examResult');
    Route::post('mark-update', [ExamController::class, 'markUpdate'])->name('markUpdate');
    Route::post('exam-name-update', [ExamController::class, 'examNameUpdate'])->name('examNameUpdate');
    Route::post('schedule-update', [ExamController::class, 'scheduleUpdate'])->name('scheduleUpdate');
    Route::get('all-topics-has-question', [ExamController::class, 'allTopicsHasQuestion'])->name('allTopicsHasQuestion');

    // Question Category
    Route::post('question/savecategory', [QuestionController::class,'store'])->name('question.saveCategory');
    Route::post('question/updatecategory', [QuestionController::class,'update'])->name('question.updateCategory');
    Route::get('question/deletecategory/{id}', [QuestionController::class,'delete'])->name('question.deleteCategory');
    Route::get('search_category/{keyword}',[SearchController::class,'search'])->name('question.searchCategory');
    Route::post('category-Published',[QuestionController::class,'published_category'])->name('categoryPublished');

    // Questions Type
    Route::post('questionTypesave', [QuestionTypeController::class,'store'])->name('questionTypeSave');
    Route::post('questionTypeupdate', [QuestionTypeController::class,'update'])->name('questionTypeUpdate');
    Route::get('questionTypedelete/{id}', [QuestionTypeController::class,'delete'])->name('questionTypeDelete');
    Route::get('search_Q_type/{keyword}',[SearchController::class,'search_Q_type'])->name('searchQType');

    // Quiz Team
    Route::get('game_quiz_create', [QuizController::class,'game_quiz_create'])->name('gameQuizCreate');
    Route::post('game_quiz_save', [QuizController::class,'game_quiz_save'])->name('gameQuizSave');
    Route::get('Team/{quiz}/{user}', [HomeController::class, 'Team'])->name('team.quiz');

    // Quiz Practice
    Route::get('quiz/quiz/list/{id}', [QuizController::class,'quizList'])->name('quiz.withOptionList');
    Route::get('quiz/list/{topic}', [QuizController::class,'getQuestionsByTopic'])->name('quiz.list');
    Route::post('quiz/save', [QuizController::class, 'store'])->name('quiz.save');
    Route::get('quiz/delete/{id}', [QuizController::class,'deleteQuiz'])->name('quiz.delete');
    Route::get('quiz/{id}/edit', [QuizController::class,'quizEdit'])->name('quiz.edit');
    Route::post('quiz/update', [QuizController::class,'quizUpdate'])->name('quiz.update');
    Route::post('quizPublished', [QuizController::class,'quizPublished'])->name('quizPublished');
    Route::post('qiiz-time-update', [QuizController::class,'quizTimeUpdate'])->name('quizTimeUpdate');
    Route::post('team-quiz-time-update', [QuizController::class,'quizTimeUpdate'])->name('teamQuizTimeUpdate');

    // Team
    Route::post('createTeam', [TeamController::class,'createTeam'])->name('createTeam');
    Route::post('updateTeam', [TeamController::class,'updateTeam'])->name('updateTeam');
    Route::get('deleteTeam/{id}', 'TeamController@deleteTeam')->name('deleteTeam');

    // Role
    Route::post('createRole', [RoleController::class,'createRole'])->name('createRole');
    Route::post('roleUpdate', [RoleController::class,'roleUpdate'])->name('roleUpdate');
    Route::get('roleDelete/{id}', [RoleController::class,'roleDelete'])->name('roleDelete');
    Route::post('roleuserUpdate', [RoleController::class,'roleuserUpdate'])->name('roleUserUpdate');
    Route::get('deleteroleUser/{id}', [RoleController::class,'deleteroleUser'])->name('deleteRoleUser');

    // profile
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');

    //challenge
    Route::post('update-challenge-option-layout', [HomeController::class, 'updateChallengeOptionLayout'])->name('updateChallengeOptionLayout');
    Route::get('Challenge/{challenge}/{user}', [HomeController::class, 'Challenge'])->name('Challenge.challenge');
    Route::post('createChallenge', [HomeController::class, 'createChallenge'])->name('createChallenge');
    //challamge setup
    Route::post('challange-Published',[HomeController::class,'challenge_publish'])->name('challangePublished');
    Route::get('delete_challange/{id}',[HomeController::class,'delete_challange'])->name('deleteChallange');
    Route::get('challange_search/{keyword}',[HomeController::class,'challange_search'])->name('challangeSearch');

});
