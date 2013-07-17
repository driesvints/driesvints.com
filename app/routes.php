<?php

/*
|--------------------------------------------------------------------------
| Bindings
|--------------------------------------------------------------------------
*/

Route::model('posts', 'Models\\Post');
Route::bind('blog', function($value)
{
	$posts = get_posts();

	if ($post = $posts->findBySlug($value)) return $post;

	App::abort(404);
});
Route::bind('pages', function($value)
{
	$pages = get_pages();

	if ($page = $pages->findBySlug($value)) return $page;

	App::abort(404);
});

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'Controllers\\HomeController@index'));

Route::get('blog', array('as' => 'blog.index', 'uses' => 'Controllers\\BlogController@index'));
Route::get('blog/{blog}', array('as' => 'blog.show', 'uses' => 'Controllers\\BlogController@show'));

Route::get('login', array('as' => 'login', 'uses' => 'Controllers\\AuthController@getLogin'));
Route::post('login', 'Controllers\\AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'Controllers\\AuthController@logout'));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\\Admin\\AdminController@index'));

	Route::resource('posts', 'Controllers\\Admin\\PostsController', array('except' => array('show')));
	Route::resource('pages', 'Controllers\\Admin\\PagesController', array('except' => array('show')));
});

Route::get('{pages}', array('as' => 'pages.show', 'uses' => 'Controllers\\PagesController@show'));