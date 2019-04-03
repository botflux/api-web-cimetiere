<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
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
            'db' => getenv('WEB_CIMETIERE_BASE'),
            'host' => getenv('WEB_CIMETIERE_SERVER'),
            'username' => getenv('WEB_CIMETIERE_USERNAME'),
            'password' => getenv('WEB_CIMETIERE_PASSWORD'),
            'args' => [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        ],
    ],
];
