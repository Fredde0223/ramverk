<?php

namespace Fredde\Ip;

use PHPUnit\Framework\TestCase;

/**
 * ValCheck test class.
 */
class ValCheckTest extends TestCase
{
    /**
     * testing if class is created correctly
     */
    public function testClass()
    {
        $class = new ValCheck();
        $this->assertInstanceOf("\Fredde\Ip\ValCheck", $class);
    }

    /**
     * testing if some IPs are correct or not
     */
    public function testValidate()
    {
        $class = new ValCheck();

        $check = $class->validate("8.8.8.8");
        $this->assertEquals($check, "Din input '8.8.8.8' är en korrekt IPv4-adress.");

        $check = $class->validate("0000:0000:0000:0000:0000:0000:0000:0001");
        $this->assertEquals($check, "Din input '0000:0000:0000:0000:0000:0000:0000:0001' är en korrekt IPv6-adress.");

        $check = $class->validate("hejsan");
        $this->assertEquals($check, "Din input 'hejsan' är inte en korrekt IP-adress.");
    }

    /**
     * testing if some IPs are correct or not and if they have domains
     */
    public function testDomain()
    {
        $class = new ValCheck();

        $check = $class->domain("8.8.8.8");
        $this->assertEquals($check, "IP-adressen tillhör domänen 'dns.google'.");

        $check = $class->domain("1.2.3.4");
        $this->assertEquals($check, "Kan ej hitta domännamn för IP-adressen.");

        $check = $class->domain("hejsan");
        $this->assertEquals($check, "Domännamn ej tillgängligt.");
    }
}
