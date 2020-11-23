<?php

namespace Fredde\IpController;

use Anax\DI\DIFactoryConfig;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * ValController test class.
 */
class GeoApiControllerTest extends TestCase
{
    protected $di;

    /**
     * Setup $di
     */
    protected function setUp()
    {
        global $di;

        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
        $this->di = $di;
    }

    /**
     * testing the index get
     */
    public function testIndGet()
    {
        $contClass = new GeoApiController();
        $contClass->setDI($this->di);

        $result = $contClass->indexActionGet();
        $this->assertInstanceOf(ResponseUtility::class, $result);
    }

    /**
     * testing the validate get
     */
    public function testLocGet()
    {
        $contClass = new GeoApiController();
        $contClass->setDI($this->di);

        $result = $contClass->locateActionGet();
        $this->assertIsArray($result);
    }

    /**
     * testing the vaidate post
     */
    public function testLocPost()
    {
        $contClass = new GeoApiController();
        $contClass->setDI($this->di);

        $result = $contClass->locateActionPost();
        $this->assertIsArray($result);
    }
}
