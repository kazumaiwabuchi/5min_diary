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

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//トップページ
Route::get('/', "DiariesController@index");

//認証付きルーティング
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);//MyPageのルーティング
    Route::delete('diaries/{id}', 'DiariesController@destroy')->name('diaries.destroy');//投稿削除のルーティング、ログイン時のみ可能な操作にしたいので認証付きルーティングに入れる
});
Route::resource('diaries',"DiariesController",["only" => ["show","create","store"]]);
