<?php

Route::get('/', function()
{
	return 'Hello, World!';
});

Route::resource('posts', 'DriesVints\\Controllers\\PostsController');