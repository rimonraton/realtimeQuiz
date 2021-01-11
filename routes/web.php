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

Route::get('/', function(){
	return view('index');
});

Auth::routes();

Route::get('/home', function(){
	return redirect('/');
});



// Route::get('/home', 'HomeController@home')->name('home');

Route::get('Mode/{type}', 'HomeController@Mode');

Route::get('Mode/{type}/{id}/{user}', 'HomeController@Game');

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
