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
                    <section class="about-hero container section-spacing">
                        <div class="row align-items-center">
                            <div class="col-md-6 about-hero-text">
                            <h1 class="about-hero-title">すべての学びに、エビデンスとテクノロジーを。</h1>
                            <p class="about-hero-subtitle">
                            緒方研究室（LET）では、直感や経験に頼ってきた教育を、エビデンスとテクノロジーに基づくものへと進化させることを目指しています。学習のプロセスを可視化し、一人ひとりの理解やつまずきを捉えることで、より良い授業づくりと学習支援を実現しています。<br>教育機関と連携しながら、誰もがどこでも効果的に学べる環境を共に築いています。

                            </p>
                            </div>
                            <div class="col-md-6 about-hero-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about-hero-image.jpg" alt="LET Lab team" class="img-fluid rounded-3">
                            </div>
                        </div>
                    </section>

                    <section class="timeline-section container section-spacing">
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



                        


                    <!-- Main Content Section -->
                    <section class="about-content section-spacing">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            the_content(); // Editable content from WordPress editor
                        endwhile;
                        ?>
                    </section>

                    <section class="approach-section container">
                        <h2 class="section-title">私たちのアプローチ</h2>
                        <p class="section-intro">
                        緒方研究室では、「見えなかった学び」を可視化することで、教育を直感や経験に頼るものから、データとエビデンスに基づくものへと転換することを目指しています。従来、学習者の理解度やつまずきは教師の勘に委ねられてきました。しかし私たちは、テクノロジーとラーニングアナリティクスを活用することで、学習の過程そのものを記録・分析し、目に見える形で捉え直すことを可能にしています。</p>

                        <p class="section-intro">このようなアプローチは、次の4つのステップからなる開発サイクルで支えられています。まず、教育現場の課題に応じた設計・開発を行い、それを授業に導入。そこで得られる学習ログや行動データを収集・分析し、見えてきた課題や成果をもとに振り返りと改善を重ねていきます。この循環を繰り返すことで、教育の質を継続的に高め、学習者一人ひとりに最適な学びの支援を届けることが可能になります。</p>


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
                                    LETでは、学びを深めるだけでなく、学習者一人ひとりのニーズに寄り添う教育技術の発展をミッションとしています。直感や経験に頼っていた教育を、データとエビデンスに基づくものへと転換することを目指しています。
                                    </p>
                                </div>
                                </div>

                                </div>
                            </section>
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
                            緒方研究室での研究生活はどんな感じ？<br>
                            世界中から集まったメンバーとともに、アイデアを共有し、課題を一緒に解決しながら、テクノロジーが学びをどう深められるかを探究しています。<br>
                            ここでは、2名のラボメンバーの声をご紹介します。
                            </p>

                           <!-- Voice 1 -->
<div class="row align-items-center voice-block mb-5">
  
  <!-- Image scrolls UP -->
   <div class="col-md-6 text-center">
  <div class="scroll-float" data-speed="-0.05">
    <img src="<?php echo get_template_directory_uri(); ?>/images/ichidate-san-profile.jpg" alt="伊達 初音" class="founder-photo img-fluid rounded-3">
    </div>
    <div class="student-title">
        <h3 class="student-name">伊達　初音</h3>
        <p class="student-role">修士2年生</p>
    </div>

  </div>

  <!-- Quote scrolls DOWN -->
  <div class="col-md-6 scroll-float" data-speed="0.05">
    <div class="founder-quote-box">
      <span class="quote-icon">“</span>
      <p class="founder-quote-text">
        文化や学問的背景の異なる人々との協働を通じて、教育に対する自分の視野が広がりました。
      </p>
    </div>
  </div>
</div>

<!-- Centered Intro Paragraph -->
<div class="row justify-content-center mb-300">
  <div class="col-md-10 text-center">
  <p class="founder-intro mt-3">
    <strong>緒方研究室での研究生活は、どのような経験ですか？</strong><br>
