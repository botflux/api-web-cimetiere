<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/cities', function (Request $request, Response $response, array $args) {
    $pageSize = $this->get('settings')['api']['default_page_size'];
    $page = $request->getParam('page') ?? 0;
    $cities = $this->get('city-dao')->findAll(
        $request->getParams(),
        $page * $pageSize,
        $pageSize
    );
    $citiesArray = $this->get('city-helper')->convertCollectionToAPI($cities);

    return $response->withJson($citiesArray);
});

$app->get('/cities/count', function (Request $request, Response $response, array $args) {
    $count = $this->get('city-dao')->getCount($request->getParams());
    $pageSize = $this->get('settings')['api']['default_page_size'];
    return $response
        ->withJson([
            'count' => $count,
            'pageSize' => $pageSize
        ])
    ;
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