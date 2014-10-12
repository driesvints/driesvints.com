<?php

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
