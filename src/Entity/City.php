<?php

namespace App\Entity;

use \DateTime;
use \Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'commune';

    /**
     * Indicates if the model should be timestamped
     *
     * @var boolean
     */
    public $timestamps = false;

    protected $visible = [
        'nom',
        'departement',
        'code_postal',
        'adresse',
        'id'
    ];

    /**
     * Find all cities
     *
     * @param array $wheres
     * @param array $order
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public static function find (array $wheres, array $order, $page, $pageSize) {
        $citiesRequest = City::where($wheres);

         if (\is_array($order) && isset($order['by']) && isset($order['direction'])) {
            $citiesRequest = $citiesRequest
                ->orderBy ($order['by'], $order['direction'])
            ;
        }

        return $citiesRequest
            ->take($pageSize)
            ->skip($page * $pageSize)
            ->get()
        ;
    }

    /**
     * Returns the count
     *
     * @param array $wheres
     * @return int
     */
    public static function count (array $wheres) {
        return City::where ($wheres)
            ->count()
        ;
    }
}