<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //購入情報が送信されたら会員ログインの状況を確認、整合性を確認し購入者リストに追加する
  // 購入商品のIDが通常通りPOSTで送られてきた場合
  if(isset($_POST['item_id']) === true && $_POST['item_id'] !== null ) {
    //queryの検索条件$single_itemに購入商品のIDを代入
    $single_item = $_POST['item_id'];
    //取り扱い商品のリストから商品詳細を取得（在庫数$stockを使用するので）
    require_once('../model/itemlist-single.php');
  } else {
    $messages[] = '商品詳細IDの取得に失敗しました';
  }
  // ログインされていればDB上からユーザー登録のテーブルのidの値を取得
  require_once('../model/settion_acquisition.php');
  //DB上からユーザー登録のテーブルのidの値を取得できていれば
  if(isset($session_id) === TRUE && empty(intval($session_id)) === FALSE) {
    //発注履歴に保存する制御を実行
    require_once('../model/buy_product.php');
  } else {
    $messages[] = 'ログインしてください';
  }
  require_once('../view/buy_result.php');
}
