<?php

namespace Hichxm\WarGaming;

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