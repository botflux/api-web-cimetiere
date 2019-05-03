<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Entity\City;
use App\Helper\StringHelper;

class CityController 
{
    private $pageSize;

    public function __construct ($settings) {
        $this->pageSize = intval($settings['api']['default_page_size']);
    }

    public function all (Request $request, Response $response, $args) {
        // \var_dump($this->pageSize);
        $pageSize = $this->pageSize;
        $page = intval($request->getParam('page')) ?? 0;

        $name = StringHelper::surroundByPercents($request->getParam('name') ?? '');
        $county = StringHelper::surroundByPercents($request->getParam('county') ?? '');
        
        $orderBy = $request->getParam ('order-by');
        $orderDirection = $request->getParam ('order-direction') ?? 'ASC';

        $wheres = [
            ['nom', 'LIKE', $name],
            ['departement', 'LIKE', $county]
        ];

        $citiesRequest = City::take($pageSize)
            ->where($wheres)
        ;

        if (!empty($orderBy)) {
            $citiesRequest = $citiesRequest
                ->orderBy ($orderBy, $orderDirection)
            ;
        }

        $cities = $citiesRequest
            ->skip($page * $pageSize)
            ->get()
        ;

        $count = City::where ($wheres)
            ->count()
        ;

        if ($count > 0)
            $pageCount = ceil($count / $pageSize);
        else
            $pageCount = 0;

        return $response
            ->withJson([
                'cities' => $cities,
                'count' => $count,
                'pageSize' => $pageSize,
                'pageCount' => $pageCount
            ])
        ;
    }
}