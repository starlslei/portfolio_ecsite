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
    <body id="user_add_result">
        <header>
            <div class="row">
                <h1><a href="index.html"><img src="../view/images/logo/logo.jpg" alt="gancuber"></a></h1>
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
          </nav>
          <main>
            <div>
              <!-- ここから新規登録の結果メッセージの表示制御 -->
              <?php if (isset($messages) === TRUE && empty($messages) === FALSE) : ?>
                <?php foreach($messages as $message) : ?>
                  <p><?php print htmlspecialchars($message); ?></p>
                <?php endforeach ?>
              <?php else: ?>
                <p><?php print 'ユーザー登録に成功しました'; ?></p>
              <?php endif ?>
              <p><a href="../controller/index_publish.php">トップページに戻る</a></p>
            </div>
          </main>
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
