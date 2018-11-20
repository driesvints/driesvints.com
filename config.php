<?php

return [
    'baseUrl' => '',
    'production' => false,
    'collections' => [
        'posts' => [
            'path' => 'blog/{filename}',
            'author' => 'Dries Vints',
            'sort' => '-date',
        ],
    ],
];
