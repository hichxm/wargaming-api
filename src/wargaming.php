<?php

namespace Hichxm;


/**
 * Class wargaming
 * @package WargamingApi
 */
class WargamingApi
{
    private $key;
    private $region;

    private $links = [
        "accountSearch" => "api.worldoftanks.{region}/wgn/account/list/?application_id={key}&search={seach}",
    ];

    /**
     * WargamingApi constructor.
     * @param string $key
     * @param string $region
     */
    public function __construct($key, $region)
    {
        $this->setKey($key);
        $this->setRegion($region);
    }

    /**
     * @param string $region
     */
    private function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @param string $key
     */
    private function setKey($key)
    {
        $this->key = $key;
    }

}