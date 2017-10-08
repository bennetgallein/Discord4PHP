<?php
namespace Discord\Gateway;

use \Discord\Discord;
use \WebSocket\Client;

class Gateway {
    /*

    https://discordapp.com/developers/docs/topics/gateway#connecting

    Get Gateway Bot
    GET/gateway/bot

    Returns an object with the same information as Get Gateway, plus a shards key, containing the recommended number of shards to
    connect with (as an integer). Bots that want to dynamically/automatically spawn shard processes should use this endpoint to determine
    the number of processes to run. This route should be called once when starting up numerous shards, with the response being cached
    and passed to all sub-shards/processes. Unlike the Get Gateway, this route should not be cached for extended periods of time as
    the value is not guaranteed to be the same per-call, and changes as the bot joins/leaves guilds.
    */
    public static function getGateway() {
        $ch = curl_init(); //
        curl_setopt_array($ch, array(
            CURLOPT_URL => "http://discordapp.com/api/v" . Discord::$apiv . "/gateway",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);

        return $data;
    }
    public static function getBotGateway($token_type, $token) {
        $ch = curl_init(); //
        curl_setopt_array($ch, array(
            CURLOPT_URL => "http://discordapp.com/api/v" . Discord::$apiv . "/gateway/bot",
            CURLOPT_HTTPHEADER     => array('Authorization: ' . $token_type . ' ' . $token),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);

        return $data;
    }
    public function __construct($url) {
        $client = new Client($url . "/?v=" . Discord::$apiv . "&encoding=json");
        $heartbeats = $client->receive();

        print_r($heartbeats);
    }
}
