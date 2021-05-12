<?php
  //DB接続用のID等を定数で取得
  require_once('../conf/const.php');
  //商品のリストを取得
  // それぞれ選択したnav（商品の絞り込み）に応じてqueryを変更する
  if (isset($_GET['nav_id']) === TRUE && empty($_GET['nav_id']) === FALSE ) {
    $nav_num = $_GET['nav_id'];
    $query = 'SELECT id, item,type,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related FROM guncuber WHERE type =' . $nav_num;
    // ページ移動の際に検索解除されないように検索フラグ定義の有無で検証 サーチフラグが定義されていればリンクurlに&nav_id=1を付ける
    $search_flag = '&nav_id=' . $nav_num;
  } else if (isset($_GET['nav_difficulty_id']) === TRUE && empty($_GET['nav_difficulty_id']) === FALSE ) {
    $nav_num = $_GET['nav_difficulty_id'];
    $query = 'SELECT id,item,type,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related FROM guncuber WHERE difficulty =' . $nav_num;
    // ページ移動の際に検索解除されないように検索フラグ定義の有無で検証 サーチフラグが定義されていればリンクurlに&nav_difficulty_id=1を付ける
    $search_flag = '&nav_difficulty_id=' . $nav_num;
  } else if (isset($_GET['nav_stacker_id']) === TRUE && empty($_GET['nav_stacker_id']) === FALSE ) {
    $nav_num = $_GET['nav_stacker_id'];
    $query = 'SELECT id,item,type,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related FROM guncuber WHERE stacker =' . $nav_num;
    $search_flag = '&nav_stacker_id=' . $nav_num;
  } else if (isset($_GET['nav_mg_id']) === TRUE && empty($_GET['nav_mg_id']) === FALSE ) {
    $query = 'SELECT id,item,type,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related FROM guncuber WHERE mg = 1';
    // ページ移動の際に検索解除されないように検索フラグ定義の有無で検証 サーチフラグが定義されていればリンクurlに&nav_mg_id=1を付ける
    $search_flag = '&nav_mg_id=1';
  } else {
    $query = 'SELECT id,item,type,price,stock,difficulty,mg,size,wight,feel,stacker,img,text,related FROM guncuber';
  }
  $link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
  if($link) {
    //文字化け防止
    mysqli_set_charset($link, 'utf8');
    $result = mysqli_query($link, $query);
    if ($result != FALSE) {
      while($row = mysqli_fetch_array($result)){
        if ($row['stock'] > 0) {
          $ids[] = $row['id'];
          $items[] = $row['item'];
          $types[] = $row['type'];
          $prices[] = $row['price'];
          $stocks[] = $row['stock'];
          $difficultys[] = $row['difficulty'];
          $mgs[] = $row['mg'];
          $sizes[] = $row['size'];
          $wights[] = $row['wight'];
          $feels[] = $row['feel'];
          $stackers[] = $row['stacker'];
          $imgs[] = $row['img'];
          $texts[] = $row['text'];
          $relateds[] = $row['relateds'];
        }
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

  // ここからページング
  if($items >= 1) {
    // desineは定数を定義する関数　定数MAXを値6で定義している　１ページの商品表示数は6にするのでMAX　6　にしている
    define('MAX','6');
    // 商品数を取得
    $items_num = count($items);
    // 商品数を1ページの表示数で割り小数点以下を切り上げする事で必要ページ数を割り出す
    $max_page = ceil($items_num / MAX);

    // 現在表示しているページが＄_GETで定義されていないなら1ページ目を表示
    if(isset($_GET['page_id']) === false) {
      $now_page = 1;
      // 定義されているならそのページを現在ページの数に代入
    } else {
      $now_page = $_GET['page_id'];
    }

    // ページ上の商品を取得開始するのは配列のどこからか　現在ページから1引いた値に１ページの表示数である6を掛けた番目の配列から取得開始
    $start_num = ($now_page - 1) * MAX;

    // ページに表示する商品を配列から取得　array_sliceは、$items配列の$start_num番目からMAX（今回は6つ）のみを取得する関数　　あとはこの変数$page_item_numをforeachでhtmlに表示すれば良い
    $page_item_num = array_slice($items, $start_num, MAX, true);

    // ページリンクの表示は$max_pageの数になるまでfor文でリンクを繰り返し表示すればよい
  }
