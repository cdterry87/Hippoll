<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('/p/{username}/{poll}', function () {
    return view('poll');
});
Route::prefix('api')->group(function () {
    Route::get('/takepoll/{username}/{poll_id}', 'TakePollController@index');
    Route::POST('/selectresponse', 'TakePollController@store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User authenticated routes
Route::group(['middleware' => 'auth'], function () {
    // Application api routes
    Route::prefix('api')->group(function () {
        // Primary Resources
        Route::resource('/polls', 'PollController');
        Route::resource('/questions', 'QuestionController');
        Route::resource('/responses', 'ResponseController');

        // Extra routes
        Route::post('/status/{poll}', 'PollController@changeStatus');

        // User account routes
        Route::get('/user', 'UserController@index');
        Route::post('/account', 'UserController@account');
        Route::post('/password', 'UserController@password');
    });

    // Catch-all route
    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});
