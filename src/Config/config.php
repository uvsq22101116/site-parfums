<?php

return [
    'app_name' => 'Mon Site Vitrine',
    'base_url' => 'http://localhost/mon-site-vitrine',
    'debug' => true, // active le mode débogage
    'db' => [
        'host' => getenv('DB_HOST'),
        'name' => getenv('DB_NAME'),
        'user' => getenv('DB_USER'),
        'pass' => getenv('DB_PASS'),
    ],
];
