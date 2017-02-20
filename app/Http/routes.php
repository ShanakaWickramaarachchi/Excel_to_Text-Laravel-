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

// Route::get('/', 'PagesController@home');
  

Route::get('/about', function () {
    return view('about');
});

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/contact', function () {
    return view('contact');
});


Route::get('/reader', function () {
    return view('reader');
});

Route::get('/xx', function () {
    return view('xx');
});


Route::post('/upload', function () {
    return view('upload');
});
Route::resource('posts','PostController');

Route::get('/','PagesController@home');

//
////auth routes
//Route::get('auth/login','Auth\AuthController@getLogin' );
//
//Route::post('auth/login','Auth\AuthController@postLogin' );
//
//Route::get('auth/logout','Auth\AuthController@getLogout' );
//
////Registration Routes
//
//Route::get('auth/register','Auth\AuthController@getRegister' );
//
//Route::post('auth/register','Auth\AuthController@postRegister' );
//
//
//
//
//Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
//Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
//Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);



//Resgistration routes
//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
//Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);﻿
Route::auth();

Route::get('/home', 'HomeController@index');

