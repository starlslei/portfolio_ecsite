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
              // ホバー時のアニメーション
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
    <body id="home">
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
                        <a href="index_publish.php" id="active">
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
                    <div><img src="../view/images/slider/pumaslider.jpg" alt=""></div>
                    <div><img src="../view/images/man/takaiopen-slider.jpg" alt=""></div>
                    <div><img src="../view/images/slider/collin.jpg" alt=""></div>
                </div>
            </div>
            <div id="main-outer">
                <main>
                    <div class="blog-outer">
                        <div class="cube-flex">
                            <h2>ブログ最新情報</h2>
                            <img src="../view/images/logo/move.jpg" alt="キューブ" class="blog-cubeimg">
                        </div>
                        <article>
                            <section class="blog-section">
                                <div class="scaleup">
                                    <img src="../view/images/blog/casmpion2-blog.jpg" alt="世界チャンピオン">
                                </div>
                                <div class="blog-text">
                                    <p><a href="">世界チャンピオンインタビュー</a></p>
                                    <p>2020年全日本を世界チャンピオンが観戦するとの情報が！！インタビューしてきました！！！</p>
                                </div>
                            </section>
                            <section class="blog-section">
                                <div class="scaleup">
                                    <img src="../view/images/blog/world-blog.jpg" alt="世界大会">
                                </div>
                                <div class="blog-text">
                                    <p><a href="">西日本大会に参加してきました</a></p>
                                    <p>２０２０年西日本大会にスタッフ一同参加してきました。入賞者2名！詳細はリンクから！</p>
                                </div>
                            </section>
                            <section class="blog-section">
                                <div class="scaleup">
                                    <img src="../view/images/blog/wining-blog.jpg" alt="入賞者">
                                </div>
                                <div class="blog-text">
                                    <p><a href="">2020年世界大会が開催！</a></p>
                                    <p>２０２０年世界大会が3月21日にオランダ、アムステルダムで開催されました！結果はリンクから！</p>
                                </div>
                            </section>
                            <section class="blog-section">
                                <div class="scaleup">
                                    <img src="../view/images/blog/westjapan-blog.jpg" alt="西日本大会風景">
                                </div>
                                <div class="blog-text">
                                    <p><a href="">4月12日店舗大会を開催します</a></p>
                                    <p>４月１２日店舗大会が決定しました！同時に初心者講座も開催いたします!景品もでるよ！！</p>
                                </div>
                            </section>
                            <section class="blog-section">
                                <div class="scaleup">
                                    <img src="../view/images/blog/gan354m-blog.jpg" alt="GAN356AirSM">
                                </div>
                                <div class="blog-text">
                                    <a href="">GAN最新モデル入荷！</a>
                                    <p>2020年秋のGAN新作キューブが入荷しました！驚きの安定感を是非体験してください！</p>
                                </div>
                            </section>
                            <section class="blog-section">
                                <div class="scaleup">
                                    <img src="../view/images/blog/qiyivalk3-blog.jpg" alt="QiYiValk3">
                                </div>
                                <div class="blog-text">
                                    <p><a href="">当店お薦め2020年最新キューブ</a></p>
                                    <p>2020年秋の新作キューブが入荷しました！オランダチャンピオン監修のモデルを是非ご確認ください！</p>
                                </div>
                            </section>
                        </article>
                    </div>
                    <div class="news-outer">
                        <div class="cube-flex">
                            <h2>ニュース</h2>
                            <img src="../view/images/logo/move.jpg" alt="キューブ" class="news-cubeimg">
                        </div>
                        <div class="news-text">
                            <h3><strong>コロナウィルスの感染拡大に伴う店舗営業時間の短縮</strong></h3>
                            <p>新型コロナウィルス感染拡大に伴い営業時間を11:00~19:00とさせて頂きます。　但し、遠方からお越しになるお 客様 は、
                            事前にお電話いただければ通常時間　の19:30まで対応させていただきます。大変ご不便をお掛け致しますが、何卒ご理解とご協力を お願い申し上げます。</p>
                        </div>
                    </div>
                </main>
                <aside>
                    <div class="shop-introduction">
                        <h2>ショップ紹介</h2>
                        <div class="zoomout">
                            <!-- <img src="../view/images/man/shopstaff.jpg" alt="店主" class="zoomout"> -->
                        </div>
                        <div class="shop-text">
                            <p>初心者から上級者まで<br>幅広いニーズにお応えします。<br>お気軽にお声がけください。</p>
                            <p>ご来店をスタッフ一同お待ちしております。</p>
                            <p>営業日　火曜～日曜日<br>10:00～19:00<br>定休日　月曜・祝日</p>

                        </div>
                    </div>
                    <div class="maker-outer">
                        <h2>取扱いメーカー</h2>
                        <div class="maker-text">
                            <ul>
                                <li>GAN</li>
                                <li>メガハウス</li>
                                <li>QiYi</li>
                                <li>MoYu</li>
                                <li>その他</li>
                            </ul>
                        </div>
                    </div>
                    <div class="choose-outer">
                        <h2>競技用キューブの選び方</h2>
                        <div class="choose-text">
                            <p>初心者向け競技用キューブの選び方キューブの違いを説明致します。</p><p>詳しくは</p>
                            <p><a href="#">こちらから&raquo;</a></p>
                        </div>
                    </div>
                </aside>
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
