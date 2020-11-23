<?php

namespace Fredde\Ip;

/**
 * geographical check for IP-addresses
 */
class GeoCheck
{
    /**
     * check coords for ipstring
     *
     * @var string $ipstring   string input to check
     *
     * @return string to output result
     */
    public function coordCheck($inp) : string
    {
        $apikey = "7638370a5579b975adc19b14357b0b0c";
        $curl = curl_init('http://api.ipstack.com/'.$inp.'?access_key='.$apikey.'');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $jsonRes = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($jsonRes, true);

        $lat = $res['latitude'];
        $lon = $res['longitude'];

        if ($lat == null || $lon == null) {
            return "Koordinater ej tillgängliga.";
        } else {
            return "Koordinater: $lat, $lon";
        }
    }

    /**
     * check location for ipstring
     *
     * @var string $ipstring   string input to check
     *
     * @return string to output result
     */
    public function locCheck($inp) : string
    {
        $apikey = "7638370a5579b975adc19b14357b0b0c";
        $curl = curl_init('http://api.ipstack.com/'.$inp.'?access_key='.$apikey.'');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $jsonRes = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($jsonRes, true);

        $city = $res['city'];
        $country = $res['country_name'];

        if ($city == null || $country == null) {
            return "Geografisk position ej tillgänglig.";
        } else {
            return "Geografisk position: $city, $country";
        }
    }

    /**
     * check location for user
     *
     * @return string to output result
     */
    public function userCheck() : string
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $userip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $userip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $userip = $_SERVER['REMOTE_ADDR'];
        } else {
            $userip = "1.3.3.7";
        }
        return $userip;
    }
}
