<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
use Tuupola\Middleware\CorsMiddleware;

$app->add(new CorsMiddleware());