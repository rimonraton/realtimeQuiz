<?php

use App\Http\Controllers\Game\ChallengeController;
use App\Http\Controllers\Game\ModeController;
use App\Http\Controllers\Game\PracticeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserCredential;
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
Route::get('features', [\App\Http\Controllers\SetupController::class,'features']);
Route::post('features/save', 'SetupController@featureStore');
Route::post('features/update', 'SetupController@featureUpdate');
Route::get('features/delete/{id}', 'SetupController@featureDelete');
Route::get('faq', 'SetupController@faq');
// dashboard
Route::get('dashboard', [\App\Http\Controllers\AdminController::class,'index']);
// Question Category
Route::get('question/category', [QuestionController::class,'index']);
Route::post('question/savecategory', 'QuestionController@store');
Route::post('question/updatecategory', [QuestionController::class,'update']);
Route::get('question/deletecategory/{id}', 'QuestionController@delete');
Route::get('search_category/{keyword}',[\App\Http\Controllers\SearchController::class,'search']);

// Questions
Route::get('question/list/{id?}', [QuestionController::class, 'list']);
Route::get('question/create', 'QuestionController@create');
Route::post('question/save', 'QuestionController@storeQuestion');
Route::get('question/getlist/{id}', 'QuestionController@getlist');
Route::get('question/edit/{id}', 'QuestionController@editQuestion');
Route::post('question/update', 'QuestionController@updateQuestion');
Route::get('question/delete/{id}', 'QuestionController@deleteQuestion');
Route::get('question/list/view/{cid}', 'QuestionController@getQuestiontoday');
Route::get('deleteoption/{id}','QuestionController@deleteOption');
Route::get('question_excel',[\App\Http\Controllers\ExcelController::class,'index']);
Route::post('question_store_by_excel',[\App\Http\Controllers\ExcelController::class,'store']);
// Question subtopic
Route::get('question/subtopic/{id}', 'SubTopicController@index');

//testlogin
//Route::get('t_reset',function (){
//    return view('LandingPage.reset');
//});

// Questions Type
Route::get('questionTypelist', [\App\Http\Controllers\QuestionTypeController::class,'index']);
Route::post('questionTypesave', 'QuestionTypeController@store');
Route::post('questionTypeupdate', 'QuestionTypeController@update');
Route::get('questionTypedelete/{id}', 'QuestionTypeController@delete');

// Quiz
Route::get('quiz/view/list/{tid?}', 'QuizController@list');
Route::get('quiz/create', 'QuizController@create');
Route::get('quiz/list/{topic}', 'QuizController@getQuestionsByTopic');
Route::post('quiz/save', 'QuizController@store');
Route::get('quiz/getlist/{topic}', 'QuizController@getlistbytopic');
Route::get('quiz/delete/{id}', 'QuizController@deleteQuiz');
Route::get('quiz/{id}/edit', 'QuizController@quizEdit');
Route::post('quiz/update', 'QuizController@quizUpdate');
Route::get('quiz/{quiz_id}/{question_id}/delete', 'QuizController@quizdelete');
Route::post('quizPublished', 'QuizController@quizPublished');

// Quiz with Option by id
Route::get('quiz/quiz/{id}', 'QuizController@quiz');
Route::get('quiz/quiz/list/{id}', [\App\Http\Controllers\QuizController::class,'quizList']);

// profile
Route::get('profile', [\App\Http\Controllers\ProfileController::class,'index']);
Route::post('profile/update', 'ProfileController@update');

// Game
Route::get('perform-message', 'PerformController@index');
Route::get('game/setup', [\App\Http\Controllers\PerformController::class,'gamesetup']);
Route::post('game/gamemode/save', 'PerformController@gamemodestore');
Route::post('game/gamemode/update', 'PerformController@gamemodeupdate');
Route::get('game/gamemode/delete/{id}', 'PerformController@gamemodedelete');
Route::get('game/perform-message', [\App\Http\Controllers\PerformController::class,'performmessagesetup']);
Route::post('game/perform-message/save', 'PerformController@performmessagesstore');
Route::post('game/perform-message/edit', 'PerformController@performmessagesupdate');
Route::get('game/perform-message/delete/{id}', 'PerformController@performmessagesdelete');

// Team
Route::get('teamlist', [\App\Http\Controllers\TeamController::class,'index']);
Route::post('createTeam', [\App\Http\Controllers\TeamController::class,'createTeam']);
Route::post('updateTeam', 'TeamController@updateTeam');
Route::get('deleteTeam/{id}', 'TeamController@deleteTeam');

