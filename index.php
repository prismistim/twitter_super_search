<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Twitter Super Search</title>

  <!--CSS 読込み-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Twitter Super Search</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="search.php">さがす</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://twitter.com/intent/tweet?text=「Twitter Super Search」%0aTwitterの検索をちょっと便利にする(?)Webサービス&url=https://www.pr.url/&hashtags=タグ,二つ目" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow" class="twitter-link">Share</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Twitter Super Search (TSS)</h1>
      <hr>
      <p class="lead">TSSでTwitterで知りたい情報をもっと早く見つけましょう</p>
    </div>
  </div>
  <!-- ここからいじる-->
  <div class="container">
    <h2>How To Use - つかいかた -</h2>
    <div class="imgSection">
      <img class="img-fluid" src="img/sp_screen1.png">
      <img class="img-fluid" src="img/sp_screen2.png">
      <img class="img-fluid" src="img/sp_screen3.png">
    </div>
    <p>普段Twitterの公式クライアントで検索するとこのような画面が出てきますよね？.....</p>
    <p>ユーザーを検索したくてもこれでは使いづらい</p>
    <p style="margin-top:50px;">それを解決するのがこのTwitter Super Search</p>
    <img src="img/TSS_screen.png" style="width:100%;height:auto;">
    <p>Option1は検索キーワードがどこに入っているものを表示するかを選ぶことができます</p>
    <p>Option2は検索対象を認証ユーザーと一般ユーザーから選ぶことができます</p>

    <p style="margin-top:50px;">さあ検索してみましょう</p>
    <div class="abc">
      <a href="search.php">
        <button type="submit" class="btn btn-outline-primary btn-block" style="margin-bottom:50px;">Twitter Super Searchを使う</button>
      </a>
    </div>
  </div>

  <!--js 読込み-->
  <script src="/js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
