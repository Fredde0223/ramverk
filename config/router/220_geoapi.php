<?php

return [
    "routes" => [
        [
            "info" => "Geo-finder (API)",
            "mount" => "geoapi",
            "handler" => "\Fredde\IpController\GeoApiController",
        ],
    ]
];
