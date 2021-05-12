<?php
  //DB名等を定数で取得
  require_once('../conf/const.php');
  // // ここからシングルページの性能表とテキスト
    $query = 'SELECT id,item,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related FROM guncuber WHERE id =' . $single_item;
    $link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
    if($link) {
      //文字化け防止
      mysqli_set_charset($link, 'utf8');
      $result = mysqli_query($link, $query);
      if ($result != FALSE) {
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $item = $row['item'];
          $type = $row['type'];
          $price = $row['price'];
          $stock = $row['stock'];
          $difficulty = $row['difficulty'];
          $mg = $row['mg'];
          $size = $row['size'];
          $wight = $row['wight'];
          $feel = $row['feel'];
          $stacker = $row['stacker'];
          $img = $row['img'];
          $text = $row['text'];
          $related = $row['relateds'];
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
