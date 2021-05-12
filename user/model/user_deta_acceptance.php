<?php
//登録済みuserをDBより取得するためのmodel
  //DBへのIDその他を取得HOST, USERNAME, PASSWD, DBNAME
  require_once('../conf/const.php');

  $query = 'SELECT id,name_sei,name_mei,kana_sei,kana_mei,post_num_1,post_num_2,prefecture,	city,address,email,password FROM guncuber_user';
  $link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
  if($link) {
  //   //文字化け防止
    mysqli_set_charset($link, 'utf8');
    $result = mysqli_query($link, $query);
    if ($result != FALSE) {
      while($row = mysqli_fetch_array($result)){
        $user_detas[] = $row;
      }
    } else {
      $messages[] = 'ユーザーデータの取得に失敗しました';
    }
  //   //結果セットの開放
    mysqli_free_result($result);
  //   // DBを閉じる
    mysqli_close($link);
  } else {
    $messages[] = 'ユーザーデータDBへの接続に失敗しました';
  }
