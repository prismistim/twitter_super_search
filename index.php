<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Twitter Super Search</title>

  <!--CSS 読込み-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Twitter Super Search</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="search.html">さがす</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://twitter.com/intent/tweet?text=「Twitter Super Search」%0aTwitterの検索をちょっと便利にする(?)Webサービス&url=https://www.pr.url/&hashtags=タグ,二つ目" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow" class="twitter-link">Share</a>
      </li>
    </ul>
  </nav>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Search - さがす -</h1>
      <hr>
      <p class="lead">TSSでTwitterで知りたい情報をもっと早く見つけましょう</p>
    </div>
  </div>
  <!-- ここからいじる-->
  <div class="container">
    <div id="search">
      <div class="row">
        <div class="col-lg-12">
          <h2>さぁ、検索してみましょう！</h2>
          <!-- http://cccabinet.jpn.org/bootstrap4/components/navs#nav-pills 参照-->
          <form id="test-form" action="index.php" method="get">
            <div class="form-group">
              <label for="example">テスト用フォーム</label>
              <input type="text" name="test-text" class="form-control" id="example" placeholder="テスト用">
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <h3>Option 1</h3>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-primary">
              <input type="radio" name="options id="option1" autocomplete="off"" checked> ツイート
            </label>
            <label class="btn btn-outline-primary">
              <input type="radio" name="options" id="option2" autocomplete="off"> ユーザー名
            </label>
            <label class="btn btn-outline-primary">
              <input type="radio" name="options" id="option3" autocomplete="off"> ユーザーID
            </label>
          </div>
        </div>

        <div class="col-lg-6">
          <h3>Option 2</h3>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-primary">
              <input type="radio" name="options id="option1" autocomplete="off"" checked> 認証ユーザーのみ
            </label>
            <label class="btn btn-outline-primary">
              <input type="radio" name="options" id="option2" autocomplete="off"> else
            </label>
          </div>
        </div>
        <div class="col-lg-12">
          <div id="search" style="padding-top:20px;">
            <button type="submit" class="btn btn-outline-danger btn-block">Search</button>
          </div>
        </div>
      </div>
    </div>
    <div id="result">
      <?php
        echo '<div class="row">';
        require 'getTweet.php';
        echo '</div>';
      ?>
    </div>
  </div>

  <!--js 読込み-->
  <script src="/js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="/js/oauth.js" type="text/javascript"></script>
  <script src="/js/sha1.js" type="text/javascript"></script>
  <script src="/js/localenv.js" type="text/javascript"></script>
  <script src="/js/getTwits.js" type="text/javascript"></script>
</body>
</html>