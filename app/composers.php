<?php

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
*/

View::composer('header', function($view)
{
	$pageTitle = 'Dries Vints';

	if ($view->offsetExists('title') && $view->title != '')
	{
		$pageTitle = $view->title . ' | ' . $pageTitle;
	}

	$view->pageTitle = $pageTitle;
});