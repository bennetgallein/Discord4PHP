<?php
/**
 * Guild.php
 */
namespace Discord\Objects\Guild;

use \Discord\Objects\Role\RoleArray;
use \Discord\Objects\Emojis\EmojisArray;
use \Discord\Objects\Guild\GuildMemberArray;
use \Discord\Objects\Channel\ChannelArray;

use \Discord\Discord;

/**
 * This is the Guild object. Visit the discord API for more information.
 * @see https://discordapp.com/developers/docs/resources/guild#guild-object
 */
class Guild {
    /** @var integer|null The id of the guild */
    public $id;
    /** @var string|null The guild's name*/
    public $name;
    /** @var string|null The guild's icon hash */
    public $icon;
    /** @var string|null The guild's splash hash */
    public $splash;
    /** @var integer|null The id of the guild's owner */
    public $owner_id;
    /** @var string|null The identifier of the voice region */
    public $region;
    /** @var integer|null The id of the afk channel */
    public $afk_channel_id;
    /** @var integer|null The amount of seconds before a user gets moved into the afk channel */
    public $afk_timeout;
    /** @var boolean|null Whether the guild is embeddable */
    public $embed_enabled;
    /** @var integer|null The id of the embedded channel */
    public $embed_channel_id;
    /** @var integer|null The vertification level needed to chat */
    public $verification_level;
    /** @var integer|null The default message notification level */
    public $default_message_notifications;
    /** @var integer|null The default explicit content filter level */
    public $explicit_content_filter;
    /** @var array|null An array of Role objects */
    public $roles;
    /** @var array|null An array of Emoji objects */
    public $emojis;
    /** @var array|null An array of strings of the guild's features */
    public $features;
    /** @var integer|null The required MFA level for the guild */
    public $mfa_level;
    /** @var integer|null The application id of the guild's creator if it is bot created */
    public $application_id;
    /** @var boolean|null Whether or not the server widget is enabled */
    public $widget_enabled;
    /** @var integer|null The channel id for the server widget */
    public $widget_channel_id;
    // belows are only sent with the GUILD_CREATE Event
    /** @var integer|null An ISO8601 timestamp when the guild was created (YYYY-MM-DD) */
    public $joined_at;
    /** @var boolean|null Whether this guild is considered a large guild */
    public $large;
    /** @var boolean|null Whether this guild is unavailable or not */
    public $unavailable;
    /** @var integer|null The total amount of members in this guild */
    public $member_count;
    /** @var array|null An array of partial voice state objects */
    public $voice_states;
    /** @var array|null An array of GuildMember objects */
    public $members;
    /** @var array|null An array of Channel objects */
    public $channels;
    /** @var array|null An array of partial presence update objects */
    public $presences;

