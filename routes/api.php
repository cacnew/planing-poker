<?php

use Illuminate\Http\Request;

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

Route::resource('estimates', 'EstimatesController', ['except' =>['create', 'edit']]);
Route::resource('games', 'GamesController', ['except' =>['create', 'edit']]);
Route::resource('rounds', 'RoundsController', ['except' =>['create', 'edit']]);
