<?php
/**
 * VoiceRegionArray.php
 */
namespace Discord\Objects\Voice;

use \Discord\Objects\Voice\VoiceRegion;

/**
 * This is the VoiceRegionArray class, which contains an array of VoiceRegion objects
 */
class VoiceRegionArray {
    /** @var array|null an array of VoiceRegion Objects */
    public $array;

    /**
     * create new VoiceRegion Objects
     *
     * This constructor creates an array of VoiceRegion objects based on the json-Data given.
     *
     * @param array $data the json data.
     *
     * @return void
     */
    public function __construct($data) {
        $this->array = array();
        foreach ($data as $voiceregion) {
            $this->array[$voiceregion['id']] = new VoiceRegion($voiceregion);
        }
    }
    /**
     * get a voice region by its id
     *
     * This function returns a VoiceRegion object based on the id given in the parameter
     *
     * @param string $id the id of the voice region e.g: "frankfurt"
     *
     * @return object returns a VoiceRegion object
     */
    public function getVoiceRegionByID($id) {
        return $this->array[$id];
    }
}
