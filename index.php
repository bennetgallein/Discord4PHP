<?php
namespace Discord;

include_once 'vendor/autoload.php';

use \Discord\Discord;

$token = 'MzY0MzgxMDIyMjM5ODUwNDk3.DLTx_g.Um3SAdZCo7eShZIiaLtyPwN0XSE';

$discord = new Discord(array(
  'clientId'                => '364381022239850497',    // The client ID assigned to you by the provider
  'clientSecret'            => 'zL2FHInhzynyhH3ma2l-jkf9ES_kyZ-e',   // The client password assigned to you by the provider
  'redirectUri'             => 'http://localhost:80/Discord4PHP/'
), $token);
 ?>
