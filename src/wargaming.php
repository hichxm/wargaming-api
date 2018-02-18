<?php

namespace Hichxm\WarGaming;

use Exception;
use GuzzleHttp\Client;


/**
 * Class wargaming
 * @package WargamingApi
 */
class WargamingApi
{
    private $key;
    private $region;

    private $links = [
        "accountSearch" => "api.worldoftanks.{region}/wgn/account/list/?application_id={key}&search={search}&limit={limit}&type={method}",
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
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public function searchPlayer($search, $options)
    {

        if (strlen($search) == 0) {

            //Search not specified
            throw new Exception("SEARCH_NOT_SPECIFIED", "402");
        } else if (strlen($search) <= 3) {

            //Search no enough
            throw new Exception("NOT_ENOUGH_SEARCH_LENGTH", "407");
        } else if (strlen($search) >= 100) {

            //Search as exceeded
            throw new Exception("SEARCH_LIST_LIMIT_EXCEEDED", "407");
        }

        return $this->request("accountSearch", [
            "search" => $search,
            "limit" => !empty($options['limit']) ? $options['limit'] : 100,
            "method" => !empty($options['method']) ? $options['method'] : "startswith"
        ]);

    }

    /**
     * @param string $ref
     * @param array $options
     * @return mixed
     */
    private function request($ref, $options)
    {
        $link = $this->links[$ref];

        //Replace data of the link
        $link = str_replace("{region}", $this->region, $link);
        $link = str_replace("{key}", $this->key, $link);

        switch ($ref) {
            case "accountSearch":

                //Replace data of the link
                $link = str_replace("{search}", $options['search'], $link);
                $link = str_replace("{limit}", $options['limit'], $link);
                $link = str_replace("{method}", $options['method'], $link);
                break;
        }

        return $link;

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