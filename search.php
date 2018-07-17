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
    <a class="navbar-brand" href="/index.php">Twitter Super Search</a>
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
          <a class="nav-link" href="https://twitter.com/intent/tweet?text=「Twitter Super Search」%0aTwitterの検索をちょっと便利にする(?)Webサービス&url=https://www.pr.url/&hashtags=タグ,二つ目" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow" class="twitter-link">Share</a>
        </li>
      </ul>
    </div>
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
          <h3>さぁ、検索してみましょう！</h3>
          <!-- http://cccabinet.jpn.org/bootstrap4/components/navs#nav-pills 参照-->
          <form id="myform" action="search.php" method="get">
            <div class="row">
              <div class="col-lg-4 option">
                <h4>Option 1</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-primary active">
                    <input type="radio" name="options" id="option1" autocomplete="off" value="tweets" checked> ツイート
                  </label>
                  <label class="btn btn-outline-primary">
                    <input type="radio" name="options" id="option2" autocomplete="off" value="username"> ユーザー名
                  </label>
                  <label class="btn btn-outline-primary">
                    <input type="radio" name="options" id="option3" autocomplete="off" value="userId"> ユーザーID
                  </label>
                  <label class="btn btn-outline-primary">
                    <input type="radio" name="options" id="option4" autocomplete="off" value="description"> 自己紹介
                  </label>
                </div>
              </div>
              <div class="col-lg-4 option">
                <h4>Option 2</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-primary">
                    <input type="radio" name="suboptions" id="option1" autocomplete="off" value="verified"> 認証ユーザー
                  </label>
                  <label class="btn btn-outline-primary active">
                    <input type="radio" name="suboptions" id="option2" autocomplete="off"　value="on" checked> 一般ユーザー
                  </label>
                </div>
              </div>
              <!-- <div class="col-lg-4 option">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-primary">
                    <input type="radio" name="moreoptions" id="option1" autocomplete="off" value=":)"> ポジティブ
                  </label>
                  <label class="btn btn-outline-primary active">
                    <input type="radio" name="moreoptions" id="option2" autocomplete="off"　value=":("> ネガティブ
                  </label>
                  <label class="btn btn-outline-primary active">
                    <input type="radio" name="moreoptions" id="option2" autocomplete="off"　value="" checked> 指定なし
                  </label>
                </div>
              </div> -->
            </div>
            <div class="form-group">
              <input type="text" name="text" class="form-control" id="example" placeholder="キーワードを入力">
              <div class="serchbtn" style="padding-top:20px;">
                <button type="submit" class="btn btn-outline-danger btn-block">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="result">
      <?php
        echo '<div class="row">';
        require 'getTweet.php';
        echo '</div>';
      ?>
      <!-- <nav aria-label="ページ送りの実例">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="">前へ</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">次へ</a></li>
        </ul>
      </nav> -->
    </div>
  </div>

  <!--js 読込み-->
  <script src="/js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
