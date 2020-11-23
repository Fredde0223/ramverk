<?php

namespace Fredde\IpController;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Fredde\Ip\ValCheck;
use Fredde\Ip\GeoCheck;

/**
 * API validator for IP-addresses
 */
class GeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * get method for geo page
     *
     * @return object render geo-page
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $title = "Geo-position";
        $geo = new GeoCheck();
        $userip = $geo->userCheck();
        $ipres = $session->get("ipres") ?? null;
        $coordres = $session->get("coordres") ?? null;
        $locres = $session->get("locres") ?? null;
        $session->set("ipres", null);
        $session->set("coordres", null);
        $session->set("locres", null);

        $data = [
            "userip" => $userip,
            "ipres" => $ipres,
            "coordres" => $coordres,
            "locres" => $locres
        ];

        $page->add("ip/geoFinder", $data);

        return $page->render([
            "title" => $title,
        ]);
    }

     /**
      * post method for geo page
      *
      * @return object redirect geo-page
      */
    public function indexActionPost() : object
    {
        $request = $this->di->get("request");
        $response = $this->di->get("response");
        $session = $this->di->get("session");
        $ipstring = $request->getPost("ipstring");
        $ip = new ValCheck();
        $geo = new GeoCheck();
        $ipres = $ip->validate($ipstring);
        $coordres = $geo->coordCheck($ipstring);
        $locres = $geo->locCheck($ipstring);
        $session->set("ipres", $ipres);
        $session->set("coordres", $coordres);
        $session->set("locres", $locres);

        return $response->redirect("geo");
    }
}
