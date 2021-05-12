<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['item-name']) === TRUE && empty($_POST['item-name']) === FALSE) {
    $item = $_POST['item-name'];
  } else {
    $messages[] = '商品名を入力してください';
  }

  if (isset($_POST['type']) === TRUE && empty($_POST['type']) === FALSE) {
    $type = $_POST['type'];
  } else {
    $messages[] = '商品タイプを入力してください';
  }

  if (isset($_POST['price']) === TRUE && empty($_POST['price']) === FALSE) {
    $price = $_POST['price'];
  } else {
    $messages[] = '値段を入力してください';
  }

  if (isset($_POST['stock']) === TRUE && empty($_POST['stock']) === FALSE) {
    $stock = $_POST['stock'];
  } else {
    $messages[] = '在庫を入力してください';
  }

  if (isset($_POST['difficulty']) === TRUE && empty($_POST['difficulty']) === FALSE) {
    $difficulty = $_POST['difficulty'];
  } else {
    $messages[] = '難易度を入力してください';
  }

  if (isset($_POST['mg']) === TRUE && empty($_POST['mg']) === FALSE) {
    $mg = $_POST['mg'];
  } else {
    $messages[] = 'マグネットの有無を入力してください';
  }

  if (isset($_POST['size']) === TRUE && empty($_POST['size']) === FALSE) {
    $size = $_POST['size'];
  } else {
    $messages[] = 'サイズを入力してください';
  }

  if (isset($_POST['wight']) === TRUE && empty($_POST['wight']) === FALSE) {
    $wight = $_POST['wight'];
  } else {
    $messages[] = '重さを入力してください';
  }

  if (isset($_POST['feel']) === TRUE && empty($_POST['feel']) === FALSE) {
    $feel = $_POST['feel'];
  } else {
    $messages[] = '回し心地を入力してください';
  }

  if (isset($_POST['stacker']) === TRUE && empty($_POST['stacker']) === FALSE) {
    $stacker = $_POST['stacker'];
  } else {
    $messages[] = 'ステッカーを入力してください';
  }

  if (isset($_POST['img']) === TRUE && empty($_POST['img']) === FALSE) {
    $img = $_POST['img'];
  } else {
    $messages[] = '画像名を入力してください';
  }

  if (isset($_POST['text']) === TRUE && empty($_POST['text']) === FALSE) {
    $text = $_POST['text'];
  } else {
    $messages[] = 'レビュー文を入力してください';
  }

  if (isset($_POST['related']) === TRUE && empty($_POST['related']) === FALSE) {
    $related = $_POST['related'];
  } else {
    $messages[] = '関連商品のタイプを入力してください';
  }

  if(isset($messages) !== true) {
    $query = 'INSERT INTO guncuber (item,type,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related)
            VALUES (\'' . $item . '\',' . $type . ',' . $price . ',' . $stock . ',' . $difficulty . ',' . $mg . ',\'' . $size . '\',\'' . $wight . '\',' . $feel . ',' . $stacker . ',\'' . $img . '\',\'' . $text . '\',' . $related . ')';

    $link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
    if($link) {
      // 文字化け防止
      mysqli_set_charset($link, 'utf8');
      //商品を追加
      $result = mysqli_query($link,$query);
      if ($result === FALSE) {
        $messages[] = 'DBの追加に失敗しました';
      }
      // DBを閉じる
      mysqli_close($link);
    } else {
      $messages[] = 'DBへの接続に失敗しました';
    }
  }
} else {
  $messages[] = '値がPOSTで送信されていません';
}
