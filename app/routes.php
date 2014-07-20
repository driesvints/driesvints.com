<?php

/*
|--------------------------------------------------------------------------
| Bindings
|--------------------------------------------------------------------------
*/

Route::model('users', 'Models\\User');
Route::model('posts', 'Models\\Post');
Route::model('pages', 'Models\\Page');
Route::bind('post_slug', function ($value) {
    $post = get_posts()->published()->filterBy('slug', $value)->first();

    if ($post) {
        return $post;
    }

    App::abort(404);
});
Route::bind('page_slug', function ($value) {
    $page = get_pages()->published()->filterBy('slug', $value)->first();

    if ($page) {
        return $page;
    }

    App::abort(404);
});

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('blog', ['as' => 'archive', 'uses' => 'PostsController@archive']);
Route::get('blog/{post_slug}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);

Route::get('tag', function () {
    return Redirect::home();
});
Route::get('tag/{tag}', ['as' => 'tags.show', 'uses' => 'TagsController@show']);

Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
Route::post('login', 'AuthController@postLogin');
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

Route::group(['before' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);

    Route::resource('users', 'UsersController', ['only' => ['edit', 'update']]);
    Route::resource('posts', 'PostsController', ['except' => ['show']]);
    Route::resource('pages', 'PagesController', ['except' => ['show']]);
});

Route::get('{page_slug}', ['as' => 'pages.show', 'uses' => 'PagesController@show']);