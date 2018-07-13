<?php
// 認証情報の読込先
if (getenv('ENV_MODE') === 'dev'){
  require 'oauthLocal.php';
}else{
  require 'oauthServer.php';
}

if (isset($_GET['text'])){
  $searchWords = $_GET['text'];
  $tweets_params = ['q' => $searchWords ,'count' => '9'];
  $users = $connection->get('users/search', $tweets_params);

  foreach ($users as $value) {
    $text = htmlspecialchars($value->name, ENT_QUOTES, 'UTF-8', false);
    // 検索キーワードをマーキング
    $keywords = preg_split('/,|\sOR\s/', $tweets_params['q']); //配列化
    foreach ($keywords as $key) {
      $users = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $text);
    }
    // ツイート表示のHTML生成
    disp_users($value, $users);//キーワード検索
  }
}

function disp_users($value, $users){
  $icon_url = $value->profile_image_url;
  $screen_name = $value->screen_name;
  $user_name = $value->name;
  $url = 'https://twitter.com/' . $screen_name;

  echo '<div class="col-lg-4">';
  echo '<div class="card">' . PHP_EOL;
  echo '<div class="card-body">';
  echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
  echo '<div class="meta"><a class="userName" target="_blank" href="' . $url . '">' . $user_name . '</a>' . '<br><div class="userId">@' . $screen_name .'</div></div>' . PHP_EOL;
  echo '</div></div></div>' . PHP_EOL;
}