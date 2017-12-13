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

Route::get('/', 'ProductController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => '/manage'], function() {
    Route::get('/', 'ManageController@index')->name('manage');

    Route::get('/store', 'ManageController@addLayout')->name('pro-add');

    Route::post('/add', 'ManageController@store')->name('new-pro');

    Route::get('/list', 'ManageController@getList')->name('pro-list');

    Route::delete('/destroy', 'ManageController@destroy')->name('del-pro');
});

Route::group(['prefix' => 'pro'], function() {

    Route::get('/cat/{cat_slug}', 'ProductController@getProByCat')->name('cat');

    Route::get('/', 'ProductController@getAllProduct')->name('all');

    Route::get('/detail/{id}', 'ProductController@detail')->name('detail');
});
