<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品追加結果</title>
  <link rel="stylesheet" href="../view/css/style.css" />
</head>
  <body id="item_add_result">
    <div class="row">
      <h1>商品追加結果</h1>
      <?php if(isset($messages) === TRUE && $messages !== null): ?>
        <?php foreach($messages as $message) : ?>
          <p><?php print $message; ?></p>
        <?php endforeach ?>
      <?php else: ?>
        <p><?php print '取り扱い商品追加成功'; ?></p>
      <?php endif ?>
      <p><a href="../controller/item_add_operation.php">戻る</a></p>
    </div>
  </body>
</html>
