<?php

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
|
| Application helper methods.
|
*/

if (! function_exists('get_content')) {
    /**
     * Gets content from a content type.
     *
     * @param  string $type
     * @return \Content\Collection
     */
    function get_content($type)
    {
        return app('content_loader')->config($type);
    }
}

if (! function_exists('get_posts')) {
    /**
     * Retrieve all of the posts in the application.
     *
     * @return \Content\Collection
     */
    function get_posts()
    {
        return get_content('posts');
    }
}

if (! function_exists('get_pages')) {
    /**
     * Retrieve all of the pages in the application.
     *
     * @return \Content\Collection
     */
    function get_pages()
    {
        return get_content('pages');
    }
}

if (! function_exists('is_home')) {
    /**
     * Determines is the current route is the home route.
     *
     * @return bool
     */
    function is_home()
    {
        return Route::currentRouteName() === 'home';
    }
}
