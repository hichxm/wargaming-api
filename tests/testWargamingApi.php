<?php

use Hichxm\WarGaming\WargamingApi;
use PHPUnit\Framework\TestCase;

class WargamingApiTest extends TestCase {

    /**
     * @test
     * @throws Exception
     */
    public function check_search_players_with_default_option() {

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
    public function check_search_players_with_personel_option() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        //Get all players where username start with: volca7
        $players = $war->searchPlayers("volca780", [
            "method" => "exact"
        ])['players'];

        $this->assertEquals("volca780", $players[0]['nickname']);
    }

    /**
     * @test
     * @throws Exception
     */
    public function check_search_player_info_with_default_option() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        //Get all players with id: 500080014, 514444123, 514444121
        $players = $war->searchPlayer(["500080014", "514444123", "514444121"]);

        $this->assertEquals("vol", $players['players']['500080014']['nickname']);
        $this->assertEquals("volca780", $players['players']['514444123']['nickname']);
        $this->assertEquals("__Swat_BegBang__", $players['players']['514444121']['nickname']);

        $this->assertEquals(3, $players['count']);

    }

    /**
     * @test
     * @throws Exception
     */
    public function check_search_clans_with_default_option()
    {
        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $clans = $war->searchClans("aze");

        $this->assertEquals(100, $clans['count']);
    }

    /**
     * @test
     * @throws Exception
     */
    public function check_search_clans_with_custom_option()
    {
        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $clans = $war->searchClans("aze", [
            "limit" => 10,
            "pagination" => 1,
            "region" => "ru"
        ]);

        $this->assertEquals(10, $clans['count']);
    }

}