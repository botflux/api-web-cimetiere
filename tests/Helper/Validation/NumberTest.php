<?php

namespace Test\Helper\Validation;

use App\Helper\Validation\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsTrueWhenValueIsInteger () {
        $this->assertEquals((new Number())('52'), true);
        $this->assertEquals((new Number())(52), true);
        $this->assertEquals((new Number())('-45'), true);
        $this->assertEquals((new Number())(-5), true);
    }

    public function testReturnsFalseWhenValueIsFloat () {
        $this->assertEquals((new Number())('52.5'), false);
        $this->assertEquals((new Number())(52.5), false);
        $this->assertEquals((new Number())('-52.5'), false);
        $this->assertEquals((new Number())(-52.5), false);
    }

    public function testReturnsTrueWhenValueIsIntegerBetweenFromAndTo () {
        $this->assertEquals((new Number([ 'from' => 40, 'to' => 48 ]))('41'), true);
        $this->assertEquals((new Number([ 'from' => -48, 'to' => -40 ]))('-45'), true);

        $this->assertEquals((new Number([ 'from' => -48, 'to' => -40 ]))('-48'), true);
        $this->assertEquals((new Number([ 'from' => -48, 'to' => -40 ]))('-40'), true);
        
        $this->assertEquals((new Number([ 'from' => 40, 'to' => 48 ]))(40), true);
        $this->assertEquals((new Number([ 'from' => 40, 'to' => 48 ]))(48), true);
    }

    public function testReturnsFalseWhenValueIsIntegerNotBetweenFromAndTo () {
        $this->assertEquals((new Number([ 'from' => -5, 'to' => 0 ]))(-7), false);
        $this->assertEquals((new Number([ 'from' => 15, 'to' => 95 ]))(96), false);
    }

    public function testThrowsAnErrorWhenFromIsGreaterThanTo () {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("The _from_ parameter can't be greater or equal to _to_");

        new Number ([
            'from' => 80,
            'to' => 50
        ]);
    }

    public function testReturnsFalseWhenValueIsString () {
        $this->assertEquals((new Number())('hello'), false);
    }
}