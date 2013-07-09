<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Content Posts Sources
	|--------------------------------------------------------------------------
	|
	| A list of all the content posts sources which can be either an Eloquent
	| Model or a directory with static Markdown files.
	|
	*/

	'posts' => array(

		'Models\\Post',
		base_path(). '/posts',

	),

	/*
	|--------------------------------------------------------------------------
	| Content Pages Sources
	|--------------------------------------------------------------------------
	|
	| A list of all the content pages sources which can be either an Eloquent
	| Model or a directory with static Markdown files.
	|
	*/

	'pages' => array(

		'Models\\Page',
		base_path(). '/pages',

	),

);