// Role
Route::get('rolelist', [\App\Http\Controllers\RoleController::class,'index']);
Route::post('createRole', [\App\Http\Controllers\RoleController::class,'createRole']);
Route::post('roleUpdate', 'RoleController@roleUpdate');
Route::get('roleDelete/{id}', 'RoleController@roleDelete');
Route::get('assignRoleList', [\App\Http\Controllers\RoleController::class,'assignRoleList']);
Route::post('createRoleUser', 'RoleController@createRoleUser');
Route::post('roleuserUpdate', 'RoleController@roleuserUpdate');
Route::get('deleteroleUser/{id}', 'RoleController@deleteroleUser');

// Payment
Route::get('payment', [\App\Http\Controllers\PaymentController::class,'index']);
Route::post('create-institute',[\App\Http\Controllers\PaymentController::class,'store']);
//new User create
Route::get('new-user',[NewUserController::class,'index'])->middleware(\App\Http\Middleware\HasAccess::class);
Route::post('create-new-user',[NewUserController::class,'create']);
Route::post('update-new-user',[NewUserController::class,'update']);
Route::get('send-email/{user}',[NewUserController::class,'sendEmail']);
Route::get('userCredential/{token}',[UserCredential::class,'userCredential']);

//Menu Setup
Route::get('menu',[\App\Http\Controllers\MenuController::class,'index']);
Route::post('saveMenu','MenuController@store');
Route::post('menuUpdate','MenuController@updateMenu');
Route::get('deleteMenu/{id}','MenuController@delete');
Route::get('selectedMenu/{role_id}','MenuController@getselectedMenu');

// Menu Permession
Route::get('menuPermission','MenuPermissionController@index');
Route::post('savemenuPermission','MenuPermissionController@store');

Auth::routes();

Route::get('/home', function () {
	return redirect('/');
});



// Route::get('/home', 'HomeController@home')->name('home');

Route::get('Mode/{type}/', [ModeController::class, 'Mode']);
//Route::get('Mode/Practice', [PracticeController::class, 'Practice'])->name('practice');
//Route::get('Mode/Challenge', [ChallengeController::class, 'Challenge'])->name('challenge');

Route::get('getCategory/{type}/{category}', [ModeController::class,'getCategory']);

Route::get('Mode/{type}/{quiz}/{user}', [HomeController::class, 'Game']);
Route::get('Mode{type}/{quiz}', [\App\Http\Controllers\PracticeController::class, 'Game']);

Route::get('Mode/{type}/{id}/{user}/share', 'HomeController@shareBtnLink');

// Route::get('game/{id}/{user}', 'HomeController@game');

Route::get('singleGame/{id}/{user}', 'HomeController@singleGame');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('setLanguage/{locale}', function ($locale) {
	App::setLocale($locale);
	session(['locale' => $locale]);
	return redirect()->back();
});

Route::post('contact', [\App\Http\Controllers\ContractController::class ,'sendMessage']);

Route::get('getProgress/{id}', [HomeController::class, 'getProgress']);
Route::get('/lang-{lang}.js', 'LanguageController@show');

Route::get('game/mode/{type}/{id?}', [HomeController::class, 'gameInAdmin']);
Route::get('Challenge/{challenge}/{user}', [HomeController::class, 'Challenge']);

Route::post('createChallenge', [HomeController::class, 'createChallenge']);
Route::get('challengeShareResult/{link}', [\App\Http\Controllers\ShareController::class, 'challengeShareResult']);
Route::get('challengeShareResult/{link}/details', [\App\Http\Controllers\ShareController::class, 'challengeShareResultDetails']);
Route::get('challengeShare/{link}', [\App\Http\Controllers\ShareController::class, 'challengeShare']);
//Route::get('product',function (){
//
//    \Excel::import(new \App\Imports\QuestionImport(), public_path('prods.xlsx'));
//});

Route::post('saveFile',[\App\Http\Controllers\FileController::class,'store']);
Route::get('deleteFile/{path}',[\App\Http\Controllers\FileController::class,'deleteFile']);


//export

Route::get('export_questions',[\App\Http\Controllers\ExcelController::class,'export']);
Route::get('newreset',function (){
return view('auth.passwords.newreset');
});

//Search
Route::get('search_Q_type/{keyword}',[\App\Http\Controllers\SearchController::class,'search_Q_type']);
Route::get('search_quiz/{keyword}/{tid}',[\App\Http\Controllers\SearchController::class,'quiz_search']);
Route::get('search_role/{keyword}',[\App\Http\Controllers\SearchController::class,'search_role']);

//challamge setup
Route::get('challenge_setup',[HomeController::class,'challenge_setup']);
Route::post('challange-Published',[HomeController::class,'challenge_publish']);
Route::get('delete_challange/{id}',[HomeController::class,'delete_challange']);
Route::get('challange_search/{keyword}',[HomeController::class,'challange_search']);

//login User Cedentials
Route::get('user_cedential/{value}',[\App\Http\Controllers\Auth\LoginController::class,'user_cedential']);
Route::post('category-Published',[QuestionController::class,'published_category']);
Route::post('question-update',[QuestionController::class,'question_update']);
