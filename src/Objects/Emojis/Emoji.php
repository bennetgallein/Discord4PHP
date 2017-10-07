<?php
/**
 * Emoji.php
 */
namespace Discord\Objects\Emojis;
/**
 * This is the Emoji object. Visit the discord API for more information.
 * @see https://discordapp.com/developers/docs/resources/emoji#emoji-object
 */
class Emoji {

    /** @var integer|null The ID of the emoji */
    public $id;
    /** @var string|null The Name of the emoji */
    public $name;
    /** @var array|null Array of roleid's whom are whitelisted to use it */
    public $roles;
    /** @var boolean|null Whether this emoji must be wrapped in colons */
    public $require_colons;
    /** @var boolean|null Whether this emoji is managed by an integration */
    public $managed;

    /**
     * This is the Emoji object constructor
     *
     * This creates a new Emoji object based on the array given.
     *
     * @param array $emoji is a array of an emoji objects.
     *
     * @return void
     */
    public function __construct($emoji) {
        $this->id = $emoji['id'];
        $this->name = $emoji['name'];
        $this->roles = $emoji['roles'];
        $this->require_colons = $emoji['require_colons'];
        $this->managed = $emoji['managed'];
    }
    /**
     * Get the Emoji ID
     *
     * Returns the unique ID for the Emoji
     *
     * @param none
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    /**
     * Get the Emoji's name
     *
     * Returns the name of the Emoji
     *
     * @param none
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Get the roles that are whitelisted
     *
     * This returns an array of role ids which are allowed to use this emoji.
     *
     * @param none
     *
     * @return array
     */
    public function getRoles(){
        return $this->roles;
    }
    /**
     * Get the boolean if the emoji requires colons
     *
     * This returns a boolean if the emoji needs to wrapped in ":"
     *
     * @param none
     *
     * @return boolean
     */
    public function getRequireColons() {
        return $this->require_colons;
    }
    /**
     * Get the boolean if the emoji is managed
     *
     * This returns a boolean if the emoji is managed by an integration
     *
     * @param none
     *
     * @return boolean
     */
    public function getManaged() {
        return $this->managed;
    }
    /**
     * Get the emoji URL
     *
     *  This returns the complete URL of the emoji on the discord CDN
     *
     * @param none
     *
     * @return string
     */
     public function getURL() {
         return "https://cdn.discordapp.com/emojis/" . $this->id . ".png";
     }
}
