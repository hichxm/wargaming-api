<?php

use Hichxm\WarGaming\WorgamingWotApi;
use PHPUnit\Framework\TestCase;

class testWargamingWotApi extends TestCase{

    /**
     * @test
     */
    public function check_namespace_work()
    {
        $wot = new WorgamingWotApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $this->assertTrue(true);
    }
    
}