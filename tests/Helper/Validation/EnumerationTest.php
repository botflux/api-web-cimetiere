<?php

namespace Test\Helper\Validation;

use App\Helper\Validation\Enumeration;

class EnumerationTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsTrueWhenTheValueMatchsOneEnumeration () {
        $this->assertEquals((new Enumeration ([ 'a', 'b', 'c' ])) ('b'), true);
    }

    public function testReturnsFalseWhenTheValueIsNotMatchingOneEnumeration () {
        $this->assertEquals((new Enumeration([ 'a', 'b', 'c' ])) ('d'), false);
    }
}