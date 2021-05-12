<?php
  // クッキーの有効期限指定用
  $now = time();
  // login.phpから送信るクッキー使用許可のラジオボタンにチェックが入っていれば$_POST['cookie_check']内の文字列cookie_checkを代入
  if (isset($_POST['cookie_chech']) === TRUE) {
    $cookie_chech = $_POST['cookie_chech'];
  } else {
    $cookie_chech = '';
  }
  //ID受け取り
  if(isset($_POST['login_id']) === TRUE && empty($_POST['login_id']) === FALSE) {
    $id = $_POST['login_id'];
    //もしクッキーの使用許可がチェックされていればsetcookieする（ブラウザに保存する）　次回から＄_COOLIE['checked_id']で受け取り可能
    if($cookie_chech === 'checked') {
      $result_id = setcookie('checked_id',$id,$now + 60 * 60 * 24 * 365);
    } else {
      setcookie('checked_id', '', $now - 3600);
    }
  } else {
    $message[] = 'IDが未入力です';
  }

  //パスワード受け取り
  if(isset($_POST['login_passwd']) === TRUE && empty($_POST['login_passwd']) === FALSE) {
    $passwd = $_POST['login_passwd'];
    //もしクッキーの使用許可がチェックされていればsetcookieする（ブラウザに保存する）　次回から＄_COOLIE['checked_passwd']で受け取り可能
    if($cookie_chech === 'checked') {
      $result_passwd = setcookie('checked_passwd',$passwd,$now + 60 * 60 * 24 * 365);
    } else {
      setcookie('checked_passwd', '', $now - 3600);
    }
  } else {
    $message[] = 'パスワードが未入力です';
  }
