<?php
// DBへのIDその他を取得HOST, USERNAME, PASSWD, DBNAME
require_once('../conf/const.php');
// 登録済みユーザーをDBから取得する制御
require_once('../model/user_deta_acceptance.php');
//クッキーをブラウザに保存する制御
require_once('../model/login_cookie.php');
//ユーザーログインする制御
require_once('../model/login_check.php');
//ログイン完了後のページ表示
if(isset($_SESSION['guncuber_id']) === TRUE && isset($_SESSION['guncuber_sei']) === TRUE && isset($_SESSION['guncuber_mei']) === TRUE) {
  if(empty($_SESSION['guncuber_id']) === FALSE && empty($_SESSION['guncuber_sei']) === FALSE && empty($_SESSION['guncuber_mei']) === FALSE) {
    require_once('../view/login_result.php');
    // セッションが空文字の場合ログインエラーページへ
  } else if(empty($_SESSION['guncuber_id']) === TRUE || empty($_SESSION['guncuber_sei']) === TRUE || empty($_SESSION['guncuber_mei']) === TRUE) {
    require_once('../view/login_error.php');
  }
  // セッションが定義されない場合ログインエラーページへ
} else if(isset($_SESSION['guncuber_id']) === FALSE || isset($_SESSION['guncuber_sei']) === FALSE || isset($_SESSION['guncuber_mei']) === FALSE) {
  require_once('../view/login_error.php');
}
