<?php

Route::group(['namespace' => 'Dries\\Http\\Controllers'], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::get('blog', ['as' => 'blog', 'uses' => 'PostsController@blog']);
    Route::get('blog/{slug}', ['as' => 'post', 'uses' => 'PostsController@show']);

    Route::get('tag', 'TagsController@index');
    Route::get('tag/{slug}', ['as' => 'tag', 'uses' => 'TagsController@show']);

    Route::get('{slug}', ['as' => 'page', 'uses' => 'PagesController@show']);
});
