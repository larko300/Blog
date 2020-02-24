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

Route::get('/comments', 'CommentsController@index');

Route::post('/comments', 'CommentsController@store');

Route::delete('/comments/{comment}', 'CommentsController@destroy');

Route::patch('/comments/{comment}', 'CommentsController@update');

Route::get('/comments/admin', 'CommentsController@admin');

Auth::routes();

Route::get('/user/{user}/profile', 'UserProfileController@index');

Route::patch('/user/{user}/profile', 'UserProfileController@update');

Route::patch('/user/{user}/profile/password', 'UserProfileController@updatePassword');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

