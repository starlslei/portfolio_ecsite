<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>在庫数及び販売金額変更</title>
    <link rel="stylesheet" href="../view/css/style.css">
  </head>
  <body id="restock">
    <div class="row">
      <h1>在庫数及び販売金額変更</h1>
      <table border="1">
          <form action="../controller/restock_result_operation.php" method="post">
            <?php foreach ($restock_datas as $restock_data): ?>
              <?php $count = 0; ?>
              <tr>
                <th>商品画像</th>
                <th>商品名</th>
                <th>商品分類</th>
                <th>商品価格</th>
                <th>商品在庫数</th>
                <th colspan="2">変更確認</th>
              </tr>
              <tr>
                <td>
                  <img src="../view/images/item/<?php print htmlspecialchars ($restock_data[4]) ?>" alt="<?php print htmlspecialchars ($restock_data[0]) ?>" height="100" width="100">
                </td>
                <td>
                  <p><?php print htmlspecialchars ($restock_data[0])?></p>
                  <input type="hidden" name="id_<?php print htmlspecialchars ($restock_data[5])?>" value="<?php print htmlspecialchars ($restock_data[5])?>">
                </td>
                  <td>
                    <!-- セレクタを作成DBのtypeと同一のものがselectedされる -->
                    <select name="type_<?php print htmlspecialchars ($restock_data[5]) ?>">
                      <?php if(intval($restock_data[1]) === 1) : ?>
                          <option value="1" selected>3x3x3</option>
                      <?php else: ?>
                          <option value="1">3x3x3</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 2) : ?>
                          <option value="2" selected>4x4x4</option>
                      <?php else: ?>
                          <option value="2">4x4x4</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 3) : ?>
                          <option value="3" selected>5x5x5</option>
                      <?php else: ?>
                          <option value="3">5x5x5</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 4) : ?>
                          <option value="4" selected>ピラミンクス</option>
                      <?php else: ?>
                          <option value="4">ピラミンクス</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 5) : ?>
                          <option value="5" selected>メガミンクス</option>
                      <?php else: ?>
                          <option value="5">メガミンクス</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 6) : ?>
                          <option value="6" selected>スキューブ</option>
                      <?php else: ?>
                          <option value="6">スキューブ</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 7) : ?>
                          <option value="7" selected>ボイドキューブ</option>
                      <?php else: ?>
                          <option value="7">ボイドキューブ</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 8) : ?>
                          <option value="8" selected>GIOキューブ</option>
                      <?php else: ?>
                          <option value="8">GIOキューブ</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 9) : ?>
                          <option value="9" selected>ミラーブロックス</option>
                      <?php else: ?>
                          <option value="9">ミラーブロックス</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 10) : ?>
                          <option value="10" selected>その他のキューブ</option>
                      <?php else: ?>
                          <option value="10">その他のキューブ</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 11) : ?>
                          <option value="11" selected>整備用工具</option>
                      <?php else: ?>
                          <option value="11">整備用工具</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 12) : ?>
                          <option value="12" selected>オイル</option>
                      <?php else: ?>
                          <option value="12">オイル</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 13) : ?>
                          <option value="13" selected>スタックタイマー</option>
                      <?php else: ?>
                          <option value="13">スタックタイマー</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 14) : ?>
                          <option value="14" selected>ステッカー</option>
                      <?php else: ?>
                          <option value="14">ステッカー</option>
                      <?php endif ?>

                      <?php if(intval($restock_data[1]) === 15) : ?>
                          <option value="15" selected>アクセサリーその他</option>
                      <?php else: ?>
                          <option value="15">アクセサリーその他</option>
                      <?php endif ?>
                    </select>
                  </td>
                <td>
                  <input type="number" name="price_<?php print htmlspecialchars ($restock_data[5]) ?>" value="<?php print htmlspecialchars ($restock_data[2]) ?>">
                </td>
                <td>
                  <input type="number" name="stock_<?php print htmlspecialchars ($restock_data[5]) ?>" value="<?php print htmlspecialchars ($restock_data[3]) ?>">
                </td>
                <td>
                  <label><input type="radio" name="confirmation_<?php print htmlspecialchars ($restock_data[5]) ?>" value="1">変更する</label>
                </td>
                <td>
                  <label><input type="radio" name="confirmation_<?php print htmlspecialchars ($restock_data[5]) ?>" value="2" checked>変更しない</label>
                </td>
              </tr>
            <?php endforeach ?>
            <input type="submit" value="送信" />
          </form>
        </tr>
      </table>
    </div>
  </body>
</html>
