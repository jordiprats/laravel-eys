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

Route::prefix('/settings')->group(function () {
  Route::get('/profile', 'UserController@edit')->name('user.edit');
  Route::post('/profile', 'UserController@edit')->name('user.edit');
  Route::put('/profile.update', 'UserController@update')->name('user.update');
  Route::post('/profile.update', 'UserController@update')->name('user.update');
  Route::prefix('/controllers')->group(function () {
    Route::resource('/comments', 'CommentController');
    Route::resource('/pages', 'PageController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/teams', 'TeamController');
    Route::resource('/tickets', 'TicketController');
  });
});

Route::get('/home', 'HomeController@index')->name('home');
