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
    <body id="solution">
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
                        <a href="access_publish.php">
                            <span class="en">ACCESS</span>
                            <span class="ja">店舗情報</span>
                        </a>
                    </li>
                    <li>
                        <a href="solution_publish.php" id="active">
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
            <div id="main-outer">
                <main>
                    <h2>ルービックキューブLBL解法紹介</h2>
                    <section>
                        <h3>T-perm</h3>
                        <div class="explanatory-text">
                            <img src="../view/images/solution/perm/t-perm.jpg">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Hrawdxn4Lao" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="rotation-symbol">R U R’ U’ R’ F R2 U’ R’ U’ R U R’ F</div>
                        </div>
                    </section>
                    <section>
                        <h3>U-perma</h3>
                        <div class="explanatory-text">
                            <img src="../view/images/solution/perm/u-perma.jpg">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/6NvmCTxKGjQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="rotation-symbol">R U' R U R U R U' R' U' R2 </div>
                        </div>
                    </section>

                    <section>
                        <h3>U-permb</h3>
                        <div class="explanatory-text">
                            <img src="../view/images/solution/perm/u-permb.jpg">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/uyiMPF0HQs0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="rotation-symbol">R2 U R U R' U' R' U' R' U R'</div>
                        </div>
                    </section>
                    <section>
                        <h3>R-perma</h3>
                        <div class="explanatory-text">
                            <img src="../view/images/solution/perm/R-perma.jpg">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/T_EMIcmO67k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="rotation-symbol">L U2 L' U2 L F' L' U' L U L F L2 U</div>
                        </div>
                    </section>
                    <section>
                        <h3>R-permb</h3>
                        <div class="explanatory-text">
                            <img src="../view/images/solution/perm/R-permb.jpg">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/W42X2Uw4JpM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="rotation-symbol">R' U2 R U2 R' F R U R' U' R' F' R2' U'</div>
                        </div>
                    </section>
                    <section>
                        <h3>H-perm</h3>
                        <div class="explanatory-text">
                            <img src="../view/images/solution/perm/h-perm.jpg">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/jSxy2eNBrWw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="rotation-symbol">M2 U M2 U2 M2 U M2</div>
                        </div>
                    </section>
                    <div class="page-num">
                        <p>該当商品件数120件</p>
                        <p>
                            <a href="">&laquo;</a>
                            <a href="">１</a>
                            <a href="">２</a>
                            <a href="">３</a>
                            <a href="">４</a>
                            <a href="">５</a>
                            <a href="">&raquo;</a>
                        </p>
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
