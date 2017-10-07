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

    /**
     * This is the Channel object constructor.
     *
     * This creates a new Channel object based on the array given.
     * 
     * @param array $channel is an array of a channel object.
     *
     * @return void
     */
    public function __construct($channel) {
        $this->id = $channel['id'];
        $this->type = $channel['type'];
        $this->guild_id = isset($channel['guild_id']) ? $channel['guild_id'] : null;
        $this->position = isset($channel['position']) ? $channel['position']: null;
        $this->permission_overwrites = isset($channel['permission_overwrites']) ? $channel['permission_overwrites'] : null;
        $this->name = isset($channel['name']) ? $chanel['name'] : null;
        $this->topic = isset($channel['topic']) ? $channel['topic'] : null;
        $this->nsfw = isset($channel['nsfw']) ? $channel['nsfw'] : null;
        $this->last_message_id = isset($channel['last_message_id']) ? $channel['last_message_id'] :null;
        $this->bitrate = isset($channel['bitrate']) ? $channel['bitrate'] : null;
        $this->user_limit = isset($channel['user_limit']) ? $channel['user_limit'] : null;
        $this->recipients = isset($channel['recipients']) ? $channel['recipients'] : null;
        $this->icon = isset($channel['icon']) ? $channel['icon'] : null;
        $this->owner_id = isset($channel['owner_id']) ? $channel['owner_id'] : null;
        $this->application_id = isset($channel['application_id']) ? $channel['application_id'] : null;
        $this->parent_id = isset($channel['parent_id']) ? $channel['parent_id'] : null;
    }
    /**
     * Get the id of the channel
     *
     * This returns a unique channel id based on twitter's snowflake id system
     *
     * @param none
     * 
     * @return integer
     */
    public function getID() {
        return $this->id;
    }
    /**
     * Get the type of the channel
     *
     * This returns the type of the channel
     *
     * @param none
     * 
     * @return integer 0 - 4
     *
     * @see https://discordapp.com/developers/docs/resources/channel#channel-object-channel-types
     */
    public function getType() {
        return $this->type;
    }
    /**
     * Get the channel's guild id.
     *
     * This returns a unique guild id based on twitter's snowflake id system
     *
     * @param none
     * 
     * @return integer
     */
    public function getGuildId() {
        return $this->guild_id;
    }
    /**
     * Get the sorting position of the channel
     *
     * This returns an integer representing the index of this channel
     *
     * @param none
     * 
     * @return integer
     */
    public function getPosition() {
        return $this->position;
    }
    /**
     * Get an array of overwrite objects
     *
     * This returns explicit permission overwrites for members and roles as an array of overwrite objects.
     *
     * @param none
     * 
     * @return array
     *
     * @see https://discordapp.com/developers/docs/resources/channel#overwrite-object
     */
    public function getPermissionOverwrites() {
        return $this->permission_overwrites;
    }
    /**
     * Get the name of the channel
     *
     * This returns the name of the channel
     *
     * @param none
     * 
     * @return string 2-100 characters
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Get the topic of the channel
     *
     * This returns the channel topic
     *
     * @param none
     * 
     * @return string 0-1024 characters
     */
    public function getTopic() {
        return $this->topic;
    }
    /**
     * Get whether this channel is nsfw
     *
     * This returns a boolean whether this channel is not safe for work
     *
     * @param none
     * 
     * @return boolean
     */
    public function getNSFW() {
        return $this->nfsw;
    }
    /**
     * Get the id of the last message in the channel
     *
     * This returns the id of the last message sent in this channel based on twitter's snowflake id system.
     *
     * NOTE: May not point to an existing or valid message
     *
     * @param none
     * 
     * @return integer
     */
    public function getLastMessageId() {
        return $this->last_message_id;
    }
    /**
     * Get the bitrate of the voice channel
     *
     * This returns the bitrate of the channel if it is a voice channel in bits
     *
     * @param none
     * 
     * @return integer
     */
    public function getBitrate() {
        return $this->bitrate;
    }
    /**
     * Get the maximum user count in this channel
     *
     * This returns how many users can be in this channel at most
     *
     * @param none
     * 
     * @return integer
     */
    public function getUserLimit() {
        return $this->user_limit;
    }
    /**
     * Get an array of receipients of the channel
     *
     * This returns an array of user objects representing the receipients of channel messages
     *
     * @param none
     * 
     * @return array
     */
    public function getRecipients() {
        return $this->recipients;
    }
    /**
     * Get the icon hash of the channel
     *
     * This returns the channel's icon hash on discord's CDN
     *
     * @param none
     * 
     * @return string
     */
    public function getIcon() {
        return $this->icon;
    }
    /**
     * Get the id of the channel's owner
     *
     * This returns the id of the channel's owner based on twitter's snowflake id system
     *
     * @param none
     * 
     * @return integer
     */
    public function getOwnerId() {
        return $this->owner_id;
    }
    /**
     * Get the application id of the channel's creator if it is bot created
     *
     * This returns a unique application id of the channel's creator if this channel was created by a bot
     *
     * @param none
     * 
     * @return integer
     */
    public function getApplicationId() {
        return $this->application_id;
    }
    /**
     * Get the id of the parent category of the channel
     *
     * This returns the id of the parent category of the channel
     *
     * @param none
     * 
     * @return integer
     */
    public function getParentId() {
        return $this->parent_id;
    }
}
