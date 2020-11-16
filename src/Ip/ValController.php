<?php

namespace Fredde\Ip;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * validator for IP-addresses
 */
class ValController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * get method for ip page
     *
     * @return object render ip-page
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $title = "IP-validering";
        $ipres = $session->get("ipres") ?? null;
        $domres = $session->get("domres") ?? null;
        $session->set("ipres", null);
        $session->set("domres", null);

        $data = [
            "ipres" => $ipres,
            "domres" => $domres,
        ];

        $page->add("ip/validator", $data);

        return $page->render([
            "title" => $title,
        ]);
    }

    /**
     * post method for ip page
     *
     * @return object redirect ip-page
     */
    public function indexActionPost() : object
    {
        $request = $this->di->get("request");
        $response = $this->di->get("response");
        $session = $this->di->get("session");
        $ipstring = $request->getPost("ipstring");
        $ip = new ValCheck();
        $ipres = $ip->validate($ipstring);
        $domres = $ip->domain($ipstring);
        $session->set("ipres", $ipres);
        $session->set("domres", $domres);

        return $response->redirect("ip");
    }
}
