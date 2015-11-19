<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/', 'SteamController@login');


Route::get('/', ['as'=>'home','uses'=>'MainController@getHome']);

Route::group(['as'=>'guest::','middleware'=>'guest'],function(){
    Route::get('/login', ['as'=>'login','uses'=>'SteamController@login']);

});

Route::group(['as'=>'auth::','middleware'=>'auth'],function(){
//    Route::get('/', ['as'=>'home','uses'=>'MainController@getHome']);
    Route::get('/logout', ['as'=>'logout','uses'=>'MainController@getLogout']);
});