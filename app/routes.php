<?php

Route::get('/', array('as' => 'home', function()
{
	return 'Hello, World!';
}));

Route::resource('posts', 'DriesVints\\Controllers\\PostsController');