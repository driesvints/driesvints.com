<?php

use Illuminate\Support\Str;

return [
    'serializable_classes' => false,

    // Retain cache keys created before the Laravel 13 upgrade.
    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),
];
