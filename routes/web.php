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

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Demo routes
Route::get('/demo', function () {
    return view('poll');
});

Route::get('/demo-stats', function () {
    return view('poll');
});

Route::get('/api/stats/demo/{poll}', 'StatController@index')->name('demoStatRequest');
// End demo routes

// Unauthenticated poll routes
Route::prefix('p')->group(function () {
    Route::get('/{username}', function () {
        return view('poll');
    });

    Route::get('/{username}/{poll}', function () {
        return view('poll');
    });
});

// Unauthenticated poll API routes
Route::prefix('api')->group(function () {
    Route::get('/list', 'UserController@index');
    Route::get('/userresponse/{username}/{poll_id}', 'UserResponseController@index');
    Route::post('/selectresponse', 'UserResponseController@store');
});

// Auth routes
Auth::routes();

//Authenticated home route
Route::get('/home', 'HomeController@index')->name('home');

// User authenticated routes
Route::group(['middleware' => 'auth'], function () {
    // Application api routes
    Route::prefix('api')->group(function () {
        // Primary Resources
        Route::resource('/polls', 'PollController');
        Route::resource('/questions', 'QuestionController');
        Route::resource('/responses', 'ResponseController');

        // Change a poll's status route
        Route::post('/status/{poll}', 'PollController@status');

        // Stats routes
        Route::get('/stats/{poll}', 'StatController@index');

        // User account routes
        Route::get('/user', 'UserController@show');
        Route::post('/account', 'UserController@account');
        Route::post('/password', 'UserController@password');
    });

    // Catch-all route
    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});
