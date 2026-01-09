<?php
/**
 * Template Name: LEAF Page
 *
 * Template for displaying the LEAF system.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-leaf">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row">
    <div class="col-lg-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO BANNER -->
          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <h2 class="page-subtitle">リーフ</h2>
              </div>
            </div>
          </section>

          

<!-- LEAF INTRO BLOCK -->
<section class="leaf-intro section-spacing">
  <div class="container leaf-intro__container">
    <div class="leaf-intro__content">
      <h2 class="leaf-intro__title">LEAF</h2>
      <p class="leaf-intro__description">
        LEAF（Learning and Evidence Analytics Framework）は、BookRollやLogPaletteなどのツールを通じて、教育データを活用した授業支援を行う統合システムです。
      </p>
      <div class="leaf-intro__links">
        <a href="https://eds.let.media.kyoto-u.ac.jp/leaf/" target="_blank" class="btn btn--cta"><span>LEAF公式サイトを見る</span></a>
        <a href="https://live.let.media.kyoto-u.ac.jp/evidence-portal/" target="_blank" class="btn btn--subtle"><span>エビデンスポータルを見る</span></a>
      </div>
    </div>
  </div>
</section>


          <!-- VIDEO SECTION -->
          <section class="presentation-video">
            <h2>LEAFシステム紹介ビデオ</h2>
            <p>
              🎥 タイトル：教育を変えるLEAFシステムとは？<br>
              時間：5分04秒<br>
              内容：BookRollとログパレを用いた教育支援ツールの紹介
            </p>
            <div class="video-embed ratio-16x9">
                <iframe
                    src="https://www.youtube.com/embed/UaFCPePgc54"
                    title="LEAFシステム紹介ビデオ"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
                </div>
          </section>

          <!-- PRESENTATIONS LIST -->
      <section class="presentation-section section-spacing">
  <div class="container">
    <h2 class="section-title">講演動画・講演資料などリンク集</h2>
    <ul class="presentation-list">

            <li class="presentation-entry">
        <div class="presentation-date">2023/1/6</div>
        <div class="presentation-description">
          九州大学ラーニングアナリティクスセンター第１回シンポジウム<br>
          「理想のラーニングアナリティクスを目指して〜研究と実践の往還〜」<br>
          「私が思う、理想のラーニングアナリティクス環境〜研究と実践、人材と研究費・エビデンスのエコシステムの構築〜」
        </div>
        <div class="presentation-links">
          <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/XHdKTWrw5ieWGe3" target="_blank" rel="noopener">資料</a>
        </div>
      </li>
                 <li class="presentation-entry">
        <div class="presentation-date">2022/11/2</div>
        <div class="presentation-description">
          オンラインラーニングフォーラム2022<br>
          「ラーニングアナリティクスと教育の未来」
        </div>
        <div class="presentation-links">
          <a href="https://www.elearningawards.jp/program2detail.html#60" target="_blank" rel="noopener">WEB</a>
        </div>
      </li>
                <li class="presentation-entry">
        <div class="presentation-date">2022/10/31</div>
        <div class="presentation-description">
          文部科学省スキームD University Pitch and Conference　〜デジタル技術で高等教育をアップデート！<br>
          「デジタル教材配信システムBookRollを用いた教育DXの促進」
        </div>
        <div class="presentation-links">
          <a href="https://scheemd-univpitch2022.peatix.com/view" target="_blank" rel="noopener">WEB</a>,
          <a href="https://www.youtube.com/watch?v=nth-lG6mFNk" target="_blank" rel="noopener">動画</a>
        </div>
      </li>
                <li class="presentation-entry">
        <div class="presentation-date">2022/9/10</div>
        <div class="presentation-description">
          日本教育工学会(JSET)2022年秋季全国大会 シンポジウム1<br>
          「AI活用・教育データの利活用とその課題」
        </div>
        <div class="presentation-links">
          <a href="https://www.jset.gr.jp/taikai41/session.html" target="_blank" rel="noopener">WEB</a>,
          <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/K4iYoAtCPpRzeKG" target="_blank" rel="noopener">資料</a>
        </div>
      </li>
                 <li class="presentation-entry">
        <div class="presentation-date">2022/9/7</div>
        <div class="presentation-description">
          公益社団法人私立大学情報教育協会「教育イノベーション大会」<br>
          「ラーニングアナリティクスとは？」
        </div>
        <div class="presentation-links">
          <a href="https://www.juce.jp/LINK/taikai/taikai2022.pdf" target="_blank" rel="noopener">プログラム</a>
        </div>
      </li>
                 <li class="presentation-entry">
        <div class="presentation-date">2022/8/27</div>
        <div class="presentation-description">
          IMS Japan Conference 2022<br>
          「ラーニングアナリティクスと国際技術標準」
        </div>
        <div class="presentation-links">
          <a href="https://www.imsjapan.org/post/%E3%80%8Cims-japan-conference-2022%E3%80%8D%E3%81%AE%E5%8B%95%E7%94%BB%E3%80%81%E7%99%BA%E8%A1%A8%E8%B3%87%E6%96%99" target="_blank" rel="noopener">WEB</a>,
          <a href="https://www.imsjapan.org/post/%E3%80%8Cims-japan-conference-2022%E3%80%8D%E9%96%8B%E5%82%AC%E3%81%AE%E3%81%8A%E7%9F%A5%E3%82%89%E3%81%9B" target="_blank" rel="noopener">資料</a>
        </div>
      </li>
                 <li class="presentation-entry">
        <div class="presentation-date">2022/8/26</div>
        <div class="presentation-description">
          大学英語教育会 (JACET)<br>
          “Towards Data and Evidence-Informed Teaching and Learning in the Context of Language Learning”
        </div>
        <div class="presentation-links">
          <a href="https://www.jacet.org/convention/2022-2/" target="_blank" rel="noopener">WEB</a>,
          <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/7c3cnHS64JLFbYb" target="_blank" rel="noopener">資料</a>
        </div>
      </li>
                <li class="presentation-entry">
        <div class="presentation-date">2022/8/24</div>
        <div class="presentation-description">
          WCCE 2022<br>
          “Data and Evidence-Informed Education and Learning in Post Covid-19”
        </div>
        <div class="presentation-links">
          <a href="https://wcce2022.org/keynotes.html#HOgata" target="_blank" rel="noopener">WEB</a>,
          <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/osBp3cJKAppdo83" target="_blank" rel="noopener">資料</a>
        </div>
      </li>
                        <li class="presentation-entry">
            <div class="presentation-date">2022/8/9</div>
            <div class="presentation-description">
                一般社団法人エビデンス駆動型教育研究協議会 一周年記念イベント<br>
                「教育データの利活用の研究最前線と今後の展望」
            </div>
            <div class="presentation-links">
                <a href="https://www.ederc.jp/events/event_1st_anniversary" target="_blank" rel="noopener">WEB</a>,
                <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/ejk9fzwPQL5Lss6" target="_blank" rel="noopener">資料</a>,
                <a href="https://www.youtube.com/watch?v=NFNzkMRR5co" target="_blank" rel="noopener">前半動画</a>,
                <a href="https://www.youtube.com/watch?v=BBQyceMufwA&t=2s" target="_blank" rel="noopener">後半動画</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2022/6/21</div>
            <div class="presentation-description">
                日本人事テスト事業者懇談会第68回研究会<br>
                「ラーニングアナリティクス研究の最前線と展望」
            </div>
            <div class="presentation-links">
                <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/C7bt5SBopXPQoRg" target="_blank" rel="noopener">資料</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2022/6/4</div>
            <div class="presentation-description">
                文科省：教育データの利活用に関する有識者会議（第10回）<br>
                「LEAFシステムの活用からみる今後の初等中等教育における教育データ利活用のあり方の提案」
            </div>
            <div class="presentation-links">
                <a href="https://www.youtube.com/watch?v=nzuYGBdeMn8#t=22m19s" target="_blank" rel="noopener">動画</a>,
                <a href="https://www.mext.go.jp/kaigisiryo/content/20220623-mxt_syoto01-202318_3-2.pdf" target="_blank" rel="noopener">資料</a>,
                <a href="https://www.mext.go.jp/kaigisiryo/mext_00398.html" target="_blank" rel="noopener">WEB</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2021/8/24-25</div>
            <div class="presentation-description">
                Learning and Evidence Analytics Framework (LEAF): Design and Large-scale Implementation of LA Driven Infrastructure in the Japanese Context
            </div>
            <div class="presentation-links">
                <a href="https://www.youtube.com/watch?v=Je32_UY2b9E&t=1s" target="_blank" rel="noopener">動画</a>,
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2021/11/EUHK-1.pdf" target="_blank" rel="noopener">資料</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2021/8/11</div>
            <div class="presentation-description">
                公開シンポジウム 一般社団法人エビデンス駆動型教育研究協議会 キックオフシンポジウム
            </div>
            <div class="presentation-links">
                <a href="https://www.ederc.jp/events/kickoff-symposium" target="_blank" rel="noopener">WEB</a>,
                <a href="https://www.youtube.com/playlist?list=PLPi8r9BgD6D4-s8Ff0pZBz4sYDreXqQTs" target="_blank" rel="noopener">動画</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2021/6/3</div>
            <div class="presentation-description">
                New Education Expo 2021<br>
                「教育データ活用の仕組みづくり～各種システムの構築、運用を通じ～」
            </div>
            <div class="presentation-links">
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2021/06/NEE202106all.pdf" target="_blank" rel="noopener">資料</a>,
                <a href="https://edu-expo.org/registration/2021/?f_exc=true&hall=T" target="_blank" rel="noopener">WEB</a>
            </div>
            </li>
                            <li class="presentation-entry">
            <div class="presentation-date">2021/5/26</div>
            <div class="presentation-description">
                【第33回】 大学等におけるオンライン教育とデジタル変革に関するサイバーシンポジウム「教育機関DXシンポ」<br>
                「教育データ解析コンテストについて」
            </div>
            <div class="presentation-links">
                <a href="https://www.youtube.com/watch?v=SH-Ah_4EMVw" target="_blank" rel="noopener">動画</a>,
                <a href="https://www.nii.ac.jp/event/upload/20210528-03_Ogata.pdf" target="_blank" rel="noopener">資料</a>,
                <a href="https://edx.nii.ac.jp/lecture/20210528-03" target="_blank" rel="noopener">WEB</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2021/1/19</div>
            <div class="presentation-description">
                超教育協会CHANNEL・第32回オンラインシンポ「教育データの利活用とエビデンスに基づく教育の実現に向けて」
            </div>
            <div class="presentation-links">
                <a href="https://www.youtube.com/watch?v=sO_vYEFmOjg&t=1s" target="_blank" rel="noopener">動画</a>,
                レポート記事 [
                <a href="https://lot.or.jp/project/3995/" target="_blank" rel="noopener">前半</a>、
                <a href="https://lot.or.jp/project/4009/" target="_blank" rel="noopener">後半</a>]
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2020/11/24</div>
            <div class="presentation-description">
                文科省：教育データの利活用に関する有識者会議（第3回）<br>
                「教育データの利活用について」
            </div>
            <div class="presentation-links">
                <a href="https://www.youtube.com/watch?v=E_Onj_qMjhw#t=55s" target="_blank" rel="noopener">動画</a>,
                <a href="https://www.mext.go.jp/kaigisiryo/content/20201120-mxt_syoto01-000011202-01.pdf" target="_blank" rel="noopener">資料</a>,
                <a href="https://www.mext.go.jp/kaigisiryo/mext_00140.html" target="_blank" rel="noopener">WEB</a>
            </div>
            </li>
            <li class="presentation-entry">
            <div class="presentation-date">2020/7/7</div>
            <div class="presentation-description">
                文科省：教育データの利活用に関する有識者会議（第1回）<br>
                「教育データの利活用に向けてできることからはじめよう！」
            </div>
            <div class="presentation-links">
                <a href="https://www.mext.go.jp/kaigisiryo/mext_00088.html" target="_blank" rel="noopener">WEB</a>,
                <a href="https://www.mext.go.jp/kaigisiryo/content/20200706-mxt_syoto01-000008468-09.pdf" target="_blank" rel="noopener">資料</a>
            </div>
            </li>
            </ul>
            <h2 class="section-title">スライド</h2>
            <ul class="presentation-list">
            <li class="presentation-entry">
                <div class="presentation-description">
                ラーニング・アナリティクス研究の最新動向（東北大学LARC講演資料）
                </div>
                <div class="presentation-links">
                [<a href="/wp-content/uploads/2021/07/603b542fafc54003eb4a1a42bb92069f.pdf" target="_blank" rel="noopener">PDF</a>]
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                ⼤学全体でラーニングアナリティクスを始めるには？：教育データ利活⽤ポリシーの策定について
                </div>
                <div class="presentation-links">
                [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2021/05/199d8cbdc595d5ed4e465cfcbc23d822.pdf" target="_blank" rel="noopener">PDF</a>]
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                ラーニングアナリティクスを始めるには
                </div>
                <div class="presentation-links">
                [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/12/4c3c245d55730bbf4efb22c9775bfbb6.pdf" target="_blank" rel="noopener">PDF</a>]
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                教育データの利活用ーラーニングアナリティクスの研究
                </div>
                <div class="presentation-links">
                [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/12/90199ebfc59dfe072a8616c1a6a9e882.pdf" target="_blank" rel="noopener">PDF</a>]
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                日本学術会議学習データ利活用に関する提言の説明
                </div>
                <div class="presentation-links">
                [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/12/630592a7639bfdd240e9750526fb9640.pdf" target="_blank" rel="noopener">PDF</a>]
                </div>
            </li>
            </ul>
            <h2 class="section-title">LEAF関連資料</h2>
            <h3>BookRoll</h3>
            <ul class="presentation-list">
            <li class="presentation-entry">
                <div class="presentation-description">
                <strong>BookRollと音声録音を使ったオンデマンド（非同期）授業【教員用】</strong>の説明
                </div>
                <div class="presentation-links">
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/03/ccd3448eec5c49f158ebcb3fffd6b40c.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                <strong>BookRollと音声会話を使ったリアルタイム（同期）授業【教員用】</strong>の説明
                </div>
                <div class="presentation-links">
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/03/1e8fa04ba32712c24fb3d4ea6a298f12.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                <strong>BookRollと音声録音を使ったオンデマンド（非同期）授業【学生用】</strong>の説明
                </div>
                <div class="presentation-links">
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/04/149af0e5c66b7590da5a252051ec0d1c.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                <strong>BookRollと音声会話を使ったリアルタイム（同期）授業【学生用】</strong>の説明
                </div>
                <div class="presentation-links">
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/04/d39ff7b01926e349a888bc6980aa0a2b.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            </ul>
            <h2 class="section-title">■ LEAF (Moodle, BookRoll, ログパレ(LogPalette))</h3>
            <ul class="presentation-list">
            <li class="presentation-entry">
                <div class="presentation-description">
                LEAFを使った授業設計について（学校導入説明資料）
                </div>
                <div class="presentation-links">
                <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2021/08/e6c1175746bfc3d93eedfa7990283ca5.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                LEAFの説明（アカウントを作成して試すことができます）：基本編
                </div>
                <div class="presentation-links">
                <a href="https://youtu.be/tKTEsweCDEI" target="_blank" rel="noopener">[ビデオ映像]</a>
                <a href="https://www.nii.ac.jp/event/upload/20200508-6_Ogata.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                LEAFの説明：応用編
                </div>
                <div class="presentation-links">
                <a href="https://youtu.be/Pu-sqUrUVXE" target="_blank" rel="noopener">[ビデオ映像]</a>
                <a href="https://www.nii.ac.jp/event/upload/20200515-6_Ogata.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            <li class="presentation-entry">
                <div class="presentation-description">
                高等学校（数学・英語）でのBookRollの活用事例
                </div>
                <div class="presentation-links">
                <a href="https://youtu.be/ShE-_r4vL_0" target="_blank" rel="noopener">[ビデオ映像]</a>
                <a href="https://www.nii.ac.jp/news/upload/20200410-6_Ogata.pdf" target="_blank" rel="noopener">[資料]</a>
                </div>
            </li>
            </ul>
            <h2 class="section-title">マニュアルなど</h3>
            <p class="presentation-description">
            BookRollについてのマニュアル等、もっと詳しく知りたい方は
            <a href="https://eds.let.media.kyoto-u.ac.jp/previous/?page_id=3511" target="_blank" rel="noopener">こちら</a>をご覧ください。
            </p>
            <p class="presentation-description">
            （FAQ・Moodle・BookRoll・ログパレ(LogPalette)の詳しい説明、マニュアルなどがご確認頂けます）
            </p>
            </section>

        </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .row -->
  </div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
