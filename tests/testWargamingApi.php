<?php

use Hichxm\WarGaming\WargamingApi;
use PHPUnit\Framework\TestCase;

class WargamingApiTest extends TestCase {

    /**
     * @test
     * @throws Exception
     */
    public function check_search_player_with_default_option() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        //Get all players where username start with: volca7
        $players = $war->searchPlayers("volca7")['players'];

        $this->assertEquals("volca780", $players[1]['nickname']);
        $this->assertEquals("wot", $players[1]['games'][0]);
    }

    /**
     * @test
     * @throws Exception
     */
    public function check_search_player_with_personel_option() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        //Get all players where username start with: volca7
        $players = $war->searchPlayers("volca780", [
            "method" => "exact"
        ])['players'];

        $this->assertEquals("volca780", $players[0]['nickname']);
    }

}