<?php
/**
 * RoleArray.php
 */
namespace Discord\Objects\Role;

use \Discord\Objects\Role\Role;
/**
 * This is a Array of Role Objects. See the Role Object for detailed information.
 */
class RoleArray {

    /** @var object|null Array of Role Objects  */
    public $allroles;

    /**
     * This is the RoleArray Object Constructor
     *
     * This creates a new Array of Roles based on the Array given;
     *
     * @param array $data is an array of roles
     *
     * @return void
     */
    public function __construct($data) {
        $this->allroles = array();
        foreach ($data as $role) {
            $this->allroles[$role['name']] = new Role($role);
        }
    }
    /**
     * Get a Role Object by name
     *
     * Return the Role object of the role with the name given
     *
     * @param string $name the name of the role to return.
     *
     * @return object
     */
    public function getRoleByName($name) {
        return $this->allroles[$name];
    }
    /**
     * Get all Roles as an array
     *
     * Returns all the Roles that are stored
     *
     * @param none
     *
     * @return array
     */
    public function getAllRoles() {
        return $this->allroles;
    }
}
