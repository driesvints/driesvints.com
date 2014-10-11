<?php

View::composer('header', function ($view) {
    // The page title.
    $pageTitle = 'Dries Vints';

    if ($view->offsetExists('title') && $view->title != '') {
        $pageTitle = $view->title . ' | ' . $pageTitle;
    }

    $view->pageTitle = $pageTitle;

    // The meta description.
    $metaDescription = $view->offsetExists('metaDescription') ? $view->metaDescription : '';

    if ($view->offsetExists('item') && $view->item instanceof Dries\Content\BaseContentRepository) {
        $metaDescription = strip_tags($view->item->excerpt);
    }

    $view->metaDescription = $metaDescription;
});
