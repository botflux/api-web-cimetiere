<?php

namespace Tests\Entity;

use App\Entity\City;
use \DateTime;

class CityTest extends \PHPUnit_Framework_TestCase
{
    public function testCityToApi () 
    {
        $city = (new City())
            ->setId(0)
            ->setAddress('a')
            ->setCanBloom(true)
            ->setCanMaintain(true)
            ->setConcessions(true)
            ->setConnectedAt(new DateTime())
            ->setEmail('email@example.fr')
            ->setCounty('Haut-Rhin')
            ->setCreatedAt(new DateTime())
            ->setHidden(true)
            ->setHideEndClaim(true)
            ->setModifiedAt(new DateTime())
            ->setName('City')
            ->setNotification(false)
            ->setPhone('0600000000')
            ->setZipCode('00000')
        ;

        $array = [
            'id'            => 0,
            'name'          => 'City',
            'county'        => 'Haut-Rhin',
            'address'       => 'a',
            'email'         => 'email@example.fr',
            'phone'         => '0600000000',
            'concessions'   => true
        ];

        $this->assertEquals($city->toAPI(), $array);
    }
}