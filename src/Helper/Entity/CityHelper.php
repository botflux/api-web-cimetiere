<?php

namespace App\Helper\Entity;

use App\Entity\City;

class CityHelper
{
    /**
     * Converts a collection of City Entity to a collection of arrays.
     *
     * @param City[] $cities
     * @return array[]
     */
    public function convertCollectionToAPI (array $cities) : array
    {
        $results = [];

        foreach ($cities as $v) {
            $results[] = $v->toAPI();
        }

        return $results;
    }
}