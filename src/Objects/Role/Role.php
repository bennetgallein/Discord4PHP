<?php
namespace Discord\Objects\Role;
/*
    https://discordapp.com/developers/docs/topics/permissions#role-object
*/

class Role {

    public $id; // role id @return int
    public $name; // role name @return string
    public $color; // role color @return int (hex)
    public $hoist; // if this role is pinned in the user listing @return boolean
    public $position; // position of this rol @return int
    public $permissions; // permission bit set @integer
    public $managed; // whether this role is managed by an integration @return boolean
    public $mentionable; // whether this role is mentionable @return boolean

    public function __construct($role) {
        $this->id = $role['id'];
        $this->name = $role['name'];
        $this->color = $role['color'];
        $this->hoist = $role['hoist'];
        $this->position = $role['position'];
        $this->permissions = $role['permissions'];
        $this->managed = $role['managed'];
        $this->mentionable = $role['mentionable'];
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getColor() {
        return $this->color;
    }
    public function getHoist() {
        return $this->hoist;
    }
    public function getPosition() {
        return $this->position;
    }
    public function getPermissions() {
        return $this->permissions;
    }
    public function getManaged() {
        return $this->managed;
    }
    public function getMentionable() {
        return $this->mentionable;
    }
}
