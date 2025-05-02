<?php
/**
 * Template Name: Join Us Page
 *
 * Template for displaying the Join Us page.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="join-us-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <main class="site-main" id="main">
        <section class="join-hero">
            <div class="container">
                <h1 class="join-title">一緒に研究しませんか？</h1>
                <div class="join-description">
                <p>
                    緒方研究室（LET Lab）は、教育と学習の未来を切り拓く情報技術を研究する京都大学の研究室です。<br>
                    国内外から多様な背景を持つ学生や研究者が集まり、最先端の教育データサイエンスや教育テクノロジーの研究に日々取り組んでいます。
                </p>
                <p>
                    LET Labは、意欲的で創造力豊かな大学院生（修士課程・博士課程）を常に募集しています。<br>
                    あなたのアイデアと好奇心を、実際の教育現場で役立つ研究に生かしませんか？
                </p>
                </div>
            </div>
        </section>

        <section class="join-profile">
            <div class="container">
                <h2 class="section-heading">求める学生像</h2>
                <p class="section-intro">
                LET Labでは、次のような方のご参加を歓迎します：
                </p>

                <ul class="profile-list">
                <li>
                    <div class="icon-wrapper"><i class="fas fa-search"></i></div>
                    <span>人の行動や学習プロセスの観察・分析に興味がある方</span>
                </li>
                <li>
                    <div class="icon-wrapper"><i class="fas fa-mobile-alt"></i></div>
                    <span>モバイル情報機器や無線通信技術を教育に応用したい方</span>
                </li>
                <li>
                    <div class="icon-wrapper"><i class="fas fa-lightbulb"></i></div>
                    <span>自分のアイデアをソフトウェアやアプリケーションとして具体的に実現したい方</span>
                </li>
                <li>
                    <div class="icon-wrapper"><i class="fas fa-chart-bar"></i></div>
                    <span>教育データの分析・可視化に興味を持ち、教育改善に貢献したい方</span>
                </li>
                <li>
                    <div class="icon-wrapper"><i class="fas fa-cogs"></i></div>
                    <span>理論だけでなく、実際の教育現場に適用可能な実践的研究をしたい方</span>
                </li>
                </ul>

                <p class="note">
                社会人学生、国際的な視点を持つ留学生も大歓迎です。
                </p>
            </div>
        </section>
        <section class="skills-section">
        <div class="container">
            <h2 class="section-heading">緒方研究室で学べること</h2>
            <p class="section-intro">
            緒方研究室の研究活動を通して、次のような実践的スキルが身につきます。
            </p>

            <div class="skills-grid">
  <!-- Card 1 -->
  <div class="skill-card">
  <div class="skill-header">
  <div class="skill-title-row">
    <img src="<?php echo get_template_directory_uri(); ?>/images/laptop.svg" alt="System icon" class="skill-icon">
    <h3>教育システム設計・開発</h3>
  </div>
  <hr>
</div>
  <ul>
    <li><span class="tick"></span> 実践的な教育システムの設計方法</li>
    <li><span class="tick"></span> インタフェース・ユーザエクスペリエンス（UX）設計</li>
    <li><span class="tick"></span> 開発したシステムが実際の学校で使われる経験</li>
  </ul>
</div>


<!-- Card 2 -->
<div class="skill-card">
  <div class="skill-header">
    <div class="skill-title-row">
      <img src="<?php echo get_template_directory_uri(); ?>/images/database.svg" alt="Data icon" class="skill-icon">
      <h3>データ分析・学習分析</h3>
    </div>
    <hr>
  </div>
  <ul>
    <li><span class="tick"></span> 教育データの収集・分析技術</li>
    <li><span class="tick"></span> データ可視化ツールを活用した情報提示技術</li>
    <li><span class="tick"></span> 機械学習・AIを用いた教育支援手法</li>
  </ul>
</div>

<!-- Card 3 -->
<div class="skill-card">
  <div class="skill-header">
    <div class="skill-title-row">
      <img src="<?php echo get_template_directory_uri(); ?>/images/code-xml.svg" alt="Code icon" class="skill-icon">
      <h3>アプリの開発</h3>
    </div>
    <hr>
  </div>
  <ul>
    <li><span class="tick"></span> Webプログラミング（PHP、Java、C、HTML5）</li>
    <li><span class="tick"></span> iOS/Androidモバイルアプリ開発</li>
    <li><span class="tick"></span> 実践的プロトタイプの制作技術</li>
  </ul>
</div>

<!-- Card 4 -->
<div class="skill-card">
  <div class="skill-header">
    <div class="skill-title-row">
      <img src="<?php echo get_template_directory_uri(); ?>/images/speech.svg" alt="Presentation icon" class="skill-icon">
      <h3>研究成果発表力の強化</h3>
    </div>
    <hr>
  </div>
  <ul>
    <li><span class="tick"></span> 論文執筆（日本語・英語）</li>
    <li><span class="tick"></span> 学会・研究会でのプレゼンテーション力</li>
    <li><span class="tick"></span> 国際的な共同研究・ディスカッションへの参加</li>
  </ul>
</div>


        </div>
</section>
<section class="application-prep-section">
            <div class="container">
                <h2 class="section-title">応募準備の方法</h2>
                <p class="intro">
                LET Labでは、研究室への訪問や大学院の受験を考えている方に、以下のステップをおすすめしています。<br>
                事前にしっかり準備をすることで、あなたの研究への関心や熱意がより伝わりやすくなります。
                </p>

                <div class="faq-item">
                <h3>1. 研究テーマを明確にする</h3>
                <p>研究室のWebサイトに掲載されている代表的な論文をいくつか読み、興味のあるテーマや分野を見つけましょう。</p>
                </div>

                <div class="faq-item">
                <h3>2. 研究計画書を作成する（A4・1ページ程度）</h3>
                <ul>
                    <li>自分がLET Labでどのような研究を行いたいのか</li>
                    <li>なぜそのテーマに興味を持っているのか</li>
                    <li>それが将来どのように活かされると考えているのか</li>
                </ul>
                </div>

                <div class="faq-item">
                <h3>3. 履歴書を準備する</h3>
                <p>学歴・職歴・保有スキルなどを簡潔にまとめた履歴書を用意しておきましょう。</p>
                </div>
            </div>
        </section>

        <section class="admission-flow">
  <div class="selectors">
    <select id="applicantType">
      <option value="master">修士</option>
      <option value="phd">博士</option>
      <option value="research">研究生</option>
      <option value="international">留学生</option>
    </select>

    <select id="entryTerm">
      <option value="april">4月入学</option>
      <option value="october">10月入学</option>
    </select>
  </div>

  <div id="stepsContainer" class="steps-grid"></div>
</section>
<section class="scroll-hero">
  <div class="scroll-hero__bg-wrapper">
  <img src="http://localhost/let/www/wp-content/themes/let_theme/images/kyoto-bg.jpeg" class="scroll-hero__bg" data-anim="scroll-background" data-anim-distance="200">

  </div>
  <div class="scroll-hero__content">
    <h2 class="heading-1">研究の第一歩を、緒方研究室で</h2>
    <a href="/visit" class="btn btn--secondary-outline"><span>見学を予約する</span></a>
  </div>
</section>






        </main>
    </div>
</div>

<?php get_footer(); ?>
