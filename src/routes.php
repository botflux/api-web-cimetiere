<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

function getRouteName ($controllerClassName, $function) {
    return $controllerClassName . ':' . $function;
}

function getCityControllerRouterName ($function) {
    return getRouteName (\App\Controller\CityController::class, $function);
}

$app->get('/cities', getCityControllerRouterName('all'));
$app->get('/cities/count', getCityControllerRouterName('count'));

// $app->get('/cities', function (Request $request, Response $response, array $args) {
//     $pageSize = $this->get('settings')['api']['default_page_size'];
//     $page = $request->getParam('page') ?? 0;
//     $name = $request->getParam('name') ?? '%';
//     $county = $request->getParam('county') ?? '%';

//     if ($county !== '%')
//         $county = '%' . $county . '%';

//     if ($name !== '%')
//         $name = '%' . $name . '%';


//     $cities = App\Entity\City::take($pageSize)
//         ->where('nom', 'LIKE', $name)
//         ->where('departement', 'LIKE', $county)
//         ->skip($page * $pageSize)
//         ->get()
//     ;

//     return $response
//         ->withJson([
//             'cities' => $cities
//         ])
//     ;
// });

// $app->get('/cities/count', function (Request $request, Response $response, array $args) {
//     $pageSize = $this->get('settings')['api']['default_page_size'];
    
//     $count = App\Entity\City::all()
//         ->count()
//     ;
    
//     return $response
//         ->withJson([
//             'count' => $count,
//             'pageSize' => $pageSize,
//             'pageCount' => ceil($count / $pageSize)
//         ])
//     ;
// });

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