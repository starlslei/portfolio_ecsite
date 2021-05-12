<?php
//購入操作時、値の整合性を確認して購入リストに追加する制御
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['item_id']) === TRUE && empty(intval($_POST['item_id'])) === FALSE) {
    $item_id = $_POST['item_id'];
  } else {
    $messages[] = '不正な操作です';
  }

  if(isset($_POST['purchase_num']) === TRUE && empty(intval($_POST['purchase_num'])) === FALSE) {
    $purchase_num = $_POST['purchase_num'];
  } else {
    $messages[] = '購入数には半角数字を入力してください';
  }
} else {
    $messages[] = '不正な操作です';
}

$date = date("Y/m/d");

  // ここから受取ったデーターをDBに保存及び在庫から減らす制御
  if(isset($messages) === false) {
    //DBの接続情報を取得
    require_once('../conf/const.php');
    $link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
    if($link) {
      //文字化け防止
      mysqli_set_charset($link, 'utf8');
      // トランザクション処理オートコミットオフ
      mysqli_autocommit($link,FALSE);
      //受取った購入データを送信
      $query_buy = 'INSERT INTO guncuber_purchase (user_id,puroduct_id,number,date)
      VALUES (' . $session_id . ',' . $item_id . ',' . $purchase_num . ',\'' . $date . '\')';
      $result_buy = mysqli_query($link, $query_buy);
      // 在庫数を取得できていて尚且つ在庫数が購入数以上の個数なら
    if(isset($stock) === TRUE && intval($stock) >= $purchase_num) {
      // 在庫数から購入数を引いた数をアップデート
        $updete_stock = $stock - $purchase_num;
        $query_stock = 'UPDATE guncuber
        SET stock = ' . $updete_stock . '
        WHERE id = ' . $item_id;
        $result_stock = mysqli_query($link, $query_stock);
    } else {
      $messages[] = '在庫が足りません';
    }
      // 商品の購入と在庫の変更がどちらも成功していたら処理確定
      if($result_buy === TRUE && $result_stock === TRUE ) {
        //処理確定
        mysqli_commit($link);
        $messages[] = '購入リストに追加しました';
      } else {
        //ロールバック
        mysqli_rollback($link);
      }
      // DBを閉じる
      mysqli_close($link);
    } else {
      $messages[] = 'DBへの接続に失敗しました';
    }
  }
