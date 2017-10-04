<?php
/**
 * EmojisArray.php
 */
namespace Discord\Objects\Emojis;

use \Discord\Objects\Emojis\Emoji;
/**
 * This is an Array of Emoji Objects. See the Emoji Object for detailed information.
 */
class EmojisArray {

    /** @var object|null Array of Emoji Objects */
    public $emojisarray;

    /**
     * This is the EmojiArray Object Constructor
     *
     * This creates a new Array of Emojis based on the Array given
     *
     * @param array $data is an array of emojis
     *
     * @return void
     */
    public function __construct($data) {
        $this->emojisarray = array();
        foreach ($data as $emoji) {
            $this->emojisarray[$emoji['name']] = new Emoji($emoji);
        }
    }
    /**
     * Get all Emojis as an array
     *
     * Returns all the Emojis that are stored
     *
     * @param none
     *
     * @return array
     */
    public function getAllEmojis() {
        return $this->emojisarray;
    }
    /**
     * Get a Emoji Object by name
     *
     * Return the Emoji object with the name given
     *
     * @param string $name is the emoji to look for.
     *
     * @return array
     */
    public function getEmojiByName($name) {
        return $this->emojisarray[$name];
    }
}
