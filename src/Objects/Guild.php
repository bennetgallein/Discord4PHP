<?php
namespace Discord\Objects;
/*
    https://discordapp.com/developers/docs/resources/guild#guild-object
*/
use \Discord\Objects\Role\RoleArray;
use \Discord\Objects\Emojis\EmojisArray;
use \Discord\Discord;

class Guild {

    public $id; // guild id @return snowflake
    public $name; // guild name @return string
    public $icon; // icon hash https://discordapp.com/developers/docs/reference#image-formatting @return string
    public $splash; // splash hash https://discordapp.com/developers/docs/reference#image-formatting @return string
    public $owner_id; // id of owner @return snowflake
    public $region; // voice region id @return string
    public $afk_channel_id; // id of afk channel @return snowflake
    public $afk_timeout; // afk timeout in seconds @return integer
    public $embed_enabled; // is this guild embeddable @return boolean
    public $embed_channel_id; // id of embedded channel @return snowflake
    public $verification_level; // level of vertification required for the guild @return integer
    public $default_message_notifications; // default message notifactin level @return integer
    public $explicit_content_filter; // default explicit content filter level @return integer
    public $roles; // roles in a guild @return array of roles objects
    public $emojis; // custom guild emojis @return array of emoji objects
    public $features; // enabled guild features @return array of strings
    public $mfa_level; // required MFA Level for the guild @return integer
    public $application_id; // 	application id of the guild creator if it is bot-created @return ?snowflake
    public $widget_enabled; // whether or not the server widget is enabled @return boolean
    public $widget_channel_id; // the channel id for the server widget @return snowflake
    // belows are only sent with the GUILD_CREATE Event
    public $joined_at; // when this guild was joined at @return ISO8601 timestamp
    public $large; // whether this is considered a large guild @return boolean
    public $unavailable; // is this guild unavailable @return boolean
    public $member_count; // total number of members in this guild @return integer
    public $voice_states; // (without the guild_id key) @return array of partial voice state objects
    public $members; // users in the guild @return array of guild member objects
    public $channels; // channels in the guild @return array of channel objects
    public $presences; // presences of the users in the guild @return array of partial presence update objects

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
                $this->members = $data['members'];
                $this->channels = $data['channles'];
                $this->presences = $data['presences'];
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
}
