<?php

return [
    'production' => false,
    'excerpt' => function ($page, $characters = 100) {
        return substr(strip_tags($page->getContent()), 0, $characters);
    },
];
