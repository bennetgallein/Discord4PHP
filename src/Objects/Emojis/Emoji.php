<?php
namespace Discord\Objects\Emojis;

class Emoji {

    public $id; // emoji id @return snowflake
    public $name; // emoji name @return string
    public $roles; // roles this emoji is whitelisted to @return array of roleid's
    public $require_colons; // whether this emoji must be wrapped in colons @return boolean
    public $managed; // whether this emoji is managed @return boolean

    public function __construct($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->roles = $data['roles'];
        $this->require_colons = $data['require_colons'];
        $this->managed = $data['managed'];
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getRoles(){
        return $this->roles;
    }
    public function getRequireColons() {
        return $this->require_colons;
    }
    public function getManaged() {
        return $this->managed;
    }
}
