<?php

namespace Hichxm;
use Exception;


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
     * @param string $search
     * @throws Exception
     */
    public function searchPlayer($search)
    {

        if (strlen($search) == 0) {

            //Search not specified
            throw new Exception("SEARCH_NOT_SPECIFIED", "402");
        } else if (strlen($search) <= 3) {

            //Search no enough
            throw new Exception("NOT_ENOUGH_SEARCH_LENGTH", "407");
        } else if (strlen($search) < 100) {

            //Search as exceeded
            throw new Exception("SEARCH_LIST_LIMIT_EXCEEDED", "407");
        }

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