<?php
namespace Discord\Objects\Channel;

use \Discord\Objects\Channel\Channel;
/**
 * @see https://discordapp.com/developers/docs/resources/channel#channel-object-channel-types
*/
class ChannelArray {

    public $channels;

    public function __construct($channels) {
        $this->channels = array();
        foreach ($channels as $channel) {
            $this->channels[$channel['id']] = new Channel($channel);
        }
    }
    public function getChannelById($id) {
        return $this->channels[$id];
    }
}
