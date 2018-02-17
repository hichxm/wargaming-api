<?php

use Hichxm\WargamingApi;
use PHPUnit\Framework\TestCase;

class WargamingApiTest extends TestCase {

    /** @test */
    public function check_with_good_data_the_api() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        //Get all players where username start with: volca7
        $players = $war->searchPlayer("volca7");

        $this->assertEquals("ok", $players['status']);

    }

}