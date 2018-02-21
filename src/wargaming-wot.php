<?php

namespace Hichxm\WarGaming;

use Exception;
use GuzzleHttp\Client;

class WorgamingWotApi
{

    private $key;
    private $region;

    /**
     * WargamingWotApi constructor.
     * @param string $key
     * @param string $region
     */
    public function __construct(string $key, string $region)
    {
        $this->setKey($key);
        $this->setRegion($region);
    }

    /**
     * @param string $ref
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    private function request($ref, $options)
    {
        $link = $this->links[$ref];

        switch ($ref) {

        }

        //Replace data of the link
        $link = str_replace("{region}", $this->region, $link);
        $link = str_replace("{key}", $this->key, $link);

        $client = new Client();
        $res = $client->request("GET", $link);
        $res = json_decode($res->getBody(), true);

        if ($res['status'] === "error") {
            throw new Exception("INVALID_APPLICATION_ID", 407);
        }

        return $res;

    }
    /**
     * @param string $region
     */
    private function setRegion($region): void
    {
        $this->region = $region;
    }

    /**
     * @param string $key
     */
    private function setKey($key): void
    {
        $this->key = $key;
    }

}