<?php
if($_SERVER['REQUEST_METHOD'] === 'GET') {
  //ログインが完了していれば$session_〇〇が定義される
  require_once('../model/settion_acquisition.php');
  //送信されてきたsingle_item_idの値をを受け取り商品詳細をDBより取得する
  if(isset($_GET['single_item_id']) === true && $_GET['single_item_id'] !== null ) {
    $single_item = $_GET['single_item_id'];
    require_once('../model/itemlist-single.php');
  } else {
    $messages[] = '商品詳細IDの取得に失敗しました';
  }
  require_once('../view/product-single.php');
} else {
  $messages = '不正な操作です。';
}
