<?php
// Azure上で動作させるためのもの
// Azureでは環境変数'ENV_MODE'が記述されていないためifがtrueになる

if (getenv('ENV_MODE') === false){
  require 'TwistOAuth.phar';

  $consumer_key = getenv('consumerKey');
  $consumer_secret = getenv('consumerSecret');
  $access_token = getenv('accessToken');
  $access_secret = getenv('accessSecret');

  $connection = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_secret);
}
?>