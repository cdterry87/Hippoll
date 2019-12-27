<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// User authenticated routes
Route::group(['middleware' => 'auth'], function () {
    // Application api routes
    Route::prefix('api')->group(function () {
        // Primary Resources
        Route::resource('/polls', 'PollController');
    });

    // Catch-all route
    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});
