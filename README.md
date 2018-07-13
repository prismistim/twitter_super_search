# twitter_super_search
Twitterの検索がAPIでちょっと便利になるサービスを目指して

## 概要
Twitterの公式クライアント、公式サイトで検索すると、一つの単語で色々引っかかってしまいますよね。
それを便利にしようとする試みが「Twitter Super Seacrh (TSS)」です。TSSは検索したい内容を指定して、簡単に検索することが出来ます。
例えば、「lovelive」と検索しようとして、ユーザー名にloveliveが入っている人を検索したい場合や、単にloveliveがツイート本文に入ったツイートを
検索したい場合など様々あると思いますが、公式サイト・クライアントで検索するとすべての情報が一度に出てしまいます。TSSは検索条件のチェックボックス
にチェックを入れるだけで簡単に別々の検索をすることが出来ます。便利ですね！(?)

## 構成
- [master]正式環境(安定してサービスを提供する場所)
https://twitter-super-search.herokuapp.com/

- [dev]開発環境(動くかどうかなどの確認は以下で行う)
https://twitter-super-search-stg.herokuapp.com/

基本的に自分のブランチで作ったものをサーバーで試したい場合は、devブランチにマージする。masterブランチは安定版を置く場所にする。

- 使用フレームワーク(ライブラリ)
  - Bootstrap4
  - jQuery3.3.1
  - TwistOAuth.phar
- ファイル構成
  - index.php メイン(検索)画面
  - getTweet.php APIを使用しTweetを取得する
  - oauthServer.php サーバー用の認証プログラム
  - oauthLocal.php ひみつ
  - js
    - jquery-3.3.1.min.js ライブラリ
  - css
    - style.css

## 担当(後で消す)
|name|assign|
|:---|:---|
|mura|検索結果のUI制作, 返却値の処理|
|en|ツイート検索の際、ユーザー名から検索するか本文から検索するかを選んで検索できる機能実装|
|kami|検索画面のUI制作, 値を渡す処理|
|wa|ツイート検索の際、認証ユーザーのみのツイートを表示する機能実装|