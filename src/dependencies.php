<?php
// DIC configuration

use \App\DAO\CityDAO;
use \App\Helper\Entity\CityHelper;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['cache_path']
    ]);

    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new \PDO("mysql:dbname={$settings['db']};host={$settings['host']}", $settings['username'], $settings['password'], $settings['args']);
    
    return $pdo;
};

$container['city-dao'] = function ($c) {
    $pdo = $c->get('pdo');
    $dao = new CityDAO($pdo);

    return $dao;
};

