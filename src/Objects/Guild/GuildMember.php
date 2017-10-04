<?php
/**
 * Emoji.php
 *
 */
namespace Discord\Objects\Guild;
/**
 * Emoji Object REFERENCE TO DISCORD HERE
 */

/** @todo make this return a user object */
class GuildMember {

    /** @var object|null The user object of the user */
    public $user;
    /** @var string|null the nick of the user */
    public $nick;
    /** @var array|null Array of roleid's the user has */
    public $roles;
    /** @var boolean|null ISO8601 Timestamp when the user joined */
    public $joined_at;
    /** @var boolean|null whether the user is deaf or not */
    public $deaf;
    /** @var boolean|null wether the user is muted or not */
    public $muted;

    /**
     * This is the EGuildMember Object Constructor
     *
     * This creates a new GuildMember Object based on the array given.
     *
     * @param array $member is a array of an member object.
     *
     * @return void
     */
    public function __construct($member) {
        $this->user = $member['user'];
        $this->nick = $member['nick'];
        $this->roles = $member['roles'];
        $this->joined_at = $member['joined_at'];
        $this->deaf = $member['deaf'];
        $this->muted = $member['muted'];
    }

    /**
     * Get the User object
     *
     * Returns the object of the user
     *
     * @param none
     *
     * @return object
     */
    public function getUser() {
        return $this->user;
    }
    /**
     * Get the User's nickname
     *
     * Returns the nickname of the user
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
      * Returns an array of role id's
      *
      * @param none
      *
      * @return array
      */
     public function getRoles() {
         return $this->roles;
     }
     /**
      * Get the timestamp when the user joined
      *
      * Returns the ISO8601 when the member joined at.
      *
      * @param none
      *
      * @return string
      */
      public function getJoinedAt() {
          return $this->joined_at;
      }
      /**
       * Get if member is deaf
       *
       * Returns the boolean if the user is deaf
       *
       * @param none
       *
       * @return boolean
       */
       public function getDeaf() {
           return $this->deaf;
       }
       /**
        * Get if member is muted
        *
        * Returns the boolean if the user is muted
        *
        * @param none
        *
        * @return boolean
        */
        public function getMuted() {
            return $this->muted;
        }
}
