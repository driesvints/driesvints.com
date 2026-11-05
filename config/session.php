<?php

use Illuminate\Support\Str;

return [
    // Preserve existing cookies and sessions across the framework upgrade.
    'cookie' => env('SESSION_COOKIE', Str::slug(env('APP_NAME', 'laravel'), '_').'_session'),
    'serialization' => 'php',
];
