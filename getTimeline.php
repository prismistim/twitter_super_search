<?php

date_default_timezone_set('Asia/Tokyo');

// 認証情報の読込先
if (getenv('ENV_MODE') === 'dev'){
  require 'oauthLocal.php';
}else{
  require 'oauthServer.php';
}

if (isset($_GET['text'])){
  $searchWords = $_GET['text']; // キーワードを取得

  $tweetsParams = ['screen_name' => $searchWords, 'count' => '10']; // 検索条件を設

  $tweets = $connection->get('statuses/user_timeline', $tweetsParams);

  foreach ($tweets as $value) {
    $text = htmlspecialchars($value->text, ENT_QUOTES, 'UTF-8', false); //特殊文字を変換しながら$textに代入
    disp_tweet($value, $text);
  }
}

function disp_tweet($value, $text){
  $icon_url = $value->user->profile_image_url;
  $icon_url = str_replace('normal', 'bigger', $icon_url); //デフォルトの画像は小さいので大きいものを読み込むため文字を置き換え
  $screen_name = $value->user->screen_name;
  $name = $value->user->name;
  $updated = date('Y/m/d H:i', strtotime($value->created_at));
  $tweet_id = $value->id_str;
  $url = 'https://twitter.com/' . $screen_name . '/status/' . $tweet_id;
  echo '<div class="col-lg-4">';
  echo '<div class="card">' . PHP_EOL;
  echo '<div class="card-body">';
  echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
  echo '<div class="meta"><a class="time" target="_blank" href="' . $url . '">' . $updated . '</a>' . '<br><div class="name">' . $name .'</div><div class="userId">@' . $screen_name . '</div></div>' . PHP_EOL;
  echo '<div class="tweet">' . $text . '</div>' . PHP_EOL;
  echo '</div></div></div>' . PHP_EOL;
}