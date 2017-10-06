<?php
namespace Discord\Objects\Channel;
/**
 * @see https://discordapp.com/developers/docs/resources/channel#channel-object-channel-types
*/
class ChannelArray {

    public $id;
    /*  GUILD_TEXT	0
        DM	1
        GUILD_VOICE	2
        GROUP_DM	3
        GUILD_CATEGORY	4
    */
    public $type;
    public $guildid;
    public $position;
    public $permission_overwrites;
    public $name;
    public $topic;
    public $nsfw;
    public $last_message_id;
    public $bitrate;
    public $user_limit;
    public $recipients;
    public $icon;
    public $owner_id;
    public $application_id;
    public $parent_id;
}
