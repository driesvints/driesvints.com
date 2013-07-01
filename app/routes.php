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

Route::get('login', array('as' => 'login', function()
{
	return View::make('login');
}));
Route::post('login', function()
{
	$credentials = array(
		'email'    => Input::get('email'),
		'password' => Input::get('password'),
	);

	if (Auth::attempt($credentials))
	{
		return Redirect::route('admin');
	}

	return Redirect::back()->withInput()->withErrors;
});
Route::get('logout', array('as' => 'logout', function()
{
	Auth::logout();

	return Redirect::route('home');
}));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'admin', function()
	{
		return 'Welcome to the admin dashboard.';
	}));

	Route::resource('post', 'PostsController', array('except' => array('show')));
});

Route::resource('blog', 'BlogController', array('only' => array('index', 'show')));