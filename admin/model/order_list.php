<?php
if($_SERVER['REQUEST_METHOD'] === 'GET') {
  if(isset($_GET['date']) === TRUE && empty($_GET['date']) === FALSE) {
    $wheres[] = 'date = \'' . $_GET['date'] . '\'';
  }
  if(isset($_GET['user_id']) === TRUE && empty($_GET['user_id']) === FALSE) {
    $wheres[] = 'user_id = ' . $_GET['user_id'];
  }
  if(isset($_GET['item']) === TRUE && empty($_GET['item']) === FALSE) {
    $wheres[] = 'item = ' . $_GET['item'];
  }
  //配列２つ目の要素以降に頭文字ANDを付属する。
  if(isset($wheres) === TRUE) {
    $where = ' WHERE ' . implode(' AND ',$wheres);
  }
}
//発注リストと発注者データと商品データを同一テーブルで取得する制御
$query = 'SELECT gp.id,gp.user_id,number,date,name_sei,name_mei,kana_sei,kana_mei
,post_num_1,post_num_2,prefecture,city,address,email,puroduct_id,item,price
FROM guncuber_purchase AS gp
JOIN guncuber_user AS gu ON gp.user_id = gu.id
JOIN guncuber AS g ON gp.puroduct_id = g.id';
if(isset($where) === TRUE) {
  $query = 'SELECT gp.id,gp.user_id,number,date,name_sei,name_mei,kana_sei,kana_mei
  ,post_num_1,post_num_2,prefecture,city,address,email,puroduct_id,item,price
  FROM guncuber_purchase AS gp
  JOIN guncuber_user AS gu ON gp.user_id = gu.id
  JOIN guncuber AS g ON gp.puroduct_id = g.id' . $where;
}
$link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
if($link) {
  //文字化け防止
  mysqli_set_charset($link, 'utf8');
  $result = mysqli_query($link, $query);
  if ($result != FALSE) {
    while($row = mysqli_fetch_array($result)){
      $order_detes[] = $row;
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
