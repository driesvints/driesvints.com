<?php

return [
    'disks' => [
        // Laravel 12 changed the fallback root to storage/app/private.
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
            'report' => false,
        ],
    ],
];
