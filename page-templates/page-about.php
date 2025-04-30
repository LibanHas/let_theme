<?php
/**
 * Template Name: About Page
 *
 * Template for displaying the About page with editable content.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="about-page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div class="row">
            <div class="col-12 content-area" id="primary">
                <main class="site-main" id="main">
                    
                    <!-- Hero Section -->
                    <section class="about-hero container">
                        <div class="row align-items-center">
                            <div class="col-md-6 about-hero-text">
                            <h1 class="about-hero-title">テクノロジーで、すべての学習者に寄り添う。</h1>
                            <p class="about-hero-subtitle">
                            緒方研究室では、データ・デザイン・国際的な協働を結集し、一人ひとりのニーズに応える教育技術の開発に取り組んでいます。いつでも、どこでも、誰もが効果的に学べる環境を目指して。

                            </p>
                            </div>
                            <div class="col-md-6 about-hero-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about-hero.jpg" alt="LET Lab team" class="img-fluid rounded-3">
                            </div>
                        </div>
                    </section>

                    <section class="timeline-section container">
                        <h2 class="timeline-title section-title">緒方研究室の歩み</h2>

                        <div class="timeline-wrapper">
                            <div class="timeline-line"></div>

                            <!-- 1 -->
                            <div class="timeline-milestone" data-aos="zoom-in">
                            <div class="timeline-label top">
                                <div class="timeline-date">2017年4月</div>
                                <div class="timeline-text">ラボ設立（京都大学）</div>
                            </div>
                            <div class="timeline-icon">🏛️</div>
                            </div>

                            <!-- 2 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="100">
                            <div class="timeline-label bottom">
                                <div class="timeline-date">2017年12月</div>
                                <div class="timeline-text">国際共同研究開始</div>
                            </div>
                            <div class="timeline-icon">🌐</div>
                            </div>

                            <!-- 3 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="200">
                            <div class="timeline-label top">
                                <div class="timeline-date">2018年春頃</div>
                                <div class="timeline-text">初のパイロット校導入</div>
                            </div>
                            <div class="timeline-icon">🎓</div>
                            </div>

                            <!-- 4 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="300">
                            <div class="timeline-label bottom">
                                <div class="timeline-date">2018年6月</div>
                                <div class="timeline-text">BookRoll公開</div>
                            </div>
                            <div class="timeline-icon">📚</div>
                            </div>

                            <!-- 5 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="400">
                            <div class="timeline-label top">
                                <div class="timeline-date">2018年9月</div>
                                <div class="timeline-text">国際ジャーナル論文採択</div>
                            </div>
                            <div class="timeline-icon">📄</div>
                            </div>

                            <!-- 6 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="500">
                            <div class="timeline-label bottom">
                                <div class="timeline-date">2018年11月</div>
                                <div class="timeline-text">国際ワークショップ開催（LA@ICCE2018）</div>
                            </div>
                            <div class="timeline-icon">🎤</div>
                            </div>

                            <!-- 7 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="600">
                            <div class="timeline-label top">
                                <div class="timeline-date">2019年9月</div>
                                <div class="timeline-text">LogPalette発表</div>
                            </div>
                            <div class="timeline-icon">📊</div>
                            </div>

                            <!-- 8 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="700">
                            <div class="timeline-label bottom">
                                <div class="timeline-date">2020年11月</div>
                                <div class="timeline-text">国際的研究協力の拡大</div>
                            </div>
                            <div class="timeline-icon">🤝</div>
                            </div>

                            <!-- 9 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="800">
                            <div class="timeline-label top">
                                <div class="timeline-date">2023年4月</div>
                                <div class="timeline-text">SIP第3期開始</div>
                            </div>
                            <div class="timeline-icon">📈</div>
                            </div>

                            <!-- 10 -->
                            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="900">
                            <div class="timeline-label bottom">
                                <div class="timeline-date">2025年4月</div>
                                <div class="timeline-text">10周年ビジョン策定</div>
                            </div>
                            <div class="timeline-icon">🚀</div>
                            </div>

                        </div>
                        </section>

                        <div class="tagline-anim-wrapper">
                        <div class="tagline-split">「見えなかった学び」が見える</div>
                        </div>



                        <section class="founder-quote-section container">
                            <div class="row">
                                
                                <!-- Left: Image -->
                                <div class="col-md-6 text-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/ogata_portrait 1.png" alt="Prof Hiroaki Ogata" class="founder-photo img-fluid rounded-3">
                                <p class="founder-caption mt-3">緒方広明 教授（博士）緒方研究室創設者</p>
                                </div>

                                <!-- Right: Quote -->
                                <div class="col-md-6">
                                <div class="founder-quote-box">
                                    <span class="quote-icon">“</span>
                                    <p class="founder-quote-text">
                                    LETでは、学びを深めるだけでなく、学習者一人ひとりのニーズに寄り添う教育技術の発展をミッションとしています。<br>
                                    私たちは、テクノロジーが教育を支え、よりパーソナライズされ、誰にとってもアクセスしやすく、そして効果的な学びを、いつでもどこでも実現できると信じています。
                                    </p>
                                </div>
                                </div>

                                </div>
                            </section>


                    <!-- Main Content Section -->
                    <section class="about-content">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            the_content(); // Editable content from WordPress editor
                        endwhile;
                        ?>
                    </section>

                    <section class="approach-section container">
                        <h2 class="section-title text-center">私たちのアプローチ</h2>
                        <p class="section-intro text-center">
                            LET研究室では、教育現場と連携しながら、次世代の学習環境を設計・検証しています。<br>
                            この開発サイクルは、以下の4つのステップで構成されています。
                        </p>

                        <div class="approach-cards">
                            <div class="approach-card">
                            <div class="approach-icon">🧠</div>
                            <h3>研究</h3>
                            <p>
                                学習ログや教育理論をもとに、現場の課題を分析。AIやデータサイエンスを活用し、教育の個別最適化を目指しています。
                            </p>
                            </div>

                            <div class="approach-card">
                            <div class="approach-icon">🧰</div>
                            <h3>開発</h3>
                            <p>
                                得られた知見をもとに、教育支援ツールを開発。BookRollやLogPaletteなど、現場で使いやすいシステムを設計しています。
                            </p>
                            </div>

                            <div class="approach-card">
                            <div class="approach-icon">👩‍🏫</div>
                            <h3>授業実施</h3>
                            <p>
                                パイロット校で実際の授業に導入し、教育効果や課題を検証。多様な学校と連携し、現場での検証を行います。
                            </p>
                            </div>

                            <div class="approach-card">
                            <div class="approach-icon">📈</div>
                            <h3>フィードバック</h3>
                            <p>
                                授業で得たフィードバックやデータをもとに改善。改良は次の研究サイクルへつながり、実践的な教育イノベーションを生み出します。
                            </p>
                            </div>
                        </div>

                        <div class="approach-buttons">
                            <a href="https://eds.let.media.kyoto-u.ac.jp/leaf/bookroll/" target="_blank" class="btn btn--secondary-outline btn--secondary-outline-dark">
                            <span>BookRollについて詳しく</span>
                            </a>
                            <a href="https://eds.let.media.kyoto-u.ac.jp/leaf/logpalette/" target="_blank" class="btn btn--secondary-outline btn--secondary-outline-dark">
                            <span>LogPaletteについて詳しく</span>
                            </a>
                        </div>
                        </section>

                        <section class="voices-section">
                            <div class="container">
                                <h2 class="section-title">学生の声</h2>
                                <p class="section-intro">
                                LETラボでの研究生活はどんな感じ？<br>
                                世界中から集まったメンバーとともに、アイデアを共有し、課題を一緒に解決しながら、テクノロジーが学びをどう深められるかを探究しています。<br>
                                ここでは、2名のラボメンバーの声をご紹介します。
                                </p>

                                <!-- Voice 1 -->
                                <div class="row align-items-center voice-block mb-5">
                                <div class="col-md-6 text-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/student_date.jpg" alt="伊達 初音" class="founder-photo img-fluid rounded-3">
                                    <p class="founder-caption mt-3">伊達 初音（修士2年生）</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="founder-quote-box">
                                    <span class="quote-icon">“</span>
                                    <p class="founder-quote-text">
                                        文化や学問的背景の異なる人々との協働を通じて、教育に対する自分の視野が広がりました。
                                    </p>
                                    </div>
                                </div>
                                </div>

                                <!-- Voice 2 -->
                                <div class="row align-items-center voice-block mb-5 flex-md-row-reverse">
                                <div class="col-md-6 text-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/student_steve.jpg" alt="スティーブ・ウーラストン" class="founder-photo img-fluid rounded-3">
                                    <p class="founder-caption mt-3">スティーブ・ウーラストン（博士後期課程2年）</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="founder-quote-box">
                                    <span class="quote-icon">“</span>
                                    <p class="founder-quote-text">
                                        LETラボでは、実際の教育現場と結びついた研究に取り組むことができ、自分の研究が社会とつながっているという実感を持てます。
                                    </p>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </section>


    



                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .row -->
    </div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
