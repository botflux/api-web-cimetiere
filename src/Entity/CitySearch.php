<?php

namespace App\Entity;

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helper\StringHelper;

class CitySearch {
    /**
     * @var int
     */
    private $page;

    /**
     * @var string
     */
    private $county;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $orderBy;

    /**
     * @var string
     */
    private $orderDirection;

    /**
     * @var bool
     */
    private $or;

    /**
     * Initialize a new instance of _CitySearch_
     *
     * @param Request $request
     */
    public function __construct (Request $request) {
        $this->page = intval($request->getParam('page')) ?? 0;
        $this->city = StringHelper::surroundByPercents($request->getParam('name') ?? '');
        $this->county = StringHelper::surroundByPercents($request->getParam('county') ?? '');
        $this->orderBy = $request->getParam('order-by') ?? 'id';
        $this->orderDirection = $request->getParam('order-direction') ?? 'ASC';
        $this->or = boolval($request->getParam('or')) ?? false;
    }

    /**
     * Get the value of orderDirection
     *
     * @return  string
     */ 
    public function getOrderDirection()
    {
        return $this->orderDirection;
    }

    /**
     * Set the value of orderDirection
     *
     * @param  string  $orderDirection
     *
     * @return  self
     */ 
    public function setOrderDirection(string $orderDirection) : self
    {
        $this->orderDirection = $orderDirection;

        return $this;
    }

    /**
     * Get the value of orderBy
     *
     * @return  string
     */ 
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Set the value of orderBy
     *
     * @param  string  $orderBy
     *
     * @return  self
     */ 
    public function setOrderBy(string $orderBy) : self
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return  string
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param  string  $city
     *
     * @return  self
     */ 
    public function setCity(string $city) : self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of county
     *
     * @return  string
     */ 
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set the value of county
     *
     * @param  string  $county
     *
     * @return  self
     */ 
    public function setCounty(string $county) : self
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get the value of page
     *
     * @return  int
     */ 
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the value of page
     *
     * @param  int  $page
     *
     * @return  self
     */ 
    public function setPage(int $page) : self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get the value of or
     *
     * @return  bool
     */ 
    public function getOr()
    {
        return $this->or;
    }

    /**
     * Set the value of or
     *
     * @param  bool  $or
     *
     * @return  self
     */ 
    public function setOr(bool $or) : self
    {
        $this->or = $or;

        return $this;
    }
}