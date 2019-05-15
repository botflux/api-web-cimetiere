<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\City;
use App\Helper\StringHelper;
use App\Form as Form;

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
        $page = intval($request->getParam('page')) ?? 0;
        
        $name = StringHelper::surroundByPercents($request->getParam('name') ?? '');
        $county = StringHelper::surroundByPercents($request->getParam('county') ?? '');
        $orderBy = $request->getParam ('order-by') ?? 'id';
        $orderDirection = $request->getParam ('order-direction') ?? 'ASC';

        $wheres = [
            ['nom', 'LIKE', $name],
            ['departement', 'LIKE', $county]
        ];

        $cities = City::find ($wheres, [
            'by' => $orderBy, 'direction' => $orderDirection
        ], $page, $pageSize);

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