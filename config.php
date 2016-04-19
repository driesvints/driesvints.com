<?php

require_once __DIR__.'/vendor/autoload.php';

use Dries\Blog;

return [
    'production' => false,
    'posts' => Blog::yolo()->posts(),
];
