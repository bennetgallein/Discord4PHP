<?php
/**
 * GuildMember.php
 *
 */
namespace Discord\Objects\Guild;
/**
 * GuildMember Object
 * @see https://discordapp.com/developers/docs/resources/guild#guild-member-object
 */

/** @todo make this return a user object */
class GuildMember {

    /** @var object|null The user object of the user */
    public $user;
    /** @var string|null The nickname of the user */
    public $nick;
    /** @var array|null An array of roleid's the user has */
    public $roles;
    /** @var boolean|null ISO8601 timestamp when the user joined (YYYY-MM-DD) */
    public $joined_at;
    /** @var boolean|null Whether the user is deaf or not */
    public $deaf;
    /** @var boolean|null Whether the user is muted or not */
    public $muted;

    /**
     * This is the GuildMember object constructor
     *
     * This creates a new GuildMember object based on the array given.
     *
     * @param array $member is a array of an member object.
     *
     * @return void
     */
    public function __construct($member) {
        $this->user = $member['user'];
        $this->nick = isset($member['nick']) ? $member['nick'] : null; // optional field
        $this->roles = $member['roles'];
        $this->joined_at = $member['joined_at'];
        $this->deaf = $member['deaf'];
        $this->muted = $member['muted'];
    }

    /**
     * Get the User object
     *
     * This returns the object of the user
     *
     * @param none
     *
     * @return object
     */
    public function getUser() {
        return $this->user;
    }
    /**
     * Get the user's nickname
     *
     * This returns the nickname of the user
     *
     * @param none
     *
     * @return string
     */
    public function getNick() {
        return $this->nick;
    }
    /**
     * Get the user's roles
     *
     * This returns an array of role id's which this user has
     *
     * @param none
     *
     * @return array
     */
    public function getRoles() {
        return $this->roles;
    }
    /**
     * Get the timestamp when the user joined (YYYY-MM-DD)
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
     * Get whether the member is deaf or not
     *
     * This returns the boolean if the user is deaf
     *
     * @param none
     *
     * @return boolean
     */
    public function getDeaf() {
        return $this->deaf;
    }
    /**
     *
     * Get whether the member is muted or not
     *
     * This returns the boolean if the user is muted
     *
     * @param none
     *
     * @return boolean
     */
    public function getMuted() {
        return $this->muted;
    }
}
