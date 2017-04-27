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

Route::get('/', [
    'uses' => 'auth\UserController@getDashboard',
    'as' => 'login'
]);
Route::group(['middleware' => ['web']], function ()
{

    Route::post('/signin', [
        'uses' => 'auth\UserController@postSignIn',
        'as' => 'signin'
    ]);

    Route::get('/dashboard', [
        'uses' => 'auth\UserController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::get('/logout', [
        'uses' => 'auth\UserController@logout',
        'as' => 'logout',
        'middleware' => 'auth'
    ]);

    Route::get('/profile', [
        'uses' => 'auth\UserController@getProfile',
        'as' => 'profile',
        'middleware' => 'auth'
    ]);

    Route::post('/saveprofile', [
        'uses' => 'auth\UserController@saveProfile',
        'as' => 'saveprofile',
        'middleware' => 'auth'
    ]);
});