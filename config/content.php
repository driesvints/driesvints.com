<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Content Posts Sources
    |--------------------------------------------------------------------------
    |
    | A list of all the content posts sources which can be either an Eloquent
    | Model or a directory with static Markdown files.
    |
    */

    'posts' => [
        base_path('resources/content/posts'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Pages Sources
    |--------------------------------------------------------------------------
    |
    | A list of all the content pages sources which can be either an Eloquent
    | Model or a directory with static Markdown files.
    |
    */

    'pages' => [
        base_path('resources/content/pages'),
    ],

];
