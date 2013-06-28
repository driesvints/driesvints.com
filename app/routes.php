<?php

Route::get('/', array('as' => 'home', 'uses' => 'DriesVints\\Controllers\\HomeController@index'));
Route::resource('posts', 'DriesVints\\Controllers\\PostsController');