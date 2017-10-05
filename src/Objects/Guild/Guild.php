<?php
/**
 * Guild.php
 */
namespace Discord\Objects\Guild;

use \Discord\Objects\Role\RoleArray;
use \Discord\Objects\Emojis\EmojisArray;
use \Discord\Objects\Guild\GuildMemberArray;
use \Discord\Discord;

/**
 * This is the Guild object. See  https://discordapp.com/developers/docs/resources/guild#guild-object for more information.
 */
class Guild {
    /** @todo finish docs here */
    /** @var integer|null the id of the guild */
    public $id;
    /** @var string|null the guilds name*/
    public $name;
    /** @var string|null the guild's icon hash */
    public $icon;
    /** @var string|null the guild's splash hash */
    public $splash;
    /** @var integer|null the id of the guild's owner */
    public $owner_id;
    /** @var string|null the identifier of the voice region */
    public $region;
    /** @var integer|null the id of the afk channel */
    public $afk_channel_id;
    /** @var integer|null the amount of seconds before a user get's moved into the afk channel */
    public $afk_timeout;
    /** @var boolean|null if the guild is embeddable */
    public $embed_enabled;
    /** @var integer|null the id of the embedded channel */
    public $embed_channel_id;
    /** @var integer|null the vertification level needed to chat */
    public $verification_level;
    /** @var integer|null the default message notification level */
    public $default_message_notifications;
    /** @var integer|null the default explicit content filter level */
    public $explicit_content_filter;
    /** @var array|null an array of role objects */
    public $roles;
    /** @var array|null an array of emoji objects */
    public $emojis;
    /** @var array|null array of strings of the guild's features */
    public $features;
    /** @var integer|null returns the required mfa level for the guild */
    public $mfa_level;
    /** @var integer|null apllication of the id of the guild's creator if it is bot created */
    public $application_id;
    /** @var boolean|null returns the boolean wether or not the server widget is enabled */
    public $widget_enabled;
    /** @var integer|null return the channelid for the server widget */
    public $widget_channel_id;
    // belows are only sent with the GUILD_CREATE Event
    /** @var integer|null an ISO8601 Timestamp when the guild was created */
    public $joined_at;
    /** @var boolean|null wether this guild is considert a large guild */
    public $large;
    /** @var boolean|null wether this guild is unavailable or not */
    public $unavailable;
    /** @var integer|null returns the total amount of members */
    public $member_count;
    /** @var array|null array of partical voice state objects */
    public $voice_states;
    /** @var array|null array of guild member objects */
    public $members;
    /** @var array|null array of channel objects */
    public $channels;
    /** @var array|null array of partical presnce update objects */
    public $presences;

    /**
     * Create a new Guild
     *
     * This is a static function to create a new guild.
     *
     * @param array $options an array of options https://discordapp.com/developers/docs/resources/guild#create-guild
     * @param string $token_type the type of the token
     * @param string $token the bot's token.
     *
     * @return object returns a Guild object on success, "failed" on failure.
     *
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
    public function __construct($guildid, $token_type, $token) {

        $ch = curl_init(); //

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
                    $this->channels = $data['channles'];
                    $this->presences = $data['presences'];
                }
            }
        }
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getIcon() {
        return $this->icon;
    }
    public function getSplash() {
        return $this->splash;
    }
    public function getOwnerId() {
        return $this->owner_id;
    }
    public function getRegion() {
        return $this->region;
    }
    public function getAfkChannelId() {
        return $this->afk_channel_id;
    }
    public function getAfkTimeout() {
        return $this->afk_timeout;
    }
    public function getEmbedEnabled() {
        return $this->embed_enabled;
    }
    public function getEmbedChannelId() {
        return $this->embed_channel_id;
    }
    /*
     * @return int 0 - 4
     * https://discordapp.com/developers/docs/resources/guild#guild-object-verification-level
     */
    public function getVertificationLevel() {
        return $this->vertification_level;
    }
    /*
     * @return int 0 or 1
     * https://discordapp.com/developers/docs/resources/guild#guild-object-default-message-notification-level
     */
    public function getDefaultMessageNotifications() {
        return $this->default_message_notifications;
    }
    /*
     * @return int 0 - 2
     * https://discordapp.com/developers/docs/resources/guild#guild-object-explicit-content-filter-level
     */
    public function getExplixitContentFilter() {
        return $this->explicit_content_filer;
    }
    public function getRoles() {
        return $this->roles;
    }
    public function getEmojis() {
        return $this->emojis;
    }
    public function getFeatures() {
        return $this->features;
    }
    /*
     * @return int 0 or 1
     * https://discordapp.com/developers/docs/resources/guild#guild-object-mfa-level
     */
    public function getMFALevel() {
        return $this->mfa_level;
    }
    public function getApplicationId() {
        return $this->application_id;
    }
    public function getWidgetEnabled() {
        return $this->widget_enabled;
    }
    public function getWidgetChannelId() {
        return $this->widget_channel_id;
    }
    public function getJoinedAt() {
        return $this->joined_at;
    }
    public function getLarge() {
        return $this->large;
    }
    public function getUnavailable() {
        return $this->unavailable;
    }
    public function getMemberCount() {
        return $this->member_count;
    }
    public function getVoiceStates() {
        return $this->voice_states;
    }
    public function getMembers() {
        return $this->members;
    }
    public function getChannels() {
        return $this->channels;
    }
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
