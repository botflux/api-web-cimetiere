<?php 

namespace Tests\Helper;

use App\Helper\StringHelper;

class StringHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * surroundStringByPercent
     *
     * @return void
     */
    public function testSurroundsGivenStringByPercent () {
        $this->assertEquals(StringHelper::surroundByPercents('hello world'), '%hello world%');
    }

    /**
     * surroundStringByPercent
     *
     * @return void
     */
    public function testReturnsAPercentWithGivenStringIsEmpty () {
        $this->assertEquals(StringHelper::surroundByPercents(''), '%');
    }
}