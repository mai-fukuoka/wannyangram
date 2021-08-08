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

/*トップページルーター*/
Route::get('/', 'PostsController@index');

/*ログインルーター*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

/*ユーザー登録ルーター*/
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

/*ユーザー詳細*/
Route::group(['middleware'=>['auth']], function () {
    Route::resource('users', 'UsersController', ['only'=>['show','edit','update']]);
    Route::post('upload', 'UsersController@upload')->name('upload');
    Route::get('disp', 'UsersController@disp')->name('disp');
    
    /*投稿新規画面*/
    Route::get('posts/new', 'PostsController@new')->name('new');
    Route::post('/posts', 'PostsController@store')->name('posts');
    Route::get('posts/{id}', 'PostsController@destroy');
    
    /*お気に入り登録*/
    Route::group(['prefix'=>'posts/{id}'], function () {
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('unlike', 'LikesController@destroy')->name('likes.unlike');
    });
});
