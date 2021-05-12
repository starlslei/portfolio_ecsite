<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品追加結果</title>
  <link rel="stylesheet" href="../view/css/style.css" />
</head>
  <body id="order">
    <div class="row">
      <table border="1">
        <caption>
          注文履歴
        </caption>
        <tr>
          <th>ユーザーID</th>
          <th>購入者氏名</th>
          <th>カナ</th>
          <th>郵便番号</th>
          <th>住所（県）</th>
          <th>住所（市）</th>
          <th>住所（その他）</th>
          <th>eメールアドレス</th>
          <th>商品ID</th>
          <th>商品名</th>
          <th>購入数</th>
          <th>合計金額</th>
          <th>購入日</th>
        </tr>
        <?php foreach ($order_detes as $order_dete): ?>
          <tr>
            <td><?php print htmlspecialchars($order_dete['user_id']); ?></td>
            <td><?php print htmlspecialchars($order_dete['name_sei']); print htmlspecialchars($order_dete['name_mei']); ?></td>
            <td><?php print htmlspecialchars($order_dete['kana_sei']); print htmlspecialchars($order_dete['kana_mei']); ?></td>
            <td><?php print htmlspecialchars($order_dete['post_num_1']); ?>-<?php print htmlspecialchars($order_dete['post_num_2']); ?></td>
            <td><?php print htmlspecialchars($order_dete['prefecture']); ?></td>
            <td><?php print htmlspecialchars($order_dete['city']); ?></td>
            <td><?php print htmlspecialchars($order_dete['address']); ?></td>
            <td><?php print htmlspecialchars($order_dete['email']); ?></td>
            <td><?php print htmlspecialchars($order_dete['puroduct_id']); ?></td>
            <td><?php print htmlspecialchars($order_dete['item']); ?></td>
            <td><?php print htmlspecialchars($order_dete['number']); ?></td>
            <td><?php print htmlspecialchars($order_dete['price']); ?></td>
            <td><?php print htmlspecialchars($order_dete['date']); ?></td>
          </tr>
        <?php endforeach ?>
      </table>
      <form action="../controller/order_history_operation.php" method="get">
        <label>
          <p>ユーザーID絞り込み</p>
          <input type="number" name="user_id">
        </label>
        <label>
          <p>購入日絞り込み</p>
          <input type="date" name="date">
        </label>
        <label>
          <p>商品絞り込み</p>
          <input type="number" name="item">
        </label>
        <p><input type="submit" value="検索"></p>
        <p><a href="../controller/order_history_operation.php">検索解除</a></p>
      </form>
    </div>
  </body>
</html>
