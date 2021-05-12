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
    <body id="access">
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
                        <a href="payment_publish.php">
                            <span class="en">SHOPING&amp;PAYMENT</span>
                            <span class="ja">お支払方法</span>
                        </a>
                    </li>
                    <li>
                        <a href="access_publish.php" id="active">
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
                <p>店舗情報</p>
            </div>
            <div id="main-outer">
                <main>
                    <div class="shop-comment">
                        <h3>GANCuberはキューブパズルの様々なニーズに対応</h3>
                        <p>ＧＡＮＣｕｂｅｒは、キューブパズルを専門に取扱う店舗です。世界チャンピオンが 愛用する最新の競技用モデルから、初心者向けの入門モデル、各トイメーカーから発売される新作キューブ、整備用品や周辺アクセサリー等々幅広く取り扱っております。</p>
                        <p>又、キュービングの普及活動にも力を入れており、定期的に初心者向け講座や店舗大会等 も実施しておりますので是非ご参加ください。 </p>
                    </div>
                    <table>
                        <tr>
                            <th>店舗名</th>
                            <td>GANCuber</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>0834-00-0000</td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>山口県周南市新宿通り2丁目14番地</td>
                        </tr>
                        <tr>
                            <th>営業日時</th>
                            <td>火曜日～日曜日　10:00～19:00　定休日　月曜日・祝日</td>
                        </tr>
                        <tr>
                            <th>駐車場</th>
                            <td>駐車場　2台</td>
                        </tr>
                    </table>
                    <div id="access-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.3706742476243!2d131.7988112152152!3d34.06001098060377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3544e7077a8bc0d7%3A0x5da693a412fd23bf!2z44CSNzQ1LTAwNTYg5bGx5Y-j55yM5ZGo5Y2X5biC5paw5a6_6YCa77yS5LiB55uu77yR77yU!5e0!3m2!1sja!2sjp!4v1591240841449!5m2!1sja!2sjp" width="900" height="640" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
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
