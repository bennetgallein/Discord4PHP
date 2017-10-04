<?php
/**
 * Role.php
 */
namespace Discord\Objects\Role;
/**
 *    Role Object. Also see https://discordapp.com/developers/docs/topics/permissions#role-object .
 */
class Role {

    /** @var integer|null The ID of the Role */
    public $id;
    /** @var string|null The Name of the Role */
    public $name;
    /** @var integer|null The color of the Role */
    public $color;
    /** @var boolean|null The boolean if the Role is hoisted */
    public $hoist;
    /** @var integer|null The Position of the Role */
    public $position;
    /** @var integer|null The Permission int of the Role */
    public $permissions;
    /** @var boolean|null The boolean if a Role is managed by a Integration */
    public $managed;
    /** @var boolean|null The boolean if a Role is mentionable */
    public $mentionable;

    /**
     * This is the Role Object Constructor
     *
     * This creates a new Role Object based on the array given.
     *
     * @param array $role is a array of an role objects.
     *
     * @return void
     */
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
    /**
     * Get the Role ID
     *
     * Returns the unique Id for the Role.
     *
     * @param none
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    /**
     * Get the Role name
     *
     * Returns the name for the Role.
     *
     * @param none
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Get the Role Color
     *
     * Returns the color for the Role.
     *
     * @param none
     *
     * @return integer
     */
    public function getColor() {
        return $this->color;
    }
    /**
     * Get if the Role is hoisted
     *
     * Returns the boolean if a group is collected on the side.
     *
     * @param none
     *
     * @return boolean
     */
    public function getHoist() {
        return $this->hoist;
    }
    /**
     * Get the Role Position
     *
     * Returns the posistion of the Role.
     *
     * @param none
     *
     * @return integer
     */
    public function getPosition() {
        return $this->position;
    }
    /**
     * Get the Role Permissions
     *
     * Returns the permission for the Role.
     *
     * @param none
     *
     * @return integer
     */
    public function getPermissions() {
        return $this->permissions;
    }
    /**
     * Get if the Role is managed
     *
     * Returns the boolean if the Role is managed by a integration
     *
     * @param none
     *
     * @return boolean
     */
    public function getManaged() {
        return $this->managed;
    }
    /**
     * Get if the Role is mentionable
     *
     * Returns a boolean if the Role is mentionable
     *
     * @param none
     *
     * @return boolean
     */
    public function getMentionable() {
        return $this->mentionable;
    }
}
