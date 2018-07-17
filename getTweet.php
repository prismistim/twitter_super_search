<?php

date_default_timezone_set('Asia/Tokyo');
$resultPage = 5;

// 認証情報の読込先
if (getenv('ENV_MODE') === 'dev'){
  require 'oauthLocal.php';
}else{
  require 'oauthServer.php';
}

if (isset($_GET['text'])){
  $searchWords = $_GET['text']; // キーワードを取得
  $optionType = $_GET['options']; // 検索したいものを取得
  $subOptionType = $_GET['suboptions']; // 検索したいもの(認証済みユーザーかそうでないか)を取得２

  $tweetsParams = ['q' => $searchWords,'count' => '25']; // 検索条件を設
  
  if($optionType === 'tweets'){
    // キーワードによるツイート検索
    $tweets = $connection->get('search/tweets', $tweetsParams)->statuses;

    foreach ($tweets as $value) {
      $text = htmlspecialchars($value->text, ENT_QUOTES, 'UTF-8', false); //特殊文字を変換しながら$textに代入
      // 検索キーワードをマーキング
      $keywords = preg_split('/,|\sOR\s/', $tweetsParams['q']); //配列化
      foreach ($keywords as $key) {
          $text = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $text);
      }

      // サブオプションで認証済みかそうでないかを見分ける
      if ($subOptionType === 'verified'){
        if ($value->user->verified === true){
          // var_dump($value->user->verified);
          disp_tweet($value, $text);
        }
      }else{
        if ($value->user->verified === false){
          // var_dump($value->user->verified);
          disp_tweet($value, $text);
        }
      }
    }
  }else{
    // $connection->get('やりたい事', 検索条件)でユーザー情報を取得
    $users = $connection->get('users/search', $tweetsParams);

    // このforeachは受け取った値($users)を1つずつ分けて結果を表示する関数に送るためのもの
    foreach ($users as $value) {
      switch ($optionType){
        case 'username':
          if (strpos($value->name, $searchWords) !== false){
            if ($subOptionType === 'verified'){
              if ($value->verified === true){
                disp_users($value, $users);
              }
            }else{
              if ($value->verified === false){
                disp_users($value, $users);
              }
            }
          }
          break;
        case 'userId':
          if (strpos($value->screen_name, $searchWords) !== false){
            if ($subOptionType === 'verified'){
              if ($value->verified === true){
                disp_users($value, $users);
              }
            }else{
              if ($value->verified === false){
                disp_users($value, $users);
              }
            }
          }
          break;
        case 'description':
          if (strpos($value->description, $searchWords) !== false){
            if ($subOptionType === 'verified'){
              if ($value->verified === true){
                disp_users($value, $users);
              }
            }else{
              if ($value->verified === false){
                disp_users($value, $users);
              }
            }
          }
          break;
      }
    }
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

function disp_users($value, $users){
  $icon_url = $value->profile_image_url;
  $icon_url = str_replace('normal', 'bigger', $icon_url); //デフォルトの画像は小さいので大きいものを読み込むため文字を置き換え
  $screen_name = $value->screen_name;
  $user_name = $value->name;
  $url = 'https://twitter.com/' . $screen_name;
  $description = $value->description;

  echo '<div class="col-lg-4">';
  echo '<div class="card userCard">' . PHP_EOL;
  echo '<div class="card-body">';
  echo '<div class="userThumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
  echo '<div class="userMeta"><a class="userName" target="_blank" href="' . $url . '">' . $user_name . '</a>' . '<br><div class="userId">@' . $screen_name .'</div></div>' . PHP_EOL;
  echo '<div class="description">' . $description . '</div>';
  echo '</div></div></div>' . PHP_EOL;
}