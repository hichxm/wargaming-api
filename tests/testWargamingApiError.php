<?php

use Hichxm\WarGaming\WargamingApi;
use PHPUnit\Framework\TestCase;

class WargamingApiErrorTest extends TestCase {

    /**
     * @test
     * @throws Exception
     */
    public function check_search_players_with_bad_api_key_but_good_data_option() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", "eu");

        try {
            $war->searchPlayers("volca7");
        } catch (Exception $e) {
            $this->assertEquals("INVALID_APPLICATION_ID", $e->getMessage());
        }
    }

    /**
     * @test
     * @throws Exception
     */
    public function check_search_players_with_good_api_key_but_bad_data_option() {

        //Init Wargaming.net api key and region
        $war = new WargamingApi("e9807cace93606169c54fb8e9ec763b2", "eu");

        //NOT_ENOUGH_SEARCH_LENGTH
        try{
            $war->searchPlayers("vo");
        } catch (Exception $e) {
            $this->assertEquals("NOT_ENOUGH_SEARCH_LENGTH", $e->getMessage());
        }

        //SEARCH_NOT_SPECIFIED
        try{
            $war->searchPlayers("");
        } catch (Exception $e) {
            $this->assertEquals("SEARCH_NOT_SPECIFIED", $e->getMessage());
        }

        //SEARCH_LIST_LIMIT_EXCEEDED
        try{
            $war->searchPlayers("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
        } catch (Exception $e) {
            $this->assertEquals("SEARCH_LIST_LIMIT_EXCEEDED", $e->getMessage());
        }
    }

}