<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::resource('posts', 'PostsController');