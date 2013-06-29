<?php

/*
|--------------------------------------------------------------------------
| Bindings
|--------------------------------------------------------------------------
*/

Route::model('post', 'Models\\Post');

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::resource('post', 'PostsController', array('except' => array('show')));
});

Route::get('post/{post}', array('as' => 'post.show', 'uses' => 'PostsController@show'));