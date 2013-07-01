<?php

/*
|--------------------------------------------------------------------------
| Bindings
|--------------------------------------------------------------------------
*/

Route::model('posts', 'Models\\Post');
Route::model('blog', 'Models\\Post');

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::resource('blog', 'BlogController', array('only' => array('index', 'show')));

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@index'));

	Route::resource('posts', 'PostsController', array('except' => array('show')));
});