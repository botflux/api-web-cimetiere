<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\City;
use App\Form as Form;
use App\Entity\CitySearch;

class CityController 
{
    private $pageSize;

    public function __construct ($settings) {
        $this->pageSize = intval($settings['api']['default_page_size']);
    }

    public function all (Request $request, Response $response, $args) {
        $pageForm = new Form\PaginationForm ();
        $cityForm = new Form\CityForm ();
        
        if (!$cityForm->isValid ($request) || !$pageForm->isValid ($request)) {
            return $response
                ->withJson ([
                    'message' => 'Wrong parameters'
                ])
            ;
        }

        $pageSize = $this->pageSize;
        $citySearch = new CitySearch ($request);

        $wheres = [
            ['nom', 'LIKE', $citySearch->getCity()],
            ['departement', 'LIKE', $citySearch->getCounty()]
        ];

        $cities = City::find ($wheres, [
            'by' => $citySearch->getOrderBy(), 'direction' => $citySearch->getOrderDirection()
        ], $citySearch->getPage(), $pageSize, $citySearch->getOr());

        $count = City::count($wheres);

        $pageCount = ($count > 0) ? ceil($count / $pageSize) : 0;
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