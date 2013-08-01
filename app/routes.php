<?php

/*
|--------------------------------------------------------------------------
| Bindings
|--------------------------------------------------------------------------
*/

Route::model('posts', 'Models\\Post');
Route::model('pages', 'Models\\Page');
Route::bind('post_slug', function($value)
{
	$post = get_posts()->published()->filterBy('slug', $value)->first();

	if ($post) return $post;

	App::abort(404);
});
Route::bind('page_slug', function($value)
{
	$page = get_pages()->published()->filterBy('slug', $value)->first();

	if ($page) return $page;

	App::abort(404);
});

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('blog', function()
{
	return Redirect::home();
});
Route::get('blog/{post_slug}', array('as' => 'posts.show', 'uses' => 'PostsController@show'));

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'dashboard', 'uses' => 'AdminController@dashboard'));

	Route::resource('posts', 'PostsController', array('except' => array('show')));
	Route::resource('pages', 'PagesController', array('except' => array('show')));
});

Route::get('{page_slug}', array('as' => 'pages.show', 'uses' => 'PagesController@show'));