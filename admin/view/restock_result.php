<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新結果</title>
  <link rel="stylesheet" href="../view/css/style.css" />
</head>
  <body id="restock_result">
    <div class="row">
      <h1>更新結果</h1>
      <!-- $messagesが定義されていれば -->
      <?php if(isset($messages) === TRUE && $messages !== null): ?>
        <!-- 変更がエラーなくできていれば更新件数と変更完了を表示する -->
        <?php if($add_count > 0): ?>
          <?php foreach($messages as $message): ?>
            <p><?php print $add_count; ?>件の<?php print $message ?></p>
          <?php endforeach ?>
        <!-- エラーが発生していればその件数とエラー内容を表示する -->
        <?php elseif($error_count > 0) : ?>
          <p><?php print $error_count; ?>件のエラーが発生しました</p>
          <?php foreach($messages as $message): ?>
            <p><?php print $message; ?></p>
          <?php endforeach ?>
        <?php endif ?>
      <?php endif ?>
      <p><a href="../controller/restock_operation.php">戻る</a></p>
    </div>
  </body>
</html>
