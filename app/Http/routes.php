<?php

get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
get('home', 'HomeController@index');

get('blog', ['as' => 'blog', 'uses' => 'PostsController@blog']);
get('blog/{slug}', ['as' => 'post', 'uses' => 'PostsController@show']);

get('tag', 'TagsController@index');
get('tag/{slug}', ['as' => 'tag', 'uses' => 'TagsController@show']);

get('{slug}', ['as' => 'page', 'uses' => 'PagesController@show']);