    /**
     * Create a new Guild
     *
     * This is a static function to create a new guild.
     *
     * @param array $options an array of guild options
     * @param string $token_type the type of the token
     * @param string $token the bot's token.
     *
     * @return object returns a Guild object on success, "failed" on failure.
     *
     * @see https://discordapp.com/developers/docs/resources/guild#create-guild
     */
    public static function createGuild($options, $token_type, $token) {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => "http://discordapp.com/api/v" . Discord::$apiv . "/guilds",
            CURLOPT_HTTPHEADER     => array('Authorization: ' . $token_type . ' ' . $token),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST, count($options),
            CURLOPT_POSTFIELDS, json_encode($options)
        ));
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);
        if (isset($data['id'])) {
            return new Guild($data['id'], $token_type, $token);
        } else {
            return "failed";
        }
    }
    /**
     * This is the Guild object constructor
     *
     * This creates a new Guild based on a guild id and an authorization token.
     * 
     * @param integer $guildid The id of the guild
     * @param string $token_type The type of the authentication token
     * @param string $token The authentication token
     *
     * @return void
     */
    public function __construct($guildid, $token_type, $token) {
      
        $ch = curl_init();
        
        curl_setopt_array($ch, array(
            CURLOPT_URL => "http://discordapp.com/api/v" . Discord::$apiv . "/guilds/" . $guildid,
            CURLOPT_HTTPHEADER     => array('Authorization: ' . $token_type . ' ' . $token),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);

        if (isset($data['code']) && isset($data['message'])) {
            echo $data['code'] . ": " . $data['message'];
        } else {
            $this->id = $data['id'];
            if (!isset($data['unavailable'])) {
                $this->name = $data['name'];
                $this->icon = $data['icon'];
                $this->splash = $data['splash'];
                $this->owner_id = $data['owner_id'];
                $this->region = $data['region'];
                $this->afk_channel_id = $data['afk_channel_id'];
                $this->afk_timeout = $data['afk_timeout'];
                $this->embed_enabled = $data['embed_enabled'];
                $this->embed_channel_id = $data['embed_channel_id'];
                $this->verification_level = $data['verification_level'];
                $this->default_message_notifications = $data['default_message_notifications'];
                $this->explicit_content_filter = $data['explicit_content_filter'];
                $this->roles = new RoleArray($data['roles']);
                $this->emojis = new EmojisArray($data['emojis']);
                $this->features = $data['features'];
                $this->mfa_level = $data['mfa_level'];
                $this->application_id = $data['application_id'];
                $this->widget_enabled = $data['widget_enabled'];
                $this->widget_channel_id = $data['widget_channel_id'];
                if (isset($data['joined_at'])) {
                    $this->joined_at = $data['joined_at'];
                    $this->large = $data['large'];
                    $this->unavailable = $data['unavailable'];
                    $this->member_count = $data['member_count'];
                    $this->voice_states = $data['voice_states'];
                    $this->members = new GuildMemberArray($data['members']);
                    $this->channels = new ChannelArray($data['channles']);
                    $this->presences = $data['presences'];
                }
            }
        }
    }
    /**
     * Gets the id of the guild
     *
     * This returns a unique guild id based on twitter's snowflake id system
     *
     * @param none
     * 
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    /**
     * Gets the guild's name
     *
     * This returns the guild's display name
     *
     * @param none
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Gets the guild's icon hash
     *
     * This returns the guild's icon hash on discord's CDN
     *
     * @param none
     * 
     * @return string
     */
    public function getIcon() {
        return $this->icon;
    }
    /**
     * Gets the guild's splash hash
     *
     * This returns the guild's splash hash on discord's CDN
     *
     * @param none
     * 
     * @return string
     */
    public function getSplash() {
        return $this->splash;
    }
    /**
     * Gets the id of the guild's owner
     *
     * This returns the id of the guild's owner based on twitter's snowflake id system
     *
     * @param none
     *
     * @return string
     */
    public function getOwnerId() {
        return $this->owner_id;
    }
    /**
     * Gets the identifier of the voice region
     *
     * This returns the guild's voice region unique id
     *
     * @param none
     * 
     * @return string
     */
    public function getRegion() {
        return $this->region;
    }
    /**
     * Gets the id of the afk channel
     *
     * This returns the id of the afk channel based on twitter's snowflake id system
     *
     * @param none
     * 
     * @return integer
     */
    public function getAfkChannelId() {
        return $this->afk_channel_id;
    }
    /**
     * Gets the afk timeout in seconds
     *
     * This returns the amount of seconds before a user gets moved into the afk channel
     *
     * @param none
     * 
     * @return integer
     */
    public function getAfkTimeout() {
        return $this->afk_timeout;
    }
    /**
     * Gets whether the guild is embeddable
     *
     * This returns a boolean if this guild is embeddable (e.g. widget)
     *
     * @param none
     * 
     * @return boolean
     */
    public function getEmbedEnabled() {
        return $this->embed_enabled;
    }
    /**
     * Gets the id of the embedded channel
     *
     * This returns the id of the embedded channel based on twitter's snowflake system
     *
     * @param none
     * 
     * @return integer
     */
    public function getEmbedChannelId() {
        return $this->embed_channel_id;
    }
    /**
     * Gets the verification level needed to chat
     *
     * This returns an integer between 0 and 4 which defines the verification level needed in order to be able to send messages
     * 
     * @param none
     * 
     * @return integer 0 - 4
     * 
     * @see https://discordapp.com/developers/docs/resources/guild#guild-object-verification-level
     */
    public function getVertificationLevel() {
        return $this->vertification_level;
    }
    /**
     * Gets the default message notification level
     *
     * This returns an integer between 0 and 1 which defines the message notification level used when sending a regular message
     *
     * @param none
     * 
     * @return int 0 or 1
     * 
     * @see https://discordapp.com/developers/docs/resources/guild#guild-object-default-message-notification-level
     */
    public function getDefaultMessageNotifications() {
        return $this->default_message_notifications;
    }
    /**
     * Gets the default explicit content filter level
     * 
     * This returns a number between 0 and 2 which defines the explicit content filter level used in this guild
     * 
     * @param none
     * 
     * @return int 0 - 2
     * 
     * @see https://discordapp.com/developers/docs/resources/guild#guild-object-explicit-content-filter-level
     */
    public function getExplixitContentFilter() {
        return $this->explicit_content_filer;
    }
    /**
     * Gets an array of Role objects
     *
     * This returns the roles this guild has as a RoleArray object
     * 
     * @param none
     * 
     * @return array
     *
     * @see RoleArray
     */
    public function getRoles() {
        return $this->roles;
    }
    
    /**
     * Gets an array of Emoji objects
     *
     * This returns the emojis this guild has as an EmojisArray object
     *
     * @param none
     * 
     * @return array
     *
     * @see EmojisArray
     */
    public function getEmojis() {
        return $this->emojis;
    }
    
    /**
     * Gets an array of strings of the guild's features
     *
     * This returns an array of string of all enabled features in this guild
     *
     * @param none
     * 
     * @return array
     */
    public function getFeatures() {
        return $this->features;
    }
    /**
     * Gets the required MFA level of this guild
     *
     * This returns a number between 0 and 1 which defines the MFA level 
     *
     * @param none
     * 
     * @return int 0 or 1
     * 
     * @see https://discordapp.com/developers/docs/resources/guild#guild-object-mfa-level
     */
    public function getMFALevel() {
        return $this->mfa_level;
    }
    /**
     * Gets the application id of the guild's creator if it is bot created
     *
     * This returns a unique application id of the guild's creator if this guild was created by a bot
     *
     * @param none
     * 
     * @return integer
     */
    public function getApplicationId() {
        return $this->application_id;
    }
    /**
     * Gets whether or not the server widget is enabled
     *
     * This returns a boolean if the server widget is enabled
     *
     * @param none
     * 
     * @return boolean
     */
    public function getWidgetEnabled() {
        return $this->widget_enabled;
    }
    /**
     * Gets the channel id for the server widget
     *
     * This returns a unique channel for the server widged based on twitter's snowflake id system
     *
     * @param none
     * 
     * @return integer
     */
    public function getWidgetChannelId() {
        return $this->widget_channel_id;
    }
    /**
     * Gets an ISO8601 timestamp when the guild was created (YYYY-MM-DD)
     *
     * This returns a timestamp string in the YYYY-MM-DD format (ISO8601)
     *
     * @param none
     * 
     * @return string
     *
     * @see https://en.wikipedia.org/wiki/ISO_8601
     */
    public function getJoinedAt() {
        return $this->joined_at;
    }
    /**
     * Gets whether this guild is considered a large guild
     *
     * This returns a boolean if this guild is considered a large guild or not
     *
     * @param none
     * 
     * @return boolean
     */
    public function getLarge() {
        return $this->large;
    }
    /**
     * Gets whether this guild is unavaillable or not
     *
     * This returns a boolean if this guild is unavaillable or not
     *
     * @param none
     * 
     * @return boolean
     */
    public function getUnavailable() {
        return $this->unavailable;
    }
    /**
     * Gets the total amount of members in this guild
     *
     * This returns the amount of members which are in this guild
     *
     * @param none
     * 
     * @return integer
     */
    public function getMemberCount() {
        return $this->member_count;
    }
    /**
     * Gets an array of partial voice state objects
     * 
     * This returns an array of parial voice state objects (without the guild id)
     *
     * @param none
     * 
     * @return array
     */
    public function getVoiceStates() {
        return $this->voice_states;
    }
    /**
     * Gets an array of GuildMember objects
     *
     * This returns an array of members in this guild as a GuildMemberArray object
     *
     * @param none
     * 
     * @return array
     * 
     * @see GuildMemberArray
     */
    public function getMembers() {
        return $this->members;
    }
    /**
     * Gets an array of Channel objects
     *
     * This returns an array of channels in this guild as a ChannelArray
     *
     * @param none
     * 
     * @return array
     *
     * @see ChannelArray
     */
    public function getChannels() {
        return $this->channels;
    }
    /**
     * Gets an array of partial presence update objects
     *
     * This returns an array of presence updates
     *
     * @param none
     * 
     * @return array
     */
    
    /** @todo make this return a presence update array object */
    public function getPresences() {
        return $this->presences;
   }
   public function getIconURL() {
       return "https://cdn.discordapp.com/icons/" . $this->id . "/" . $this->icon . ".png";
   }
   public function getSplashURL() {
       return "https://cdn.discordapp.com/splashes/" . $this->id ."/" . $this->splash . ".png";
   }
}
