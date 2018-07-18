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

Route::prefix('/nslave')->group(function () {
    Route::resource('/users', 'UserController');
    Route::resource('/comments', 'CommentController');
    Route::resource('/pages', 'PageController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/teams', 'TeamController');
    Route::resource('/tickets', 'TicketController');
    Route::post('/takeownership/{ticket}', 'TicketController@takeOwnership')->name('take.ownership');
    Route::post('/releaseownership/{ticket}', 'TicketController@releaseOwnership')->name('release.ownership');
    Route::get('/importer', 'ImportController@create')->name('importer');
    Route::post('/importer/store', 'ImportController@store')->name('importer.store');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
