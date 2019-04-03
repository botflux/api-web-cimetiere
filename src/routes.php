<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/cities', function (Request $request, Response $response, array $args) {
    $cities = $this->get('city-dao')->findAll();
    $citiesArray = $this->get('city-helper')->convertCollectionToAPI($cities);

    return $response->withJson($citiesArray);
});

/* 
$app->get('/cities', function (Request $request, Response $response, array $args) {
    $cities = $this->get('city-dao')->findAll();

    return $this->view->render($response, 'cities.twig', [
        'cities' => $cities
    ]);
}); */

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});