<?php
  // DB名等を定数で取得
  require_once('../conf/const.php');

  if(isset($_POST['name-sei']) === TRUE && empty($_POST['name-sei']) === FALSE) {
    $name_sei = $_POST['name-sei'];
  } else {
    $messages[] = '姓を入力してください';
  }

  if(isset($_POST['name-mei']) === TRUE && empty($_POST['name-mei']) === FALSE) {
    $name_mei = $_POST['name-mei'];
  } else {
    $messages[] = '名を入力してください';
  }

  if(isset($_POST['kana-sei']) === TRUE && empty($_POST['kana-sei']) === FALSE) {
    $kana_sei = $_POST['kana-sei'];
  } else {
    $messages[] = 'カナ(姓)を入力してください';
  }

  if(isset($_POST['kana-mei']) === TRUE && empty($_POST['kana-mei']) === FALSE) {
    $kana_mei = $_POST['kana-mei'];
  } else {
    $messages[] = 'カナ（名）入力してください';
  }

  if(isset($_POST['post-num-1']) === TRUE && empty($_POST['post-num-1']) === FALSE) {
    if(preg_match('/[0-9]{3}/',$_POST['post-num-1']) === 1) {
      $post_num_1 = $_POST['post-num-1'];
    } else {
      $messages[] = '郵便番号（３桁）に誤りがあります';
    }
  } else {
    $messages[] = '郵便番号を入力してください';
  }

  if(isset($_POST['post-num-2']) === TRUE && empty($_POST['post-num-2']) === FALSE) {
    if(preg_match('/[0-9]{4}/',$_POST['post-num-2']) === 1) {
      $post_num_2 = $_POST['post-num-2'];
    } else {
      $messages[] = '郵便番号（４桁）に誤りがあります';
    }
  } else {
    $messages[] = '郵便番号を入力してください';
  }

  if(isset($_POST['prefecture']) === TRUE && empty($_POST['prefecture']) === FALSE) {
    if(preg_match('/[0-9]|[0-9]{2}/',$_POST['prefecture']) === 1) {
      $prefecture = $_POST['prefecture'];
    } else {
      $messages[] = '不正な操作です';
    }
  } else {
    $messages[] = '都道府県を選択してください';
  }

  if(isset($_POST['city']) === TRUE && empty($_POST['city']) === FALSE) {
    $city = $_POST['city'];
  } else {
    $messages[] = '市区町村を入力してください';
  }

  if(isset($_POST['address']) === TRUE && empty($_POST['address']) === FALSE) {
    $address = $_POST['address'];
  } else {
    $messages[] = '住所を入力してください';
  }

  if(isset($_POST['email']) === TRUE && empty($_POST['email']) === FALSE) {
    if(preg_match('/[a-z]+[@][a-z]+/',$_POST['email']) === 1) {
      $email = $_POST['email'];
    } else {
      $messages[] = 'Eメールアドレスの形式になっていません';
    }
  } else {
    $messages[] = 'Eメールアドレスを入力してください';
  }

  if(isset($_POST['product']) === TRUE && empty($_POST['product']) === FALSE) {
    $product = $_POST['product'];
  } else {
    $messages[] = 'サービス名又は商品名を入力してください';
  }

  if(isset($_POST['contact-text']) === TRUE && empty($_POST['contact-text']) === FALSE) {
    $contact_text = $_POST['contact-text'];
  } else {
    $messages[] = 'お問い合わせ内容を入力してください';
  }


  // ここから問合せ内容をDBに追加する制御
  if(isset($messages) === false) {
    $link = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
    if($link) {
      //文字化け防止
      mysqli_set_charset($link, 'utf8');
      $query = 'INSERT INTO guncuber_contact (name_sei,name_mei,kana_sei,kana_mei,post_num_1,post_num_2,prefecture,city,address,email,product,contact_text) VALUES (\'' . $name_sei . '\',\'' . $name_mei . '\',\'' . $kana_sei . '\',\'' . $kana_mei . '\',\'' . $post_num_1 . '\',\'' . $post_num_2 . '\',' .  $prefecture . ',\'' . $city . '\',\'' . $address . '\',\'' . $email . '\',\'' . $product . '\',\'' . $contact_text . '\')';
      $result = mysqli_query($link, $query);
      //結果セットの開放
      mysqli_free_result($result);
      // DBを閉じる
      mysqli_close($link);
    } else {
      $messages[] = 'DBへの接続に失敗しました';
    }
  } else {
      $messages[] = '必須項目が未入力です';
  }
