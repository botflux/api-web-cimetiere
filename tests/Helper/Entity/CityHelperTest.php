<?php

namespace Tests\Helper\Entity;

use App\Entity\City;
use Faker\Factory;
use App\Helper\Entity\CityHelper;

class CityHelperTest extends \PHPUnit_Framework_TestCase
{
    private $cities;
    private $apiCities;

    public function __construct ()
    {
        $this->cities = [];
        $this->apiCities = [];

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 2; $i ++) {
            $city = (new City())
                ->setId($i)
                ->setAddress($faker->address)
                ->setCanBloom($faker->boolean(50))
                ->setCanMaintain($faker->boolean(50))
                ->setConcessions($faker->boolean(50))
                ->setConnectedAt($faker->dateTime)
                ->setCounty(68)
                ->setCreatedAt($faker->dateTime)
                ->setEmail($faker->email)
                ->setHidden($faker->boolean(50))
                ->setHideEndClaim($faker->boolean(50))
                ->setModifiedAt($faker->dateTime)
                ->setName($faker->name)
                ->setNotification($faker->boolean(50))
                ->setPassword($faker->password)
                ->setPhone($faker->phoneNumber)
                ->setZipCode($faker->postCode)
            ;
            $this->cities[] = $city;
            $this->apiCities[] = $city->toAPI();
        }
    }
    
    public function testConvertCityCollectionToAPI () 
    {
        $cityHelper = new CityHelper();
        $this->assertEquals($cityHelper->convertCollectionToAPI($this->cities), $this->apiCities);
    }
}