<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Read env variables before including settings
$dotenv = new Symfony\Component\Dotenv\Dotenv();

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv->load(__DIR__ . '/../.env');
}

if (file_exists(__DIR__ . '/../.env.prod')) {
    $dotenv->overload(__DIR__ . '/../.env.prod');
}

if (file_exists(__DIR__ . '/../.env.dev')) {
    $dotenv->overload(__DIR__ . '/../.env.dev');
}
// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

$app->getContainer()->get('db');

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
