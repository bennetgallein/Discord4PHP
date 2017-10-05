<?php
/**
 * GuildMemberArray.php
 */
namespace Discord\Objects\Guild;

use \Discord\Objects\Guild\GuildMember;
/**
 * The is an array of Guild Member objects
 */

/** @todo make the key the id of the user object */
class GuildMemberArray {

    /** @var array|null array of GuildMember objects */
    public $guildmembers;

    /**
     * This is the GuildMemberArray Object Constructor
     *
     * This creates a new Array of GuildMembers based on the Array given
     *
     * @param array $data is an array of emojis
     *
     * @return void
     */
    public function __construct($data) {
        $this->guildmembers = array();
        foreach ($data as $member) {
            $this->guildmembers[$member['nick']] = new GuildMember($member);
        }
    }
}
