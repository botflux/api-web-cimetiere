<?php
return [
    'settings' => [
        'displayErrorDetails' => getenv('ENV') === 'DEV', // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'cache_path' => false
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'db' => [
            'db' => getenv('DB_NAME'),
            'host' => getenv('DB_HOST'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'args' => (getenv('ENV') === 'DEV') ? [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ] : []
        ],
    ],
];
