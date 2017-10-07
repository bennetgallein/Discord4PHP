<?php
/**
 * Channel.php
 */
namespace Discord\Objects\Channel;
/**
 * This is the Channel object. Visit the discord API for more information.
 * @see https://discordapp.com/developers/docs/resources/channel#channel-object
 */
class Channel {

    /** @var integer|null The ID of the channel */
    public $id;
    /*  GUILD_TEXT	0
        DM	1
        GUILD_VOICE	2
        GROUP_DM	3
        GUILD_CATEGORY	4
    */
    /** @var integer|null The type of the channel */
    public $type;
    /** @var integer|null The guild ID of the channel */
    public $guild_id;
    /** @var integer|null The sorting position of the channel */
    public $position;
    /** @var array|null An array of overwrite objects */
    public $permission_overwrites;
    /** @var string|null The name of the channel */
    public $name;
    /** @var string|null The topic of the channel */
    public $topic;
    /** @var boolean|null Whether this channel is nsfw */
    public $nsfw;
    /** @var integer|null The id of the last message in the channel */
    public $last_message_id;
    /** @var integer|null The bitrate of the voice channel */
    public $bitrate;
    /** @var integer The maximum user count in this channel */
    public $user_limit;
    /** @var array|null An array of receipients of the channel */
    public $recipients;
    /** @var string|null The icon hash of the channel */
    public $icon;
    /** @var integer|null The id of the channel's owner */
    public $owner_id;
    /** @var integer|null The application id of the channel's creator if it is bot created */
    public $application_id;
    /** @var integer|null The id of the parent category of the channel */
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
