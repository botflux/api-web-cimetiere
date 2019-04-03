<?php

namespace Tests\Functional;

use Slim\Http\Response;

class CitiesEndpointsTest extends BaseTestCase
{
    public function testGetIndex ()
    {
        /**
         * @var Response
         */
        $response = $this->runApp('GET', '/cities');
        
        $this->assertEquals(
            $response->getStatusCode(),
            200
        );
        
        $this->assertEquals(
            strpos($response->getHeader('Content-Type')[0], 'application/json') !== false,
            true
        );
    }
}