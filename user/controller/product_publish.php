<?php
//ログインが完了していれば$session_〇〇が定義される
require_once('../model/settion_acquisition.php');
//公開中の商品を検索条件に依存して配列で取得する
require_once('../model/itemlist.php');
//商品ページ
require_once('../view/product.php');
