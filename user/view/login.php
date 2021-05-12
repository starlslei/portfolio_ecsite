<?php
//すでにクッキーが定義されていれば表示する値を　でなければ空文字
if (isset($_COOKIE['checked_id'])) {
  $cookie_check_id = $_COOKIE['checked_id'];
} else {
  $cookie_check_id = '';
}

if (isset($_COOKIE['checked_passwd'])) {
  $cookie_check_name = $_COOKIE['checked_passwd'];
} else {
  $cookie_check_name = '';
}
?>
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

//              レスポンシブ時のグローバルナビゲーション表示操作
              $('#nav_button').on('click', function(){
                    $('#global').toggleClass('active');
              });

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
            });
        </script>
    </head>
    <body id="login">
        <header>
            <div class="row">
                <h1><a href="../controller/index_publish.php"><img src="../view/images/logo/logo.jpg" alt="gancuber"></a></h1>
                <div id="nav_button"></div>
            </div>
        </header>
        <div class="row">
            <nav id="global">
                <ul>
                    <li>
                        <a href="../controller/index_publish.php">
                            <span class="en">HOME</span>
                            <span class="ja">ホーム</span>
                        </a>

                    </li>
                    <li>
                        <a href="../controller/product_publish.php">
                            <span class="en">ONLINESHOP</span>
                            <span class="ja">ショップ</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/payment_publish.php">
                            <span class="en">SHOPING&amp;PAYMENT</span>
                            <span class="ja">お支払方法</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/access_publish.php">
                            <span class="en">ACCESS</span>
                            <span class="ja">店舗情報</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/solution_publish.php">
                            <span class="en">SOLUTION</span>
                            <span class="ja">解法紹介</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/contact_publish.php">
                            <span class="en">CONTACT</span>
                            <span class="ja">お問合せ</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div id="main-outer">
                <main>
                    <div class="login-outer">
                        <div class="login">
                            <form method="post" action="../controller/login_action_publish.php">
                                <label>
                                    <p>ログインID<br>
                                        <input type="text" name="login_id" value="<?php print htmlspecialchars($cookie_check_id); ?>">
                                    </p>
                                </label>
                                <label>
                                    <p>パスワード<br>
                                        <input type="password" name="login_passwd" value="<?php print htmlspecialchars($cookie_check_name); ?>">
                                    </p>
                                </label>
                                <label class="radio">
                                    <p>
                                        <input type="radio" name="cookie_chech" value="checked" checked />次回から入力を省略する
                                    </p>
                                </label>
                                <p>
                                    <input type="submit" value="ログイン" />
                                </p>
                            </form>
                            <p>
                                <a href="../controller/new_user_publish.php">新規会員登録はこちら</a>
                            </p>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer>
            <div class="row">
                <ul>
                    <li><a href="../controller/access_publish.php">店舗情報</a></li>
                    <li><a href="../controller/privacy_publish.php">プライバシー・ポリシー</a></li>
                </ul>
                <p><small>&copy;GANCuber　CopyRight</small></p>
            </div>
        </footer>
    </body>
</html>
