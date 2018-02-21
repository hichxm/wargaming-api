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

        var_dump($players);

        $this->assertEquals(5, $players['count']);

    }

}