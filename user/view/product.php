<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>GANCuber</title>
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

            });
            // ここから画像の動作
            $(window).on('load scroll', function () {
                // この変数に代入された配列がを繰り返し文でaddClass("animate")の対象にしている
                //cssではそれぞれzoomoutクラスのanimateクラスとshaderクラスのanimateクラスではアニメーションを書き分けているので動作が変わる
                var selectors = [$('.shader') ,$('.slidein') ,$('.scaleup') ,$('.zoomout')];
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

                //レスポンシブ時のグローバルナビゲーション表示操作
                $('#nav_button').on('click', function(){
                    $('#global').toggleClass('active');
              　});

                $('#product-nav-button').on('click', function(){
                    $('.product-nav').toggleClass('active');
              　});

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
    <body id="product">
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
                <button id="product-nav-button"><img src="../view/images/logo/search.jpg" alt="商品ナビゲーション"></button>
                <nav class="product-nav">
                    <div class="product-nav-box">
                        <h2>競技向けキューブ</h2>
                        <ul>
                            <li><a href="product_publish.php?nav_id=1">3×3×3</a></li>
                            <li><a href="product_publish.php?nav_id=2">4×4×4</a></li>
                            <li><a href="product_publish.php?nav_id=3">5×5×5</a></li>
                            <li><a href="product_publish.php?nav_id=4">ピラミンクス</a></li>
                            <li><a href="product_publish.php?nav_id=5">メガミンクス</a></li>
                        </ul>
                    </div>
                    <div class="product-nav-box">
                        <h2>その他のキューブ</h2>
                        <ul>
                            <li><a href="product_publish.php?nav_id=6">スキューブ</a></li>
                            <li><a href="product_publish.php?nav_id=7">ボイドキューブ</a></li>
                            <li><a href="product_publish.php?nav_id=8">GIOキューブ</a></li>
                            <li><a href="product_publish.php?nav_id=9">ミラーブロックス</a></li>
                            <li><a href="product_publish.php?nav_id=10">その他</a></li>
                        </ul>
                    </div>
                    <div class="product-nav-box">
                        <h2>難易度・性能別検索</h2>
                        <ul>
                            <li><a href="product_publish.php?nav_difficulty_id=1">難易度&#9733;&#9734;&#9734;&#9734;&#9734;</a></li>
                            <li><a href="product_publish.php?nav_difficulty_id=2">難易度&#9733;&#9733;&#9734;&#9734;&#9734;</a></li>
                            <li><a href="product_publish.php?nav_difficulty_id=3">難易度&#9733;&#9733;&#9733;&#9734;&#9734;</a></li>
                            <li><a href="product_publish.php?nav_difficulty_id=4">難易度&#9733;&#9733;&#9733;&#9733;&#9734;</a></li>
                            <li><a href="product_publish.php?nav_difficulty_id=5">難易度&#9733;&#9733;&#9733;&#9733;&#9733;</a></li>
                            <li><a href="product_publish.php?nav_stacker_id=1">ステッカーレス</a></li>
                            <li><a href="product_publish.php?nav_stacker_id=2">ステッカータイプ</a></li>
                            <li><a href="product_publish.php?nav_mg_id=1">マグネットあり</a></li>
                        </ul>
                    </div>
                    <div class="product-nav-box">
                        <h2>その他</h2>
                        <ul>
                            <li><a href="product_publish.php?nav_id=11">整備用工具</a></li>
                            <li><a href="product_publish.php?nav_id=12">オイル</a></li>
                            <li><a href="product_publish.php?nav_id=13">スタックタイマー</a></li>
                            <li><a href="product_publish.php?nav_id=14">ステッカー</a></li>
                            <li><a href="product_publish.php?nav_id=15">その他</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="item-list">
                  <div class="item-list-inner">
                    <!-- 何番目の画像を表示するかページ数-6した番目の画像 -->
                    <?php $i = ($now_page) * 6 - 6; ?>
                    <?php if(isset($page_item_num) === TRUE) : ?>
                      <?php foreach($page_item_num as $item) : ?>
                        <div class="item">
                          <a href="product_single_publish.php?single_item_id=<?php print htmlspecialchars($ids[$i]); ?>">
                            <div class="shader">
                              <img src="../view/images/item/<?php print htmlspecialchars($imgs[$i]); ?>" alt="<?php print $item;?>" />
                            </div>
                          </a>
                          <p><a href="product_single_publish.php?single_item_id=<?php print htmlspecialchars($ids[$i]); ?>"><?php print htmlspecialchars($item);?></a></p>
                        </div>
                        <?php $i++; ?>
                      <?php endforeach ?>
                    <?php endif ?>
                  </div>
                  <!-- ここからページング -->
                  <div class="page-num">
                      <!-- 取得した商品数を全て表示する -->
                      <p><?php print '該当商品件数'. $items_num . '件'. '　'; ?></p>
                        <p>
                          <!-- ここから＜＜のページ移動の作成（現在ページ$now_pageが2以上の数ならリンクにするでなければただのテキスト表示のみ） -->
                          <!-- navから絞り込み検索の値がGET送信されていれば$search_flagが定義されている -->
                          <?php if(isset($search_flag) === TRUE): ?>
                            <!-- 現在のページが1ページ目より大きければ -->
                            <?php if($now_page > 1): ?>
                              <!-- 検索での絞り込み状態で<<のリンクを作成する -->
                              <a href="product_publish.php?page_id=<?php print $now_page - 1 ?><?php print $search_flag; ?>">&#8810;</a>
                            <?php else: ?>
                              <!-- １ページ目ならただのテキスト -->
                              <span>&#8810;</span>
                            <?php endif ?>
                            <?php for($i = 1; $i <= $max_page; $i++): ?>
                              <!-- 現在表示中のページのリンクは表示しないページ数のみ表示 -->
                              <?php if ($i == $now_page) : ?>
                                <span><?php print $now_page; ?></span>
                                <!-- 現在のページ数でなければリンクを設置し表示する -->
                              <?php else: ?>
                                <!-- a要素の属性値のパラメーターに表示先のページ数を指定しGET送信する -->
                                <a href="product_publish.php?page_id=<?php print $i ?><?php print $search_flag; ?>"><?php print $i ?></a>
                              <?php endif ?>
                            <?php endfor ?>
                            <!-- ここからは＞＞側のページ移動作成 -->
                            <?php if($now_page < $max_page): ?>
                              <a href="product_publish.php?page_id=<?php print ($now_page + 1) ?><?php print $search_flag; ?>">&#8811;</a>
                            <?php else: ?>
                              <span>&#8811;</span>
                            <?php endif ?>
                            <!-- ここから検索絞り込　なしのページング -->
                          <?php else: ?>
                                <?php if($now_page > 1): ?>
                                    <a href="product_publish.php?page_id=<?php print $now_page - 1 ?>">&#8810;</a>
                                <?php else: ?>
                                    <span>&#8810;</span>
                                <?php endif ?>
                                <?php for($i = 1; $i <= $max_page; $i++): ?>
                                  <!-- 現在表示中のページのリンクは表示しないページ数のみ表示 -->
                                  <?php if ($i == $now_page) : ?>
                                    <span><?php print $now_page; ?></span>
                                    <!-- 現在のページ数でなければリンクを設置し表示する -->
                                  <?php else: ?>
                                    <!-- a要素の属性値のパラメーターに表示先のページ数を指定しGET送信する -->
                                    <a href="product_publish.php?page_id=<?php print $i ?>"><?php print $i ?></a>
                                  <?php endif ?>
                                <?php endfor ?>
                                <!-- ここからは＞＞側のページ移動作成 -->
                                <?php if($now_page < $max_page): ?>
                                  <a href="product_publish.php?page_id=<?php print ($now_page + 1) ?>">&#8811;</a>
                                <?php else: ?>
                                  <span>&#8811;</span>
                                <?php endif ?>
                          <?php endif ?>
                        </p>
                  </div>
                </div>
            </main>
            <aside id="related-products">
                <div id="carouselWrap">
                    <p id="carouselPrev"><img src="../view/images/carousel/carousel-back.png" alt="前へ" /></p>
                    <p id="carouselNext"><img src="../view/images/carousel/carousel-next.png" alt="次へ" /></p>
                    <div id="carousel">
                        <div id="carouselInner">
                            <ul class="column">
                                <li><a href="#"><img src="../view/images/carousel/2x2x2.jpg" alt="" /><p>2X2X2</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/GIO.png" alt="" /><p>ジオキューブ</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/gtsv2m.jpg" alt="" /><p>GTSV2M</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/kousiki.jpg" alt="" /><p>メガハウス</p></a></li>
                            </ul>
                            <ul class="column">
                                <li><a href="#"><img src="../view/images/carousel/boid.jpg" alt="" /><p>ボイドキューブ</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/megaminx.png" alt="" /><p>メガミンクス</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/square.jpg" alt="" /><p>スクエア1</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/sukyu-bu.jpg" alt="" /><p>スキューブ</p></a></li>
                            </ul>
                            <ul class="column">
                                <li><a href="#"><img src="../view/images/carousel/timer.jpg" alt="" /><p>スタックタイマー</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/oil.jpg" alt="" /><p>ガンオイル</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/sticker.jpg" alt="" /><p>ステッカー</p></a></li>
                                <li><a href="#"><img src="../view/images/carousel/ribenzi.jpg" alt="" /><p>4X4X4</p></a></li>
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
