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

        'backups' => [
            'driver' => 's3',
            'key' => env('BACKUP_AWS_ACCESS_KEY_ID'),
            'secret' => env('BACKUP_AWS_SECRET_ACCESS_KEY'),
            'region' => env('BACKUP_AWS_DEFAULT_REGION', 'eu-central-1'),
            'bucket' => env('BACKUP_AWS_BUCKET', 'backups.driesvints.com'),
            'root' => 'laravel-cloud',
            'visibility' => 'private',
            'throw' => true,
        ],
    ],
];
