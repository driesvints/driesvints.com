<?php

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
*/

View::composer('header', function($view)
{
    // The page title.
	$pageTitle = 'Dries Vints';

	if ($view->offsetExists('title') && $view->title != '')
	{
		$pageTitle = $view->title . ' | ' . $pageTitle;
	}

	$view->pageTitle = $pageTitle;

    // The meta description.
    $metaDescription = '';

    if ($view->offsetExists('item') && $view->item instanceof Content\BaseContentRepository)
    {
        $metaDescription = strip_tags($view->item->excerpt);
    }

    $view->metaDescription = $metaDescription;
});