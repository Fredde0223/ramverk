<?php

namespace Fredde\Ip;

use PHPUnit\Framework\TestCase;

/**
 * ValCheck test class.
 */
class GeoCheckTest extends TestCase
{
    /**
     * testing if class is created correctly
     */
    public function testClass()
    {
        $class = new GeoCheck();
        $this->assertInstanceOf("\Fredde\Ip\GeoCheck", $class);
    }

    /**
     * testing if some IPs are correct or not
     */
    public function testCoordCheck()
    {
        $class = new GeoCheck();

        $locate = $class->coordCheck("8.8.8.8");
        $this->assertEquals($locate, "Koordinater: 37.388019561768, -122.07431030273");

        $locate = $class->coordCheck("hejsan");
        $this->assertEquals($locate, "Koordinater ej tillgängliga.");
    }

    /**
     * testing if some IPs are correct or not and if they have domains
     */
    public function testLocCheck()
    {
        $class = new GeoCheck();

        $locate = $class->locCheck("8.8.8.8");
        $this->assertEquals($locate, "Geografisk position: Mountain View, United States");

        $locate = $class->locCheck("hejsan");
        $this->assertEquals($locate, "Geografisk position ej tillgänglig.");
    }

    /**
     * testing user IP func
     */
    public function testUserCheck()
    {
        $class = new GeoCheck();

        $locate = $class->userCheck();
        $this->assertIsString($locate);
    }
}
