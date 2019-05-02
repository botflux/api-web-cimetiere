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
        $this->pageSize = $settings['api']['default_page_size'];
        // \var_dump($settings['api']['default_page_size']);
    }

    public function all (Request $request, Response $response, $args) {
        // \var_dump($this->pageSize);
        $pageSize = $this->pageSize;
        $page = intval($request->getParam('page')) ?? 0;

        $name = StringHelper::surroundByPercents($request->getParam('name') ?? '');
        $county = StringHelper::surroundByPercents($request->getParam('county') ?? '');
        print($name);
        $cities = City::take($pageSize)
            ->where([
                ['nom', 'LIKE', $name],
                ['departement', 'LIKE', $county]
            ])
            ->skip($page * $pageSize)
            ->get()
        ;

        return $response
            ->withJson([
                'cities' => $cities
            ])
        ;
    }

    public function count (Request $request, Response $response, $args) {
        $pageSize = $this->pageSize;
    
        $count = City::all()
            ->count()
        ;
        
        return $response
            ->withJson([
                'count' => $count,
                'pageSize' => $pageSize,
                'pageCount' => ceil($count / $pageSize)
            ])
        ;
    }
}