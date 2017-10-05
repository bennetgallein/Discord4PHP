<?php

namespace Discord\Objects\Voice;

use \Discord\Objects\Voice\VoiceRegion;

class VoiceRegionArray {

    public $array;

    public function __construct($data) {
        $this->array = array();
        foreach ($data as $voiceregion) {
            $this->array[$voiceregion['id']] = new VoiceRegion($voiceregion);
        }
    }
    public function getVoiceRegionByID($id) {
        return $this->array[$id];
    }
}
