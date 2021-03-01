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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FEController@index');

Route::get('/article/{article}', 'FEController@show');

Route::get('/copy-code', 'CopyPostController@display');

Route::post('/makecomment', 'FEController@makecomment');

// Auth::routes();

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/responses', 'HomeController@responses')->name('responses');

Route::get('/accounts', 'AccountController@index')->name('accounts');

Route::post('/register-admin', 'AccountController@store')->name('register-admin');

Route::post('/delete-admin', 'AccountController@delete')->name('delete-admin');

Route::post('/upload-post', 'SprController@store')->name('upload-post');

Route::get('/post/delete/{post}', 'SprController@destroy');

Route::get('/articles', 'ArticleController@index')->name('articles');

Route::get('/articles/new-article', 'ArticleController@new_article');

Route::post('/post-article', 'ArticleController@store')->name('post-article');

Route::get('/article/edit/{article}', 'ArticleController@edit');

Route::get('/article/delete/{article}', 'ArticleController@destroy');

Route::get('/article/uprank/{article}', 'ArticleController@uprank');

Route::get('/article/downrank/{article}', 'ArticleController@downrank');

Route::post('/article/update/{article}', 'ArticleController@update')->name('update-article');

Route::get('/create-booking', 'BetCodeController@create');

Route::get('/delete-booking/{betcode}', 'BetCodeController@delete');

Route::post('/create-code', 'BetCodeController@store')->name('create-code');

Route::post('/create-tdbook', 'TdbkController@store')->name('create-tdbook');

Route::get('/delete-tdbook/{tdbk}', 'TdbkController@destroy')->name('delete-todaybook');

Route::get('/post/{post}', 'TdbkController@viewpost');

Route::get('/post/delete/{post}', 'TdbkController@delcomment');

Route::get('/post/delete/post/{post}', 'TdbkController@delpost');

Route::get('/post/decrease/{post}', 'TdbkController@decreasepost');

Route::get('/post/increase/{post}', 'TdbkController@increasepost');

Route::post('/create-booking-copy', 'CopyPostController@store')->name('create-booking-copy');




