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
	$posts = get_posts();

	if ($post = $posts->filterBy('slug', $value)->first()) return $post;

	App::abort(404);
});
Route::bind('page_slug', function($value)
{
	$pages = get_pages();

	if ($page = $pages->filterBy('slug', $value)->first()) return $page;

	App::abort(404);
});

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'Controllers\\HomeController@index'));

Route::get('blog', array('as' => 'blog.index', 'uses' => 'Controllers\\BlogController@index'));
Route::get('blog/{post_slug}', array('as' => 'blog.show', 'uses' => 'Controllers\\BlogController@show'));

Route::get('login', array('as' => 'login', 'uses' => 'Controllers\\AuthController@getLogin'));
Route::post('login', 'Controllers\\AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'Controllers\\AuthController@logout'));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\\Admin\\AdminController@index'));

	Route::resource('posts', 'Controllers\\Admin\\PostsController', array('except' => array('show')));
	Route::resource('pages', 'Controllers\\Admin\\PagesController', array('except' => array('show')));
});

Route::get('{page_slug}', array('as' => 'pages.show', 'uses' => 'Controllers\\PagesController@show'));