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

    /**
     * @test
     * @throws Exception
     */
    public function check_search_player_work_with_default_options()
    {
        $wot = new WorgamingWotApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $players = $wot->searchPlayers("volca780");

        $this->assertEquals("volca780", $players['players'][0]['nickname']);

    }

    /**
     * @test
     * @throws Exception
     */
    public function check_search_player_work_with_custom_options()
    {
        $wot = new WorgamingWotApi("e9807cace93606169c54fb8e9ec763b2", "ru");

        $players = $wot->searchPlayers("vol", [
            "limit" => 5,
            "region" => "eu",
            "method" => "startswith"
        ]);

        $this->assertEquals(5, $players['count']);

    }

    /**
     * @test
     * @throws Exception
     */
    public function check_info_player_work_with_default_options()
    {
        $wot = new WorgamingWotApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $players = $wot->infoPlayersById(["500080014", "514444123"]);

        $this->assertEquals("volca780", $players['players']["514444123"]['nickname']);

    }

    /**
     * @test
     * @throws Exception
     */
    public function check_players_vehicules_with_default_option()
    {
        //Init Wargaming.net api key and region
        $wot = new WorgamingWotApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $players = $wot->playersTank(["500450795", "503197062", "500435236"]);

        $this->assertEquals(3, $players['count']);
    }

    /**
     * @test
     * @throws Exception
     */
    public function check_players_vehicules_with_custom_option()
    {
        //Init Wargaming.net api key and region
        $wot = new WorgamingWotApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        $players = $wot->playersTank(["500450795", "503197062", "500435236"], [
            "tanks" => ["2849", "10785"]
        ]);

        $this->assertEquals(3, $players['count']);
    }

}