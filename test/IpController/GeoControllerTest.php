<?php

namespace Fredde\IpController;

use Anax\DI\DIFactoryConfig;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * ValController test class.
 */
class GeoControllerTest extends TestCase
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
    public function testGet()
    {
        $contClass = new GeoController();
        $contClass->setDI($this->di);

        $result = $contClass->indexActionGet();
        $this->assertInstanceOf(ResponseUtility::class, $result);
    }

    /**
     * testing the index post
     */
    public function testPost()
    {
        $contClass = new GeoController();
        $contClass->setDI($this->di);

        $result = $contClass->indexActionPost();
        $this->assertInstanceOf(ResponseUtility::class, $result);
    }
}
