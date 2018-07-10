<?php
// 認証情報の読込先
if (getenv('ENV_MODE') === 'dev'){
  require 'oauthLocal.php';
}else{
  require 'oauthServer.php';
}

if (isset($_GET['test-text'])){

  $searchWords = $_GET['test-text'];

  $options_type = $_GET['options'];

  // キーワードによるツイート検索
  $tweets_params = ['q' => $searchWords ,'count' => '12'];

  swith($options_type){
    case "keyword":
      $tweets = $connection->get('search/tweets', $tweets_params)->statuses;//キーワード検索
      break;
    case "username":
      $tweets = $connection->get('users/search', $tweets_params)->statuses;
      break;
    case　"userId":
      $tweets = $connection->get('users/search', $tweets_params)->statuses;
      break;
  }

  // ニックネームからユーザ情報を取得
  $users_params = ['screen_name' => 'yokoh9'];
  $users = $connection->get('users/show', $users_params);

  foreach ($tweets as $value) {
    swith($options_type){
      case "keyword"://キーワード検索のもろもろ
        $text = htmlspecialchars($value->text, ENT_QUOTES, 'UTF-8', false);
        // 検索キーワードをマーキング
        $keywords = preg_split('/,|\sOR\s/', $tweets_params['q']); //配列化
        foreach ($keywords as $key) {
            $text = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $text);
        }
        // ツイート表示のHTML生成
        disp_tweet($value, $text);//キーワード検索
        break;

      case "username"://ユーザー名検索のもろもろ
        $name = htmlspecialchars($value->name, ENT_QUOTES, 'UTF-8', false);
        $keywords = preg_split('/,|\sOR\s/', $tweets_params['q']); //配列化
        foreach ($keywords as $key) {
            $name = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $name);
        }
        disp_users($value, $name);
        break;

      case　"userId"://ユーザーID検索もろもろ
        $id = htmlspecialchars($value->screen_name, ENT_QUOTES, 'UTF-8', false);
        $keywords = preg_split('/,|\sOR\s/', $tweets_params['q']); //配列化
        foreach ($keywords as $key) {
            $id = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $id);
        }
        disp_users($value, $id);
        break;
    }
  }
}

function disp_tweet($value, $text){
  $icon_url = $value->user->profile_image_url;
  $screen_name = $value->user->screen_name;
  $name = $value->user->name;
  $updated = date('Y/m/d H:i', strtotime($value->created_at));
  $tweet_id = $value->id_str;
  $url = 'https://twitter.com/' . $screen_name . '/status/' . $tweet_id;

  echo '<div class="col-lg-4">';
  echo '<div class="card">' . PHP_EOL;
  echo '<div class="card-body">';
  echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
  echo '<div class="meta"><a class="time" target="_blank" href="' . $url . '">' . $updated . '</a>' . '<br><div class="userId">@' . $screen_name .'</div></div>' . PHP_EOL;
  echo '<div class="tweet">' . $text . '</div>' . PHP_EOL;
  echo '</div></div></div>' . PHP_EOL;
}
function disp_users($value, $name){
  $icon_url = $value->profile_image_url;
  $screen_name = $value->screen_name;
  $user_name = $value->name;
  $updated = date('Y/m/d H:i', strtotime($value->created_at));
  $url = 'https://twitter.com/' . $screen_name;

  if($options_type === "username"&&strpos($user_name,$name) === false)return;
  if($options_type === "userId"&&strpos($scleen_name,$name) === false)return;

  echo '<div class="col-lg-4">';
  echo '<div class="card">' . PHP_EOL;
  echo '<div class="card-body">';
  echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
  echo '<div class="meta"><a class="time" target="_blank" href="' . $url . '">' . $updated . '</a>' . '<br><div class="userId">@' . $screen_name .'</div></div>' . PHP_EOL;
  echo '<div class="tweet">' . $user_name . '</div>' . PHP_EOL;
  echo '</div></div></div>' . PHP_EOL;
}
