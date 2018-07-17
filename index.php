<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Twitter Super Search</title>

  <!--CSS 読込み-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
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
        <!-- <li class="nav-item">
          <a class="nav-link" href="feeling.php">おもう</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="https://twitter.com/intent/tweet?text=「Twitter Super Search」%0aTwitterの検索をちょっと便利にする(?)Webサービス&url=https://twitter-super-search.herokuapp.com/" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow" class="twitter-link">Share</a>
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
    <h2><i class="fas fa-info-circle"></i>How To Use - つかいかた -</h2>
    <div class="box">
      <div class="imgSection">
        <img class="img-fluid" src="img/sp_screen1.png">
        <img class="img-fluid" src="img/sp_screen2.png">
        <img class="img-fluid" src="img/sp_screen3.png">
      </div>
      <p class="bun">
        普段Twitterの公式クライアントで検索するとこのような画面が出てきますよね？.....<br>
        例えば、推しキャラが同じユーザーを検索したくても、一応「ユーザー」一覧は出てきますが、
        ニックネームが一致したものと、自己紹介の中で一致したもの、場合によってはID(screen_name)
        で一致したもの、それぞれの結果がごっちゃになって出てきます。これでは使いづらい！
      </p>
    </div>
    <div class="box">
      <div class="strong">それを解決するのがこの「Twitter Super Search」</div>
      <img src="img/TSS_screen.png" class="img-fluid">
      <p class="bun">
        Twitter Super Searchは先程の問題を一気に解決します。<br>
        検索フォームの上にあるオプションで、検索の対象を選ぶことが出来ます。
        <ul class="options">
          <li>Option1は検索キーワードがどこに入っているものを表示するかを選ぶことが出来ます</li>
          <li>Option2は検索対象を認証ユーザーと一般ユーザーから選ぶことが出来ます</li>
        </ul>
      </p>
    </div>
    <div class="strong">さあ検索してみましょう！</div>
    <a href="search.php" class="btn btn-outline-danger btn-block" style="margin:20px 0 40px 0;">Twitter Super Searchを使う</a>
  </div>
  <!--js 読込み-->
  <script src="/js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
