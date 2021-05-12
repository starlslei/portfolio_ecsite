<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>新規登録 ｜GANCuber</title>
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
    <body id="contact">
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
            <div class="top-img">
                <img src="../view/images/logo/topimg2.jpg" alt="お取引に関して">
                <p>新規ユーザー登録</p>
            </div>
            <div id="main-outer">
                <main>
                    <p><span>※</span>は必須項目です</p>
                    <form action="../controller/user_add_publish.php" method="post">
                        <dl>
                            <dt>
                                <label for="name-sei">お名前<span>※</span></label>
                            </dt>
                            <dd class="name-box">
                                姓<input type="text" name="name-sei" placeholder="山田" id="name-sei" required>
                                <label>/名<input type="text" name="name-mei" placeholder="太郎" id="name-mei" required></label>
                            </dd>
                            <dt>
                                <label for="kana-sei">
                                お名前(フリガナ)<span>※</span></label>
                            </dt>
                            <dd class="name-box">
                                    ｾｲ<input type="text" name="kana-sei" placeholder="ヤマダ" id="kana-sei" required>
                                <label>
                                    /ﾒｲ<input type="text" name="kana-mei" placeholder="タロウ" id="kana-sei" required>
                                </label>
                            </dd>

                            <dt>
                                <label for="post-num-1">
                                    郵便番号<span>※</span>
                                </label>
                            </dt>
                            <dd>
                                <input type="number" name="post-num-1" placeholder="000" id="post-num-1" required>
                                <label>
                                    －<input type="number" name="post-num-2" placeholder="0000" id="post-num-2" required>
                                </label>
                            </dd>
                            <dt>
                                <label for="prefecture">都道府県<span>※</span></label>
                            </dt>
                            <dd>
                                <select name="prefecture" id="prefecture">
                                    <option value="" selected>都道府県</option>
                                    <option value="1">北海道</option>
                                    <option value="2">青森県</option>
                                    <option value="3">岩手県</option>
                                    <option value="4">宮城県</option>
                                    <option value="5">秋田県</option>
                                    <option value="6">山形県</option>
                                    <option value="7">福島県</option>
                                    <option value="8">茨城県</option>
                                    <option value="9">栃木県</option>
                                    <option value="10">群馬県</option>
                                    <option value="11">埼玉県</option>
                                    <option value="12">千葉県</option>
                                    <option value="13">東京都</option>
                                    <option value="14">神奈川県</option>
                                    <option value="15">新潟県</option>
                                    <option value="16">富山県</option>
                                    <option value="17">石川県</option>
                                    <option value="18">福井県</option>
                                    <option value="19">山梨県</option>
                                    <option value="20">長野県</option>
                                    <option value="21">岐阜県</option>
                                    <option value="22">静岡県</option>
                                    <option value="23">愛知県</option>
                                    <option value="24">三重県</option>
                                    <option value="25">滋賀県</option>
                                    <option value="26">京都府</option>
                                    <option value="27">大阪府</option>
                                    <option value="28">兵庫県</option>
                                    <option value="29">奈良県</option>
                                    <option value="30">和歌山県</option>
                                    <option value="31">鳥取県</option>
                                    <option value="32">島根県</option>
                                    <option value="33">岡山県</option>
                                    <option value="34">広島県</option>
                                    <option value="35">山口県</option>
                                    <option value="36">徳島県</option>
                                    <option value="37">香川県</option>
                                    <option value="38">愛媛県</option>
                                    <option value="39">高知県</option>
                                    <option value="40">福岡県</option>
                                    <option value="41">佐賀県</option>
                                    <option value="42">長崎県</option>
                                    <option value="43">熊本県</option>
                                    <option value="44">大分県</option>
                                    <option value="45">宮崎県</option>
                                    <option value="46">鹿児島県</option>
                                    <option value="47">沖縄県</option>
                                </select>
                            </dd>
                            <dt>
                                <label for="city">住所<span>※</span></label>
                            </dt>
                            <dd>
                                <input type="text" name="city" placeholder="新宿区" id="city" required>
                            </dd>
                            <dt>
                                <label for="address">以降の住所<span>※</span></label>
                            </dt>
                            <dd>
                                <input type="text" name="address" placeholder="2丁目８－１" id="address" required>
                            </dd>
                            <dt>
                                <label for="email">メールアドレス<span>※</span></label>
                            </dt>
                            <dd>
                                <input type="email" name="email" id="email" required>
                            </dd>
                            <dt>
                                <label>パスワード(頭文字大文字８桁以上で入力)<span>※</span></label>
                            </dt>
                            <dd>
                                <input type="password" name="password" id="password" required>
                            </dd>
                            <dt>
                            <p><input type="submit" value="送信"></p>
                        </dl>
                    </form>
                </main>
            </div>
        </div>
        <footer>
            <div class="row">
                <ul>
                    <li><a href="access_publsh.php">店舗情報</a></li>
                    <li><a href="privacy_publsh.php">プライバシー・ポリシー</a></li>
                </ul>
                <p><small>&copy;GANCuber　CopyRight</small></p>
            </div>
        </footer>
    </body>
</html>
