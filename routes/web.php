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


Route::get('/', 'ItemsController@index');

// ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'items/{id}'], function() {
       Route::get('show', 'ItemsController@show')->name('items.show');
       Route::get('index', 'MessagesController@index')->name('message.index');
       Route::post('store', 'MessagesController@store')->name('message.store');
       Route::post('finish', 'ItemsController@finish')->name('items.finish');
    });
    Route::get('mypage','ItemsController@mypage')->name('items.mypage');
    Route::get('search','ItemsController@search')->name('items.search');
    Route::resource('users', 'UsersController');
    Route::resource('items', 'ItemsController');
    Route::resource('messages', 'MessagesController');
});