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

Route::get('/', function () {return view('index');});
//Route::get('/', function () {return view('welcome');});
//Route::get('home', array('as' => 'home', 'uses' => function(){
//    return view('home');
//}));
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', ['as' => 'auth.provider.callback', 'uses' => 'Auth\SocialAuthController@handleProviderCallback']);