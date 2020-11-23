<?php

namespace Fredde\IpController;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Fredde\Ip\ValCheck;
use Fredde\Ip\GeoCheck;

/**
 * API validator for IP-addresses
 */
class GeoApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * get method for geoapi page
     *
     * @return object render geoapi-page
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $title = "Geo-position (API)";
        $geo = new GeoCheck();
        $userip = $geo->userCheck();

        $data = [
            "userip" => $userip
        ];

        $page->add("ip/geoApi", $data);

        return $page->render([
            "title" => $title,
        ]);
    }

    /**
     * get method for geoapi page
     *
     * @return object json data
     */
    public function locateActionGet() : array
    {
        $ip = new ValCheck();
        $geo = new GeoCheck();
        $request = $this->di->get("request");
        $ipstring = $request->getGet("ip", "");

        $ipres = $ip->validate($ipstring);
        $coordres = $geo->coordCheck($ipstring);
        $locres = $geo->locCheck($ipstring);

        $obj = [
            'ip' => $ipstring,
            'status' => $ipres,
            'coords' => $coordres,
            'location' => $locres
        ];

        return [$obj];
    }

    /**
     * post method for geoapi page
     *
     * @return object json data
     */
    public function locateActionPost() : array
    {
        $ip = new ValCheck();
        $geo = new GeoCheck();
        $request = $this->di->get("request");
        $ipstring = $request->getPost("ipstring", "");

        $ipres = $ip->validate($ipstring);
        $coordres = $geo->coordCheck($ipstring);
        $locres = $geo->locCheck($ipstring);

        $obj = [
            'ip' => $ipstring,
            'status' => $ipres,
            'coords' => $coordres,
            'location' => $locres
        ];

        return [$obj];
    }
}
