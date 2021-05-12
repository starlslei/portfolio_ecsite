<?php
// ログインデータが送信されたら実在するアカウントか検証しログイン又、クッキーの保存をする制御
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['login_id']) === TRUE && empty($_POST['login_id']) === FALSE) {
    $email = $_POST['login_id'];
  } else {
    $messages[] = 'IDを入力してください';
  }
  if(isset($_POST['login_passwd']) === TRUE && empty($_POST['login_passwd']) === FALSE) {
    $passwd = $_POST['login_passwd'];
  } else {
    $messages[] = 'パスワードが送信されていません';
  }
}
//IDとパスワードが送信されていればDBから取得した値と検証しどちらもDB内に同一ユーザーのものとして存在していればそのユーザーのDB上でのユーザー番号を取得
if(isset($email) === TRUE && isset($passwd) === TRUE) {
  foreach($user_detas as $user_deta) {
    if($user_deta['email'] === $email && $user_deta['password'] === $passwd) {
      $user_id = $user_deta['id'];
      $user_name_sei = $user_deta['name_sei'];
      $user_name_mei = $user_deta['name_mei'];
    } else if($user_deta['email'] === $email) {
      $messages[] = 'パスワードが違います';
    } else {
      $messages[] = '登録されていないIDです';
    }
  }
}

// もしDBに存在するユーザーIDとパスワードならセッションを開始する
if(isset($user_id) === TRUE && empty($user_id) === FALSE) {
  if(isset($user_name_sei) === TRUE && empty($user_name_sei) === FALSE) {
    if(isset($user_name_mei) === TRUE && empty($user_name_mei) === FALSE) {
      session_start();
      $_SESSION['guncuber_id'] = $user_id;
      $_SESSION['guncuber_sei'] = $user_name_sei;
      $_SESSION['guncuber_mei'] = $user_name_mei;
    }
  }
}