毎週のゼミでは、自分の研究だけでなく他のメンバーの発表を通じて多様な視点を得られます。和気あいあいとした雰囲気の中でも、意見交換は非常に活発で、常に刺激を受けています。
<br>
<strong>国際的な研究環境で学ぶことで、どのような影響を受けましたか？</strong><br>
英語で議論する機会が多く、自分の考えを明確に伝える力が鍛えられました。また、異なる教育文化に触れることで、自分の研究テーマにも新しい観点が加わりました。
<br>
<strong>教育工学という分野において、緒方研究室だからこそできた学びは何ですか？</strong><br>
実際の授業現場とつながっているところが大きいです。自分の研究がどのように教育に役立つのかを常に意識しながら進めることができました。
    </p>
  </div>
</div>


                          <!-- Voice 2 -->
<div class="row align-items-center voice-block mb-5 flex-md-row-reverse">

<!-- Image scrolls UP -->
<div class="col-md-6 text-center">
  <div class="scroll-float" data-speed="-0.05">
    <img src="<?php echo get_template_directory_uri(); ?>/images/steve-portrait.jpg" alt="スティーブ・ウーラストン" class="founder-photo img-fluid rounded-3">
  </div>
  <div class="student-title">
      <h3 class="student-name">スティーブ・ウーラストン</h3>
      <p class="student-role">博士課程2年</p>
  </div>
</div>

  <!-- Quote -->
  <div class="col-md-6 scroll-float" data-speed="0.05">
    <div class="founder-quote-box">
      <span class="quote-icon">“</span>
      <p class="founder-quote-text">
        LETラボでは、実際の教育現場と結びついた研究に取り組むことができ、自分の研究が社会とつながっているという実感を持てます。
      </p>
    </div>
  </div>
</div>

<!-- Centered Intro Paragraph -->
<div class="row justify-content-center mb-300">
  <div class="col-md-10 text-center">
  <p class="founder-intro mt-3">
    <strong>緒方研究室での研究生活は、どのような経験ですか？</strong><br>
毎週のゼミでは、自分の研究だけでなく他のメンバーの発表を通じて多様な視点を得られます。和気あいあいとした雰囲気の中でも、意見交換は非常に活発で、常に刺激を受けています。
<br>
<strong>国際的な研究環境で学ぶことで、どのような影響を受けましたか？</strong><br>
英語で議論する機会が多く、自分の考えを明確に伝える力が鍛えられました。また、異なる教育文化に触れることで、自分の研究テーマにも新しい観点が加わりました。
<br>
<strong>教育工学という分野において、緒方研究室だからこそできた学びは何ですか？</strong><br>
実際の授業現場とつながっているところが大きいです。自分の研究がどのように教育に役立つのかを常に意識しながら進めることができました。
    </p>
  </div>
  <div class="text-center mt-5">
  <a href="/members" class="btn btn--secondary-outline btn--secondary-outline-dark">
    <span>メンバー紹介を見る</span>
  </a>
</div>
</div>

                        </section>


                        <section class="cta-section">
  <div class="container cta-wrapper">
    
    <div class="cta-image">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logpalette-mascot.png" alt="Mascot Robot">
    </div>

    <div class="cta-content">
      <h2 class="cta-title">メンバー募集に興味がありますか？</h2>
      <p class="cta-text">
        私たちは、教育技術の発展に情熱を注ぐ研究者や学生の参加をいつでも歓迎しています。<br>
        私たちのミッションに共感してくださる方はもちろん、「ちょっと見てみたい」という方も大歓迎です。<br>
        ぜひお気軽にご連絡ください！
      </p>

      <div class="cta-buttons">
      <a href="/members" class="btn btn--secondary-outline btn--secondary-outline-dark">
        <span>訪問予約をする</span>
      </a>
      <a href="/members" class="btn btn--secondary-outline btn--secondary-outline-dark">
        <span>チームに参加する</span>
      </a>

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
