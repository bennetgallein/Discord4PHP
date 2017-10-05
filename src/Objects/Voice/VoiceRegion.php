<?php
namespace Discord\Objects\Voice;

use \Discord\Discord;
use \Discord\Objects\Voice\VoiceRegionArray;

class VoiceRegion {

    public $id;
    public $name;
    public $sample_hostname;
    public $sample_port;
    public $vip;
    public $optimal;
    public $deprecated;
    public $custom;

    public static function loadVoiceRegions($token_type, $token) {
        $returnarray;
        $ch = curl_init(); //

        curl_setopt_array($ch, array(
            CURLOPT_URL => "http://discordapp.com/api/v" . Discord::$apiv . "/voice/regions",
            CURLOPT_HTTPHEADER     => array('Authorization: ' . $token_type . ' ' . $token),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);

        if (isset($data['code']) && isset($data['message'])) {
            echo $data['code'] . ": " . $data['message'];
        } else {
            return new VoiceRegionArray($data);
        }
    }
    public function __construct($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        if (isset($data['sample_hostname'])) {
            $this->sample_hostname = $data['sample_hostname'];
            $this->sample_port = $data['sample_port'];
        }
        $this->vip = $data['vip'];
        $this->optimal = $data['optimal'];
        $this->deprecated = $data['deprecated'];
        $this->custom = $data['custom'];

        return $this;
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getSampleHostname() {
        return $this->sample_hostname;
    }
    public function getSamplePort() {
        return $this->sample_port;
    }
    public function getVIP() {
        return $this->vip;
    }
    public function getOptimal() {
        return $this->optimal;
    }
    public function getDeprecated() {
        return $this->deprecated;
    }
    public function getCustom() {
        return $this->custom;
    }
}
