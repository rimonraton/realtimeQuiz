<?php

use Illuminate\Support\Facades\Route;
use Victorybiz\GeoIPLocation\GeoIPLocation;

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

Route::get('/', function () {
	return view('index');
});
Route::get('landing/page','LandingPageController@index');
Route::get('dashboard', 'AdminController@index');
// Question Category
Route::get('question/category', 'QuestionController@index');
Route::post('question/savecategory', 'QuestionController@store');
Route::post('question/updatecategory', 'QuestionController@update');
Route::get('question/updatecategory/{id}', 'QuestionController@delete');
// Questions
Route::get('question/list', 'QuestionController@list');
Route::get('question/create', 'QuestionController@create');
Route::post('question/save', 'QuestionController@storeQuestion');
Route::get('question/getlist/{id}', 'QuestionController@getlist');
Route::get('question/edit/{id}', 'QuestionController@editQuestion');
Route::post('question/update', 'QuestionController@updateQuestion');
Route::get('question/delete/{id}', 'QuestionController@deleteQuestion');
Route::get('question/list/view/{cid}', 'QuestionController@getQuestiontoday');

// Quiz Category
Route::get('quiz/categorylist', 'QuizController@categorylist');
Route::post('quiz/savecategory', 'QuizController@storeCategory');
Route::post('quiz/updatecategory', 'QuizController@updateCategory');
Route::get('quiz/deletecategory/{id}', 'QuizController@deleteCategory');

// Quiz
Route::get('quiz/list', 'QuizController@list');
Route::get('quiz/create', 'QuizController@create');
Route::get('quiz/list/{topic}/{category?}', 'QuizController@getQuestionsByTopic');
Route::post('quiz/save', 'QuizController@store');
Route::get('quiz/getlist/{topic}', 'QuizController@getlistbytopic');

// Quiz with Option by id
Route::get('quiz/quiz/{id}', 'QuizController@quiz');
Route::get('quiz/quiz/list/{id}', 'QuizController@quizList');

// profile
Route::get('profile', 'ProfileController@index');
Route::post('profile/update', 'ProfileController@update');


Auth::routes();

Route::get('/home', function () {
	return redirect('/');
});



// Route::get('/home', 'HomeController@home')->name('home');

Route::get('Mode/{type}', 'HomeController@Mode');

Route::get('Mode/{type}/{quiz}/{user}', 'HomeController@Game');

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
