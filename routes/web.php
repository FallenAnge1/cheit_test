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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'UserLogController@create')->name('logs.form.create');
Route::get('/update/{id}', 'UserLogController@updateForm')->name('logs.form.update');
Route::get('/info/{id}', 'UserLogController@get')->name('logs.show');
