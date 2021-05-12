<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>商品詳細｜GANCuber</title>
        <link rel="stylesheet" href="../view/css/normalize.css">
        <link rel="stylesheet" href="../view/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script>
            $(document).ready(function(){
                // スライダーの動作
                $('.slider').bxSlider({
                    mode: 'fade',
                    speed: 1000,
                    auto: true
                });

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
            });

            // ここから画像の動作
            $(window).on('load scroll', function () {
                // この変数に代入された配列がを繰り返し文でaddClass("animate")の対象にしている
                //cssではそれぞれzoomoutクラスのanimateクラスとshaderクラスのanimateクラスではアニメーションを書き分けているので動作が変わる
                var selectors = [$('.shader') ,$('.slidein') ,$('.scaleup') ,$('.zoomout') ,$('.meter')];
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                $.each(selectors, function (i, value) {
                    $.each(value, function () {
                        var imgHeight = $(this).height();
                        var position = $(this).offset().top - windowHeight + imgHeight;
                        var delay = $(this).data('delay');
                        if (position < scroll + (windowHeight / 4)) {
                            if(delay == null || delay == 0) {
                                $(this).addClass("animate");
                            } else {
                                $(this).addClass("animate delay-" + delay);
                            }
                        }
                    });
                });
            });

            //レスポンシブ時のグローバルナビゲーション表示操作
                $('#nav_button').on('click', function(){
                    $('#global').toggleClass('active');
              　});

                $('#product-nav-button').on('click', function(){
                    $('.product-nav').toggleClass('active');
              　});

            //カルーセルパネル
            $(function(){
                //初期設定
                $("#carouselInner").css("width",930*$("#carouselInner ul.column").length+"px");
                $("#carouselInner ul.column:last").prependTo("#carouselInner");
                $("#carouselInner").css("margin-left","-800px");

                //戻るボタン
                // クリックされると左方向にスライド移動する処理を記述
                $("#carouselPrev").click(function(){
                    $("#carouselNext,#carouselPrev").hide();
                    $("#carouselInner").animate({
                        "margin-left" : parseInt($("#carouselInner").css("margin-left"))+800+"px"
                    },"slow","swing" ,
                    function(){
                        $("#carouselInner").css("margin-left","-800px")
                        $("#carouselInner ul.column:last").prependTo("#carouselInner");
                        $("#carouselNext,#carouselPrev").show();
                    });
                });

                $("#carouselNext").click(function(){
                    $("#carouselNext,#carouselPrev").hide();
                    $("#carouselInner").animate({
                        "margin-left" : parseInt($("#carouselInner").css("margin-left"))-800+"px"
                    },"slow","swing" ,

                    //進むボタン
                    // 戻るボタンとの違いは動作方向margin-leftが逆なので+620pxではなく-620pxになる
                    function(){
                        $("#carouselInner").css("margin-left","-800px")
                        $("#carouselInner ul.column:first").appendTo("#carouselInner");
                        $("#carouselNext,#carouselPrev").show();
                    });
                });
            });
        </script>
    </head>
    <body id="product-single">
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
                            <a href="product_publish.php" id="active">
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
            <div id="slider">
                <div class="slider">
                    <div><img src="../view/images/slider/gantop.jpg" alt="GAN356AirSM"></div>
                    <div><img src="../view/images/slider/valkimg.jpg" alt="valk３"></div>
                </div>
            </div>
            <main>
                <div class="single-item">
                    <div class="single-left">
                      <!-- 商品画像 -->
                        <div class="single-img scaleup">
                            <img src="../view/images/item/<?php print $img ?>" alt="<?php print $img ?>">
                        </div>
                        <!-- 商品名 -->
                        <div class="meter delay-500">
                          <p class="single-name">
                            <?php print htmlspecialchars ($item); ?>
                          </p>
                        </div>
                        <!-- 商品価格 -->
                        <div class="meter delay-100">
                          <p class="single-price">
                            <?php print htmlspecialchars ($price); ?> 円
                          </p>
                        </div>
                    </div>
                    <div class="single-right">
                        <!-- 難易度表示 -->
                        <div class="meter delay-100">
                          <?php if($difficulty == 1): ?>
                            <p class="difficulty">難易度&#9733;&#9734;&#9734;&#9734;&#9734;</p>
                          <?php elseif ($difficulty == 2): ?>
                            <p class="difficulty">難易度&#9733;&#9733;&#9734;&#9734;&#9734;</p>
                          <?php elseif ($difficulty == 3): ?>
                            <p class="difficulty">難易度&#9733;&#9733;&#9733;&#9734;&#9734;</p>
                          <?php elseif ($difficulty == 4): ?>
                            <p class="difficulty">難易度&#9733;&#9733;&#9733;&#9733;&#9734;</p>
                          <?php elseif ($difficulty == 5): ?>
                            <p class="difficulty">難易度&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                          <?php elseif ($difficulty == 6): ?>
                            <p class="difficulty">難易度　なし</p>
                          <?php endif ?>
                        </div>
                        <!-- マグネットの有無表示 -->
                        <div class="meter delay-600">
                          <?php if($mg == 1): ?>
                            <p class="mg">マグネットあり</p>
                          <?php elseif ($mg == 2): ?>
                            <p class="mg">マグネットなし</p>
                          <?php elseif ($mg == 3): ?>
                            <p class="mg">マグネットその他</p>
                          <?php endif ?>
                        </div>
                        <!-- サイズ表示 -->
                        <div class="meter delay-200"><p class="size">サイズ　<?php print htmlspecialchars ($size); ?></p></div>
                        <!-- 重さ表示 -->
                        <div class="meter delay-400"><p class="weight">重量　<?php print htmlspecialchars ($wight); ?></p></div>
                        <!-- 回し心地 -->
                        <div class="meter delay-700">
                          <?php if($feel == 1): ?>
                            <p class="feel">回し心地　しっとり</p>
                          <?php elseif($feel == 2): ?>
                            <p class="feel">回し心地　しっとり寄り</p>
                          <?php elseif($feel == 3): ?>
                            <p class="feel">回し心地　中間</p>
                          <?php elseif($feel == 4): ?>
                            <p class="feel">回し心地　カラカラ寄り</p>
                          <?php elseif($feel == 5): ?>
                            <p class="feel">回し心地　カラカラ</p>
                          <?php elseif($feel == 6): ?>
                            <p class="feel">回し心地　なし</p>
                          <?php endif ?>
                        </div>
                        <!-- ステッカー表示 -->
                        <div class="meter delay-600">
                          <?php if($stacker == 1): ?>
                            <p class="sticker">ステッカーレス</p>
                          <?php elseif($stacker == 2): ?>
                            <p class="sticker">ステッカータイプ</p>
                          <?php elseif($stacker == 3): ?>
                            <p class="sticker">その他</p>
                          <?php endif ?>
                        </div>
                        <div class="form">
                            購入数を入力してください<br>
                            <?php if(isset($session_id) === TRUE && empty($session_id) === FALSE): ?>
                              <form action="../controller/buy_product_publish.php" method="post">
                                  <input type="hidden" name="item_id" value="<?php print $id; ?>">
                                  <input type="number" name="purchase_num" value="0">個
                                  <input type="submit" value="カートへ">
                              </form>
                            <?php else: ?>
                              <p>ログインしてください</p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="review">
                        <p class="text"><?php print htmlspecialchars ($text); ?></p>
                    </div>
                </div>
                <p class="return"><a href="../controller/product_publish.php">&laquo;戻る</a></p>
            </main>
            <aside id="related-products">
                <div id="carouselWrap">
                    <p id="carouselPrev"><img src="../view/images/carousel/carousel-back.png" alt="前へ" /></p>
                    <p id="carouselNext"><img src="../view/images/carousel/carousel-next.png" alt="次へ" /></p>
                    <div id="carousel">
                        <div id="carouselInner">
                            <ul class="column">
                                <li><a href="#"><img src="../view/images/carousel/2x2x2.jpg" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/GIO.png" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/good.png" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/kousiki.jpg" alt="" /><p>テキストテキスト</p></a></li>
                            </ul>
                            <ul class="column">
                                <li><a href="#"><img src="../view/images/carousel/megaminx.png" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/megaminx.png" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/megaminx.png" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/megaminx.png" alt="" /><p>テキストテキスト</p></a></li>
                            </ul>
                            <ul class="column">
                                <li><a href="#"><img src="../view/images/carousel/oil.jpg" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/oil.jpg" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/oil.jpg" alt="" /><p>テキストテキスト</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/oil.jpg" alt="" /><p>テキストテキスト</p></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
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
