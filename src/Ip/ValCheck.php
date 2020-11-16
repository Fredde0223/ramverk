<?php

namespace Fredde\Ip;

/**
 * validatin check for IP-addresses
 */
class ValCheck
{
    /**
     * check if ipstring is valid ipv4 or ipv6 address
     *
     * @var string $ipstring   string input to check
     *
     * @return string to output result
     */
    public function validate($inp) : string
    {
        if (filter_var($inp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "Din input '$inp' är en korrekt IPv4-adress.";
        } else if (filter_var($inp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "Din input '$inp' är en korrekt IPv6-adress.";
        } else {
            return "Din input '$inp' är inte en korrekt IP-adress.";
        }
    }

    /**
     * check domain name for ip-address
     *
     * @var string $ipstring   string input to check
     *
     * @return string to output result
     */
    public function domain($inp) : string
    {
        if (filter_var($inp, FILTER_VALIDATE_IP)) {
            if (gethostbyaddr($inp) == $inp) {
                return "Kan ej hitta domännamn för IP-adressen.";
            } else {
                $dom = gethostbyaddr($inp);
                return "IP-adressen tillhör domänen '$dom'.";
            }
        } else {
            return "Domännamn ej tillgängligt.";
        }
    }
}
