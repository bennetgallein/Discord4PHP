<?php
namespace Discord;

use \Discord\Objects\Guild;

class Discord {

  public $token;

  public function __construct($array) {

    \Discord\OAuth\DefaultScopes::setDefaultScopes(['bot']);

    $provider = new \Discord\OAuth\Discord([
	     'clientId'     => $array['clientId'],
	     'clientSecret' => $array['clientSecret'],
	     'redirectUri'  => $array['redirectUri'],
     ]);

     if (!isset($_GET['code'])) {
	      echo '<a href="'.$provider->getAuthorizationUrl().'">Login with Discord</a>';
      } else {
	       $token = $provider->getAccessToken('authorization_code', [
		         'code' => $_GET['code']
             ]);
           // Get the user object.
           $user = $provider->getResourceOwner($token);
           //echo "<pre>" . var_dump($user) . "</pre><br>";
           // Get the guilds and connections.

           $guildid = $_GET['guild_id'];

           $token_type = "Bot";

           $guild = new Guild($guildid , $token_type, $token);
           echo ($guild->id);
           // Get a refresh token
           /*$refresh = $provider->getAccessToken('refresh_token', [
    	         'refresh_token' => $token->getRefreshToken(),
    	   ]);*/
           //$token = $refresh;
           //$this->$accessToken = $refresh;// Store the new token.
        }
  }
  public function getDiscordAccessToken() {
    return $this->accessToken;
  }
}
