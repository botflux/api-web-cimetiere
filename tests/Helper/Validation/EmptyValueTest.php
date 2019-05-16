<?php

namespace Test\Helper\Validation;

use App\Helper\Validation\EmptyValue;

class EmptyValueTest extends \PHPUnit_Framework_TestCase 
{
    public function testReturnsTrueWhenValueIsNotEmpty () {
        $this->assertEquals((new EmptyValue ())('Hello'), true);
    }

    public function testReturnsFalseWhenValueIsEmpty () {
        $this->assertEquals((new EmptyValue ())(''), false);
    }
}
