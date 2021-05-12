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
    <body id="privacy">
        <header>
            <div class="row">
                <h1><a href="../view/index_publish.php"><img src="../view/images/logo/logo.jpg" alt="gancuber"></a></h1>
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
                            <span class="en">CONTACT</span>
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
                    <h2>【個人情報の管理】</h2>
                    <p>個人情報を取り扱うにあたっては、「個人情報の保護に関する法律」をはじめとする個人情報の保護に関する法令、ガイドラインおよび本プライバシーポリシーを遵守いたします。</p>
                    <h2>【個人情報の利用目的】</h2>
                    <p>（ご自身のサイト名）（以下、「当サイト」とします）では、訪問者様からのお問い合わせやコメントをお受けした際に、お名前（ハンドルネール）、メールアドレス等の個人情報をご登録いただく場合がございます。</p>
                    <p>これらの個人情報は質問に対する回答や必要な情報を電子メールなどをでご連絡する場合に利用させていただくものであり、個人情報をご提供いただく際の目的以外では利用いたしません。</p>
                    <p>また、コメントが当サイトの管理人（管理人の名前）に承認されますと、プロフィール画像とお名前（ハンドルネール）がコメントともに一般公開されますのでご了承ください。</p>
                    <h2>【個人情報の第三者への開示】</h2>
                    <p>当サイトでは、個人情報は適切に管理し、以下に該当する場合を 除いて第三者に開示することはありません。</p>
                    <ul>
                        <li>本人のご了解がある場合</li>
                        <li>法令等への協力のため、開示が必要となる場合</li>
                    </ul>
                    <h2>【個人情報の開示、訂正、追加、削除、利用停止】</h2>
                    <p>ご本人からの個人データの開示、訂正、追加、削除、利用停止のご希望の場合には、ご本人であることを確認させていただいた上、速やかに対応させていただきます。</p>
                    <h2>【Cookie（クッキー）】</h2>
                    <p>当サイトでは、一部のコンテンツについて情報の収集にCookieを使用しています。</p>
                    <p>Cookieは、ユーザーがサイトを訪れた際に、そのユーザーのコンピュータ内に記録されます。</p>
                    <p>ただし、記録される情報には、ユーザー名やメールアドレスなど、個人を特定するものは一切含まれません。</p>
                    <p>また、当サイトではユーザーの方々がどのようなサービスに興味をお持ちなのかを分析したり、ウェブ上での効果的な広告の配信のためにこれらを利用させていただく場合があります。</p>
                    <h2>【当サイトが使用しているアクセス解析ツールについて】</h2>
                    <p>当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。</p>
                    <p>このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。このトラフィックデータは匿名で収集されており、個人を特定するものではありません。この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。この規約に関して、詳しくはこちらをごお問い合わせありがとうございます。参照ください。</p>
                    <h2>【当サイトの広告について】 </h2>
                    <p>当サイトでは「Amazonアソシエイト」などのアフィリエイトプログラムや第三者配信広告サービス「GoogleAdsense」を利用しています。</p>
                    <p>GoogleAdsenseでは広告配信プロセスにおいてデータを収集するために、Cookieを使用しています。GoogleでCookieを使用することにより、インターネットにおけるご自身のサイトや他のサイトへのアクセス情報に基づいてユーザーに広告を配信することが可能になります。</p>
                    <p>Cookieを使用しないように設定するにはこちらをご参照ください。</p>
                    <h2>【著作権について】</h2>
                    <p>当サイトに掲載されている情報についての著作権は放棄しておりません。</p>
                    <p>著作権法により認められている引用の範囲である場合を除き「内容、テキスト、画像等」の無断転載・使用を固く禁じます。</p>
                    <h2>【免責事項】</h2>
                    <p>当サイトからリンクやバナーなどによって他のサイトに移動された場合、移動先サイトで提供される情報、サービス等について一切の責任を負いません。</p>
                    <p>当サイトのコンテンツ・情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。</p>
                    <p>当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。</p>
                    <h2>【プライバシーポリシーの変更について】</h2>
                    <p>当サイトは、個人情報に関して適用される日本の法令を遵守するとともに、本ポリシーの内容を適宜見直しその改善に努めます。</p>
                    <p>修正された最新のプライバシーポリシーは常に本ページにて開示されます。</p>
                    <h2>【お問い合わせ】</h2>
                    <p>当サイトへの、お問い合わせに関しては、こちら（お問い合わせへのURL）からどうぞ。 </p>
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
