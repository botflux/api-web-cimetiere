<?php

namespace Test\Helper\Validation;

use App\Helper\Validation\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsTrueWhenTheValueIsSet () {
        $this->assertEquals((new Required())('bla'), true);
    }

    public function testReturnsFalseWhenTheIsNotSet () {
        $this->assertEquals((new Required())(null), false);
    }
}