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

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/events', 'EventController@index')->name('home')->middleware('auth');
Route::get('/events/{id}', 'EventController@show')->name('event_show')->middleware('auth');
Route::put('/events/update', 'EventController@update')->name('update_event')->middleware('auth');