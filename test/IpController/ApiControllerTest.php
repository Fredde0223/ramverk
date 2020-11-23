<?php

namespace Fredde\IpController;

use Anax\DI\DIFactoryConfig;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * ValController test class.
 */
class ApiControllerTest extends TestCase
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
        $contClass = new ApiController();
        $contClass->setDI($this->di);

        $result = $contClass->indexActionGet();
        $this->assertInstanceOf(ResponseUtility::class, $result);
    }

    /**
     * testing the validate get
     */
    public function testValGet()
    {
        $contClass = new ApiController();
        $contClass->setDI($this->di);

        $result = $contClass->validateActionGet();
        $this->assertIsArray($result);
    }

    /**
     * testing the vaidate post
     */
    public function testValPost()
    {
        $contClass = new ApiController();
        $contClass->setDI($this->di);

        $result = $contClass->validateActionPost();
        $this->assertIsArray($result);
    }
}
