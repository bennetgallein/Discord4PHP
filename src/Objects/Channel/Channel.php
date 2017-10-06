<?php
namespace Discord\Objects\Channel;
/**
 * @see https://discordapp.com/developers/docs/resources/channel#channel-object
 */
class Channel {

    public $id;
    /*  GUILD_TEXT	0
        DM	1
        GUILD_VOICE	2
        GROUP_DM	3
        GUILD_CATEGORY	4
    */
    public $type;
    public $guild_id;
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

    public function __construct($channel) {
        $this->id = $channel['id'];
        $this->type = $channel['type'];
        $this->guild_id = $channel['guild_id'];
        $this->position = $channel['position'];
        $this->permission_overwrites = $channel['permission_overwrites'];
        $this->name = $chanel['name'];
        $this->topic = $channel['topic'];
        $this->nsfw = $channel['nsfw'];
        $this->last_message_id = $channel['last_message_id'];
        $this->bitrate = $channel['bitrate'];
        $this->user_limit = $channel['user_limit'];
        $this->recipients = $channel['recipients'];
        $this->icon = $channel['icon'];
        $this->owner_id = $channel['owner_id'];
        $this->application_id = $channel['application_id'];
        $this->parent_id = $channel['parent_id'];
    }
    public function getID() {
        return $this->id;
    }
    public function getType() {
        return $this->type;
    }
    public function getGuildId() {
        return $this->guild_id;
    }
    public function getPosition() {
        return $this->position;
    }
    public function getPermissionOverwrites() {
        return $this->permission_overwrites;
    }
    public function getName() {
        return $this->name;
    }
    public function getTopic() {
        return $this->topic;
    }
    public function getNSFW() {
        return $this->nfsw;
    }
    public function getLastMessageId() {
        return $this->last_message_id;
    }
    public function getBitrate() {
        return $this->bitrate;
    }
    public function getUserLimit() {
        return $this->user_limit;
    }
    public function getRecipients() {
        return $this->recipients;
    }
    public function getIcon() {
        return $this->icon;
    }
    public function getOwnerId() {
        return $this->owner_id;
    }
    public function getApplicationId() {
        return $this->application_id;
    }
    public function getParentId() {
        return $this->parent_id;
    }
}
