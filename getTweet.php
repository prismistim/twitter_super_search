<?php
// 認証情報の読込先
if (getenv('ENV_MODE') === 'dev'){
  require 'oauthLocal.php';
}else{
  require 'oauthServer.php';
}

if (isset($_GET['text'])){
  $searchWords = $_GET['text'];
  $tweetsParams = ['q' => $searchWords ,'count' => '9'];
  $optionType = $_GET['options'];
  
  if($optionType == 'tweets'){
    
  }else{
    // $connection->get('やりたい事', 検索条件)でユーザー情報を取得
    $users = $connection->get('users/search', $tweetsParams);

    // このforeachは受け取った値($users)を1つずつ分けて結果を表示する関数に送るためのもの
    foreach ($users as $value) {
      switch ($optionType){
        case 'username':
          if (strpos($value->name, $searchWords) != false){
            disp_users($value, $users); //検索結果を表示する関数に渡す
          }
          break;
        case 'userId':
          // TODO:ここに上と同じように書いて、$value->XXXXXのXXXXXを変える。
          break;
        case 'description':
          // TODO:ここに上と同じように書いて、$value->XXXXXのXXXXXを変える。
          break;
      }
    }
  }
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