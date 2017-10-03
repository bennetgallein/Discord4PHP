<?php
namespace Discord;

use \Discord\Objects\Guild;

class Discord {

  public $token;

  public function __construct($array, $bottoken) {
      $token = $bottoken;

    \Discord\OAuth\DefaultScopes::setDefaultScopes(['bot']);

    $provider = new \Discord\OAuth\Discord([
	     'clientId'     => $array['clientId'],
	     'clientSecret' => $array['clientSecret'],
	     'redirectUri'  => $array['redirectUri']
     ]);

     if (!isset($_GET['code'])) {
	      echo '<a href="'.$provider->getAuthorizationUrl().'">Login with Discord</a>';
      } else {
	       $code = $provider->getAccessToken('authorization_code', [
		         'code' => $_GET['code']
             ]);
           // Get the user object.
           $user = $provider->getResourceOwner($code);
           //echo "<pre>" . var_dump($user) . "</pre><br>";
           // Get the guilds and connections.

           $guildid = $_GET['guild_id'];

           $token_type = "Bot";

           $refresh = $provider->getAccessToken('refresh_token', [
                 'refresh_token' => $code->getRefreshToken(),
           ]);
           $code = $refresh;

           $guild = new Guild($guildid , $token_type, $token);

           // Get a refresh token

           //$this->$accessToken = $refresh;// Store the new token.
        }
  }
  public function getDiscordAccessToken() {
    return $this->accessToken;
  }
}
