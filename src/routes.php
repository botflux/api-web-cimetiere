<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/cities', function (Request $request, Response $response, array $args) {
    $cities = $this->get('city-dao')->findAll(
        $request->getParams(),
        ($request->getParam('first') && ctype_digit($request->getParam('first')) && intval($request->getParam('first')) >= 0 ? intval($request->getParam('first')) : 0),
        ($request->getParam('count') && ctype_digit($request->getParam('count')) && intval($request->getParam('count')) >= 1 ? intval($request->getParam('count')) : 25)
    );
    $citiesArray = $this->get('city-helper')->convertCollectionToAPI($cities);

    return $response->withJson($citiesArray);
});

$app->get('/cities/count', function (Request $request, Response $response, array $args) {
    $count = $this->get('city-dao')->getCount($request->getParams());
    return $response
        ->withJson([
            'count' => $count
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