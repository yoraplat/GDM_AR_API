<?php

use Illuminate\Http\Request;
Use App\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('events', 'ApiController@index');
Route::get('events/{id}', 'ApiController@show');

// Route::post('events', 'ApiController@store');
// Route::put('events/{id}', 'ApiController@update');
// Route::delete('Api/{id}', 'ApiController@delete');