<?php

use App\Http\Controllers\Game\ChallengeController;
use App\Http\Controllers\Game\ModeController;
use App\Http\Controllers\Game\PracticeController;
use App\Http\Controllers\Game\SingleQuestionDisplayQuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPermissionController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
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
Route::post('features/save', 'SetupController@featureStore')->name('features.save');
Route::post('features/update', 'SetupController@featureUpdate')->name('features.update');
Route::get('features/delete/{id}', 'SetupController@featureDelete')->name('features.delete');
Route::get('faq', 'SetupController@faq');

// Question Category
Route::post('question/savecategory', 'QuestionController@store')->name('question.saveCategory');
Route::post('question/updatecategory', [QuestionController::class,'update'])->name('question.updateCategory');
Route::get('question/deletecategory/{id}', 'QuestionController@delete')->name('question.deleteCategory');
Route::get('search_category/{keyword}',[\App\Http\Controllers\SearchController::class,'search'])->name('question.searchCategory');

//User
Route::post('user-verify',[NewUserController::class, 'userVerify'])->name('userVerify');

// Questions
Route::get('question-list/{tid}', [QuestionController::class, 'qListByTopic'])->name('questionList');
Route::get('question-list-with-keyword/{tid}/{keyword}', [QuestionController::class, 'qListByTopicKeyword'])->name('questionListWithKeyword');
Route::post('question/save', 'QuestionController@storeQuestion')->name('question.save');
Route::get('question/getlist/{id}/{keyword?}/{qType?}', [QuestionController::class, 'getlist'])->name('question.getList');
Route::get('question/get-review-list/{id}/{keyword?}/{qType?}', [QuestionController::class, 'getreviewlist'])->name('question.getReviewList');
Route::get('question/get-draft-list/{id}/{keyword?}/{qType?}', [QuestionController::class, 'getDraftList'])->name('question.getDraftList');
Route::get('question/edit/{id}', [QuestionController::class,'editQuestion'])->name('question.edit');
Route::get('question-view/{id}', [QuestionController::class,'viewQuestion'])->name('question.view');
Route::post('question/update', 'QuestionController@updateQuestion')->name('question.update');
Route::get('question/delete/{id}', 'QuestionController@deleteQuestion')->name('question.delete');
Route::get('question/list/view/{cid}', 'QuestionController@getQuestiontoday')->name('question.list');
Route::get('deleteoption/{id}','QuestionController@deleteOption')->name('deleteOption');
Route::post('question_store_by_excel',[\App\Http\Controllers\ExcelController::class,'store'])->name('questionStoreByExcel');
Route::post('option-file-update',[QuestionController::class,'optionFileUpdate'])->name('optionFileUpdate');
Route::post('verify-question-update', [QuestionController::class, 'verifyQuestionUpdate'])->name('verifyQuestionUpdate');
Route::post('verify-draft-question-update', [QuestionController::class, 'verifyDraftQuestionUpdate'])->name('verifyDraftQuestionUpdate');
// Question subtopic
Route::get('question/subtopic/{id}', 'SubTopicController@index')->name('question.subtopic');

//testlogin
//Route::get('t_reset',function (){
//    return view('LandingPage.reset');
//});

// Questions Type
Route::post('questionTypesave', 'QuestionTypeController@store')->name('questionTypeSave');
Route::post('questionTypeupdate', 'QuestionTypeController@update')->name('questionTypeUpdate');
Route::get('questionTypedelete/{id}', 'QuestionTypeController@delete')->name('questionTypeDelete');

// Quiz
Route::get('game_quiz_create', 'QuizController@game_quiz_create')->name('gameQuizCreate');
Route::get('quiz/list/{topic}', 'QuizController@getQuestionsByTopic')->name('quiz.list');
Route::post('quiz/save', [QuizController::class, 'store'])->name('quiz.save');
Route::post('game_quiz_save', [QuizController::class,'game_quiz_save'])->name('gameQuizSave');
Route::get('quiz/getlist/{topic}', 'QuizController@getlistbytopic')->name('quiz.getList');
Route::get('quiz/delete/{id}', 'QuizController@deleteQuiz')->name('quiz.delete');
Route::get('quiz/{id}/edit', 'QuizController@quizEdit')->name('quiz.edit');
Route::post('quiz/update', 'QuizController@quizUpdate')->name('quiz.update');
Route::get('quiz/{quiz_id}/{question_id}/delete', 'QuizController@quizdelete')->name('quiz.question.delete');
Route::post('quizPublished', 'QuizController@quizPublished')->name('quiz.publish');
Route::post('qiiz-time-update', 'QuizController@quizTimeUpdate')->name('quiz.timeUpdate');

// Quiz with Option by id
Route::get('quiz/quiz/{id}', 'QuizController@quiz')->name('quiz.withOption');
Route::get('quiz/quiz/list/{id}', [QuizController::class,'quizList'])->name('quiz.withOptionList');

// profile
Route::post('profile/update', 'ProfileController@update')->name('profile.update');

// Game
Route::get('perform-message', 'PerformController@index')->name('performMessage');
Route::post('game/gamemode/save', 'PerformController@gamemodestore')->name('game.save');
Route::post('game/gamemode/update', 'PerformController@gamemodeupdate')->name('game.update');
Route::get('game/gamemode/delete/{id}', 'PerformController@gamemodedelete')->name('game.delete');
Route::post('game/perform-message/save', 'PerformController@performmessagesstore')->name('performMessage.save');
Route::post('game/perform-message/edit', 'PerformController@performmessagesupdate')->name('performMessage.edit');
Route::get('game/perform-message/delete/{id}', 'PerformController@performmessagesdelete')->name('performMessage.delete');
//Route::get('search_game_cat/{keyword}', 'SearchController@search_game_cat');

