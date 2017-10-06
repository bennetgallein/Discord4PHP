<?php
/**
 * EmojisArray.php
 */
namespace Discord\Objects\Emojis;

use \Discord\Objects\Emojis\Emoji;
/**
 * This is an array of Emoji objects. See the Emoji object for detailed information.
 * @see Emoji
 */
class EmojisArray {

    /** @var object|null Array of Emoji Objects */
    public $emojisarray;

    /**
     * This is the EmojiArray object constructor
     *
     * This creates a new array of Emoji objects based on the array given
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
     * Get all Emoji objects as an array
     *
     * Returns all the emojis that are stored
     *
     * @param none
     *
     * @return array
     */
    public function getAllEmojis() {
        return $this->emojisarray;
    }
    /**
     * Get a Emoji object by name
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
