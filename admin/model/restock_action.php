<?php
//リストック在庫変更ページで入力した値をDBに保存する制御
$add_count = 0;
$error_count = 0;
// DBから商品名を取得
$query = 'SELECT id FROM guncuber';
$link = mysqli_connect(HOST,USERNAME,PASSWD,DBNAME);
if($link) {
  //文字化け防止
  mysqli_set_charset($link, 'utf8');
  $result = mysqli_query($link, $query);
  // 全ての商品IDを取得
  if ($result != FALSE) {
    while($row = mysqli_fetch_array($result)){
      $restock_datas[] = $row['id'];
    }
  } else {
    $messages[] = 'DBの取得に失敗しました';
    $error_count++;
  }
  //結果セットの開放
  mysqli_free_result($result);
  // DBを閉じる
  mysqli_close($link);
} else {
  $messages[] = 'DBへの接続(ID取得)に失敗しました';
  $error_count++;
}
//整合性を保つ為に登録する値はジャンル全て同一数送信されていることを確認
$insert_count = 0;
$type_count = 0;
$price_count = 0;
$stock_count = 0;
foreach($restock_datas as $restock_data) {
  // 送信元と同一のidがDBに存在し尚且つ変更のラジオボタンが選ばれていれば
  if(isset($_POST["id_$restock_data"]) === TRUE && $_POST["id_$restock_data"] !== null && intval($_POST["confirmation_$restock_data"]) === 1 && is_numeric($_POST["id_$restock_data"])) {
    // もし送信されていれば$insertsにアイテム名を代入（$inserts[]は今回更新するアイテムの名前のみになる）
    $inserts_id[] = $_POST["id_$restock_data"];
    $insert_count++;
  }

  // 送信されたtypeが入力されていて尚且つ数値であり　変更するにチェックが入っていたら。
  if(isset($_POST["type_$restock_data"]) && $_POST["type_$restock_data"] !== null && intval($_POST["confirmation_$restock_data"]) === 1 && is_numeric($_POST["type_$restock_data"])) {
    $inserts_type[] = $_POST["type_$restock_data"];
    $type_count++;
  }

  // 送信されたpriceが入力されていて尚且つ数値であり　変更するにチェックが入っていたら。
  if(isset($_POST["price_$restock_data"]) === TRUE && $_POST["price_$restock_data"] !== null && intval($_POST["confirmation_$restock_data"]) === 1 && is_numeric($_POST["price_$restock_data"])) {
    // もし送信されていれば$insertsにアイテム名を代入（$inserts[]は今回更新するアイテムの名前のみになる）
    $inserts_price[] = $_POST["price_$restock_data"];
    $price_count++;
  }

  // 送信されたstockが入力されていて尚且つ数値であり　変更するにチェックが入っていたら。
  if(isset($_POST["stock_$restock_data"]) === TRUE && $_POST["stock_$restock_data"] !== null && intval($_POST["confirmation_$restock_data"]) === 1 && is_numeric($_POST["stock_$restock_data"])) {
    // もし送信されていれば$insertsにアイテム名を代入（$inserts[]は今回更新するアイテムの名前のみになる）
    $inserts_stock[] = $_POST["stock_$restock_data"];
    $stock_count++;
  }
}

$error_count = 0;
$add_count = 0;
// 項目の整合性が保てていればDBを変更
if($insert_count === $stock_count && $insert_count === $type_count && $insert_count === $price_count) {
  $link = mysqli_connect(HOST,USERNAME,PASSWD,DBNAME);
  if($link) {
    //文字化け防止
    mysqli_set_charset($link, 'utf8');
    //トランザクション開始
    mysqli_autocommit($link, false);
    for($i = 0; $i < $insert_count; $i++) {
      $query = 'UPDATE guncuber
                SET type = ' . $inserts_type[$i] . ', price = ' . $inserts_price[$i] . ', stock = ' . $inserts_stock[$i] .
                ' WHERE id = \'' . $inserts_id[$i] . '\'';
      $result = mysqli_query($link, $query);
      // 更新に成功したら追加数をそうでなければエラー数をカウントする
      if ($result != FALSE) {
        $add_count++;
      }
    }
    if (count($messages) === 0) {
        //トランザクション成否判定
        mysqli_commit($link);
        //購入確定メッセージ
        $messages[] = "変更が確定しました";
    //一つでもエラーが発生していたら処理を取り消す
    } else {
        mysqli_rollback($link);
        //購入失敗メッセージ
        $messages[] = "登録失敗ロールバックしました";
        $error_count++;
        $add_count = 0;
    }
  //結果セットの開放
  mysqli_free_result($result);
  // DBを閉じる
  mysqli_close($link);
  } else {
    $messages[] = 'DBへの接続(アップデート)に失敗しました';
    $error_count++;
  }
} else {
  $messages[] = '数値が未入力の箇所があります';
  $error_count++;
}
