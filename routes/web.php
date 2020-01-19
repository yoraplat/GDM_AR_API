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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/events', 'EventController@index')->name('home')->middleware('auth');
Route::get('/events/{id}', 'EventController@show')->name('event_show')->middleware('auth');
Route::put('/events/update', 'EventController@update')->name('update_event')->middleware('auth');
Route::put('/events/destroy', 'EventController@destroy')->name('event_delete')->middleware('auth');

Route::get('/new-image', 'ImageUploadController@imageUpload')->name('image.upload')->middleware('auth');
Route::delete('/delete-image', 'ImageUploadController@deleteImage')->name('delete.image')->middleware('auth');
Route::post('/image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post')->middleware('auth');
