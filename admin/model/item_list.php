<?php
//取り扱い商品のリストを取得
$query = 'SELECT item,type,price,stock,img,id FROM guncuber';
$link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
if($link) {
  //文字化け防止
  mysqli_set_charset($link, 'utf8');
  $result = mysqli_query($link, $query);
  if ($result != FALSE) {
    while($row = mysqli_fetch_array($result)){
      $restock_datas[] = $row;
    }
  } else {
    $messages[] = 'DBの取得に失敗しました';
  }
  //結果セットの開放
  mysqli_free_result($result);
  // DBを閉じる
  mysqli_close($link);
} else {
  $messages[] = 'DBへの接続に失敗しました';
}
