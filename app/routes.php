<?php

use Models\Page;
use Content\ContentManager;

/*
|--------------------------------------------------------------------------
| Bindings
|--------------------------------------------------------------------------
*/

Route::model('posts', 'Models\\Post');
Route::bind('blog', function($value)
{
	$manager = new ContentManager(get_posts());

	if ($post = $manager->findBySlug($value)) return $post;

	App::abort(404);
});
Route::bind('pages', function($value)
{
	$page = Page::where('slug', $value)->first();

	if ( ! is_null($page)) return $page;

	App::abort(404);
});

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('blog', array('as' => 'blog.index', 'uses' => 'BlogController@index'));
Route::get('blog/{blog}', array('as' => 'blog.show', 'uses' => 'BlogController@show'));

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
	Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@index'));

	Route::resource('posts', 'PostsController', array('except' => array('show')));
	Route::resource('pages', 'PagesController', array('except' => array('show')));
});

Route::get('{pages}', array('as' => 'pages.show', 'uses' => 'PagesController@show'));