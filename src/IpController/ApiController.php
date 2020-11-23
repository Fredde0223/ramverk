<?php

namespace Fredde\IpController;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Fredde\Ip\ValCheck;

/**
 * API validator for IP-addresses
 */
class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * get method for api page
     *
     * @return object render api-page
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $title = "IP-validering (API)";

        $page->add("ip/apiValidator");

        return $page->render([
            "title" => $title,
        ]);
    }

    /**
     * get method for api page
     *
     * @return object json data
     */
    public function validateActionGet() : array
    {
        $ip = new ValCheck();
        $request = $this->di->get("request");
        $ipstring = $request->getGet("ip", "");

        $ipres = $ip->validate($ipstring);
        $domres = $ip->domain($ipstring);

        $obj = [
            'ip' => $ipstring,
            'status' => $ipres,
            'domain' => $domres
        ];

        return [$obj];
    }

    /**
     * post method for api page
     *
     * @return object json data
     */
    public function validateActionPost() : array
    {
        $ip = new ValCheck();
        $request = $this->di->get("request");
        $ipstring = $request->getPost("ipstring", "");

        $ipres = $ip->validate($ipstring);
        $domres = $ip->domain($ipstring);

        $obj = [
            'ip' => $ipstring,
            'status' => $ipres,
            'domain' => $domres
        ];

        return [$obj];
    }
}
