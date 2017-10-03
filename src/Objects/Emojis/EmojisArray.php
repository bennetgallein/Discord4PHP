<?php
namespace Discord\Objects\Emojis;

use \Discord\Objects\Emojis\Emoji;

class EmojisArray {

    public $emojisarray;

    public function __construct($data) {
        $this->emojisarray = array();
        foreach ($data as $emoji) {
            $this->emojisarray[$emoji['name']] = new Emoji($emoji);
        }
    }
    public function getAllEmojis() {
        return $this->emojisarray;
    }
    public function getEmojiByName($name) {
        return $this->emojisarray[$name];
    }
}
