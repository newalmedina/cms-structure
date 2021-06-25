<?php

return [
    'default' => env('RECOGNITION_METHOD', 'aws'), // aws | thesseract
    's3' => [
        'driver' => 's3',
        'key' => env('AWS_ACCESS_KEY_ID', ''),
        'secret' => env('AWS_SECRET_ACCESS_KEY', ''),
        'region' => env('AWS_DEFAULT_REGION', ''),
        'bucket' => env('AWS_BUCKET', ''),
        'url' => env('AWS_URL', ''),
    ]
];