// Team
Route::post('createTeam', [\App\Http\Controllers\TeamController::class,'createTeam'])->name('createTeam');
Route::post('updateTeam', 'TeamController@updateTeam')->name('updateTeam');
Route::get('deleteTeam/{id}', 'TeamController@deleteTeam')->name('deleteTeam');

// Role
Route::post('createRole', [RoleController::class,'createRole'])->name('createRole');
Route::post('roleUpdate', 'RoleController@roleUpdate')->name('roleUpdate');
Route::get('roleDelete/{id}', 'RoleController@roleDelete')->name('roleDelete');
Route::post('createRoleUser', 'RoleController@createRoleUser')->name('createRoleUser');
Route::post('roleuserUpdate', 'RoleController@roleuserUpdate')->name('roleUserUpdate');
Route::get('deleteroleUser/{id}', 'RoleController@deleteroleUser')->name('deleteRoleUser');

// Payment
Route::post('create-institute',[\App\Http\Controllers\PaymentController::class,'store'])->name('createInstitute');
//new User create

Route::get('userCredential/{token}',[UserCredential::class,'userCredential'])->name('userCredential');
Route::get('role-wise-users/{role}',[NewUserController::class,'roleWiseUsers'])->name('roleWiseUsers');
Route::get('role-users/{role}',[NewUserController::class,'roleUsers'])->name('roleUsers');

//Menu Setup
Route::post('saveMenu',[MenuController::class,'store'])->name('saveMenu');
Route::post('menuUpdate','MenuController@updateMenu')->name('menuUpdate');
Route::get('deleteMenu/{id}','MenuController@delete')->name('deleteMenu');
Route::get('selectedMenu/{role_id}',[MenuController::class, 'getselectedMenu'])->name('selectedMenu');
Route::get('selectedUserMenu/{user_id}',[MenuController::class, 'getUserSelectedMenu'])->name('selectedUserMenu');

// Menu Permession
Route::post('savemenuPermission',[MenuPermissionController::class,'store'])->name('saveMenuPermission');

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

Route::get('Mode/{type}/{id}/{user}/share', 'HomeController@shareBtnLink')->name('modeShare');

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

Route::get('Challenge/{challenge}/{user}', [HomeController::class, 'Challenge'])->name('Challenge.challenge');
Route::get('SingleQuestionDisplay/{challenge}/{uid}', [SingleQuestionDisplayQuizController::class, 'Game'])->name('SingleQuestionDisplay');
Route::get('Team/{quiz}/{user}', [HomeController::class, 'Team'])->name('team.quiz');

Route::post('createChallenge', [HomeController::class, 'createChallenge'])->name('createChallenge');
Route::post('update-challenge-option-layout', [HomeController::class, 'updateChallengeOptionLayout'])->name('updateChallengeOptionLayout');
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
Route::get('search_Q_type/{keyword}',[\App\Http\Controllers\SearchController::class,'search_Q_type'])->name('searchQType');
Route::get('search_quiz/{keyword}/{tid}',[\App\Http\Controllers\SearchController::class,'quiz_search'])->name('searchQuiz');
Route::get('search_role/{keyword}',[\App\Http\Controllers\SearchController::class,'search_role'])->name('searchRole');

//challamge setup
Route::post('challange-Published',[HomeController::class,'challenge_publish'])->name('challangePublished');
Route::get('delete_challange/{id}',[HomeController::class,'delete_challange'])->name('deleteChallange');
Route::get('challange_search/{keyword}',[HomeController::class,'challange_search'])->name('challangeSearch');

//login User Cedentials
Route::get('user_cedential/{value}',[\App\Http\Controllers\Auth\LoginController::class,'user_cedential'])->name('userCedential');
Route::post('category-Published',[QuestionController::class,'published_category'])->name('categoryPublished');
Route::post('question-update',[QuestionController::class,'question_update'])->name('questionUpdate');

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

//Exam
Route::get('start-exams/{examination}/{uid}', [\App\Http\Controllers\ExamController::class, 'startExam'])->name('startExams');
Route::post('save-examination', [\App\Http\Controllers\ExamController::class, 'store'])->name('saveExamination');
Route::post('mode-update', [\App\Http\Controllers\ExamController::class, 'timeModeUpdate'])->name('modeUpdate');
Route::post('examPublished', [\App\Http\Controllers\ExamController::class, 'examPublished'])->name('examPublished');
Route::get('show-result/{examination}/{uid}', [\App\Http\Controllers\ExamController::class, 'showUserResult'])->name('showResult');
Route::get('exam-result/{examination}', [\App\Http\Controllers\ExamController::class, 'showExamResult'])->name('examResult');
Route::post('mark-update', [\App\Http\Controllers\ExamController::class, 'markUpdate'])->name('markUpdate');
Route::post('exam-name-update', [\App\Http\Controllers\ExamController::class, 'examNameUpdate'])->name('examNameUpdate');
Route::post('schedule-update', [\App\Http\Controllers\ExamController::class, 'scheduleUpdate'])->name('scheduleUpdate');
Route::get('all-topics-has-question', [\App\Http\Controllers\ExamController::class, 'allTopicsHasQuestion'])->name('allTopicsHasQuestion');

Route::middleware(['hasAccess'])->group(function () {
    //new user
    Route::post('create-new-user',[NewUserController::class,'create'])->name('createNewUser');
    Route::post('update-new-user',[NewUserController::class,'update'])->name('updateNewUser');
    Route::get('send-email/{user}',[NewUserController::class,'sendEmail'])->name('sendEmail');
});
