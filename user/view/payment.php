<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>お支払い方法について｜GANCuber</title>
        <link rel="stylesheet" href="../view/css/normalize.css">
        <link rel="stylesheet" href="../view/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script>
            $(document).ready(function(){
                // スライダーの動作
              $('.slider').bxSlider();

              // ホバー時のアニメーション（グラデーション）
              $('.blog-outer').on({
                  'mouseenter': function() {
                      $('.blog-cubeimg').toggleClass('cube');
                  },
                  'mouseleave': function() {
                      $('.blog-cubeimg').toggleClass('cube');
                  }
              })

              $('.news-outer').on({
                  'mouseenter': function() {
                      $('.news-cubeimg').toggleClass('cube');
                  },
                  'mouseleave': function() {
                      $('.news-cubeimg').toggleClass('cube');
                  }
              })

                //レスポンシブ時のグローバルナビゲーション表示操作
                $('#nav_button').on('click', function(){
                    $('#global').toggleClass('active');
              　});

                $('#product-nav-button').on('click', function(){
                    $('.product-nav').toggleClass('active');
              　});

            });
        </script>
    </head>
    <body id="payment">
        <header>
            <div class="row">
                <h1><a href="index_publish.php"><img src="../view/images/logo/logo.jpg" alt="gancuber"></a></h1>
                <div class="logout_user_name">
                    <?php if(isset($session_sei) === TRUE && isset($session_mei) === TRUE) : ?>
                        <p class="logout"><a href="../controller/logout_publish.php">ログアウト</a></p>
                        <p class="user_name">
                          <?php print htmlspecialchars($session_sei); ?>
                          <?php print htmlspecialchars($session_mei); ?>
                          さん
                        </p>
                    <?php else: ?>
                        <p class="login"><a href="../controller/login_publish.php">ログイン</a></p>
                    <?php endif ?>
                </div>
                <div id="nav_button"></div>
            </div>
        </header>
        <div class="row">
            <nav id="global">
                <ul>
                    <li>
                        <a href="index_publish.php">
                            <span class="en">HOME</span>
                            <span class="ja">ホーム</span>
                        </a>

                    </li>
                    <li>
                        <a href="product_publish.php">
                            <span class="en">ONLINESHOP</span>
                            <span class="ja">ショップ</span>
                        </a>
                    </li>
                    <li>
                        <a href="payment_publish.php" id="active">
                            <span class="en">SHOPING&amp;PAYMENT</span>
                            <span class="ja">お支払方法</span>
                        </a>
                    </li>
                    <li>
                        <a href="access_publish.php">
                            <span class="en">ACCESS</span>
                            <span class="ja">店舗情報</span>
                        </a>
                    </li>
                    <li>
                        <a href="solution_publish.php">
                            <span class="en">SOLUTION</span>
                            <span class="ja">解法紹介</span>
                        </a>
                    </li>
                    <li>
                        <a href="contact_publish.php">
                            <span class="en">CONTSCT</span>
                            <span class="ja">お問合せ</span>
                        </a>
                    </li>
                </ul>
                <!-- ここからログイン又はログアウトボタンを表示する制御 -->
                <div class="logout_responsive">
                  <?php if(isset($session_sei) === TRUE && isset($session_mei) === TRUE) : ?>
                    <p class="logout"><a href="../controller/logout_publish.php">ログアウト</a></p>
                    <p class="user_name">
                      <?php print htmlspecialchars($session_sei); ?>
                      <?php print htmlspecialchars($session_mei); ?>
                      さん
                    </p>
                  <?php else: ?>
                    <p class="login"><a href="../controller/login_publish.php">ログイン</a></p>
                  <?php endif ?>
                </div>
            </nav>
            <div class="top-img">
                <img src="../view/images/logo/topimg2.jpg" alt="お取引に関して">
                <p>お取引に関して</p>
            </div>
            <div id="main-outer">
                <main>
                    <table>
                        <caption>お支払い方法</caption>
                        <tr>
                            <th>商品代引き</th>
                            <td>ヤマト運輸宅急便コレクトにて発送させて頂きます。ヤマト運輸配達員がお伺いし、商品代金（現金）と引き換えに商品をお渡し致します。<br>
                            お届け時カード払いをご希望のお客様は、「商品代引(お届け時カード払い)」をご選択ください。
                            </td>
                        </tr>
                        <tr>
                            <th>
                                商品代引き<br>（お届け時カード支払い）
                            </th>
                            <td>
                                ヤマト運輸宅急便コレクトにて発送させて頂きます。<br>お届け時にクレジットカードでのお支払いをご希望のお客様はこちらをご選択ください。
                            </td>
                        </tr>
                    </table>
                    <table>
                        <caption>発送方法・お支払い方法について</caption>
                        <tr>
                            <th>ヤマト輸送</th>
                            <td>お買い上げ合計金額が税込11,000円以上の場合は、送料無料となります。(北海道、沖縄を除く）
                                ※北海道・沖縄の場合でも、オーダーフォーム・自動返信のご注文確認メールには送料無料と表示されますが、別途送料を上乗せしたお見積りメールを送らさせて頂いております。ご了承下さいませ。<br>
                                《11,000円未満の場合の送料》<br>
                                【北海道】北海道2,100円<br>
                                【東北】青森円1,030円、岩手県1,030円、秋田県1,030円、<br>
                                宮城県1,030円、山形県1,030円、福島県1,030円<br>
                                【関東】茨城県830円、栃木県830円、群馬県830円、埼玉県830円、<br>
                                千葉県830円、東京都830円、神奈川県830円<br>
                                【信越】長野県920円、新潟県920円<br>
                                【北陸】富山県860円、石川県860円、福井県860円<br>
                                【中部】静岡県860円、山梨県860円、愛知県860円、岐阜県860円<br>
                                【関西】三重県630円、和歌山県630円、滋賀県630円、奈良県630円、<br>
                                京都府630円、大阪府630円、兵庫県630円<br>
                                【中国】岡山県630円、広島県630円、鳥取県630円、島根県630円、<br>
                                山口県614円<br>
                                【四国】香川県810円、徳島県810円、愛媛県810円、高知県810円<br>
                                【九州】福岡県630円、佐賀県630円、長崎県630円、大分県630円、<br>
                                熊本県630円、宮崎県630円、鹿児島県630円<br>
                                【沖縄】沖縄県2,700円
                            </td>
                        </tr>
                    </table>
                    <table class="single-table">
                        <caption>包装について</caption>
                        <tr>
                            <td>
                                <h4>梱包およびラッピングについて</h4>
                                <p>限りある資源を大切にしたいという気持ちから、過剰包装をさけるため、梱包材（ダンボールなど）は、再利用させていただく場合があります。弊社ではギフトラッピングには対応しておりませんので、あしからずご了承ください。</p>
                            </td>
                        </tr>
                    </table>
                    <table class="last-table">
                        <tr>
                            <th>お支払い方法について</th>
                            <th>配送方法料金について</th>
                        </tr>
                        <tr>
                            <td>
                                お支払総額は以下の通りです。<br>
                                お支払総額： 商品代金合計（税込） ＋ 送料（税込） （＋ 代引き手数料(税込)）<br>
                                ※当店では、消費税(10％)を含んだ価格表示を行っております。<br>
                                ※消費税の端数は切り捨てで計算しております。
                            </td>
                            <td>
                                クロネコヤマト宅急便コレクト<br>（代金引換／お届け時カード払い）
                            </td>
                        </tr>
                    </table>
                </main>
            </div>
        </div>
        <footer>
            <div class="row">
                <ul>
                    <li><a href="access_publish.php">店舗情報</a></li>
                    <li><a href="privacy_publish.php">プライバシー・ポリシー</a></li>
                </ul>
                <p><small>&copy;GANCuber　CopyRight</small></p>
            </div>
        </footer>
    </body>
</html>
