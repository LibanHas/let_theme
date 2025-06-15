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
                            緒方研究室（LET）では、直感や経験に頼ってきた教育を、エビデンスとテクノロジーに基づくものへと進化させることを目指しています。<br><br>学習のプロセスを可視化し、一人ひとりの理解やつまずきを捉えることで、より良い授業づくりと学習支援を実現しています。<br>教育機関と連携しながら、誰もがどこでも効果的に学べる環境を共に築いています。

                            </p>
                            </div>
                            <div class="col-md-6 about-hero-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/center-image.jpg" alt="LET Lab team" class="img-fluid rounded-3">
                            </div>
                        </div>
                    </section>

                   <section class="timeline-section container section-spacing">
                    <h2 class="section-title">緒方研究室の歩み</h2>

                    <div class="timeline-wrapper">
                      <div class="timeline-line"></div>

                      <!-- 1 -->
                      <div class="timeline-milestone" data-aos="zoom-in">
                        <div class="timeline-label top">
                          <div class="timeline-date">2017年4月</div>
                          <div class="timeline-text">京都大学にて緒方研究室を設立</div>
                        </div>
                        <div class="timeline-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/uni_building.png" alt="LET Lab team" class="img-fluid rounded-3"></div>
                      </div>

                      <!-- 2 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="100">
                        <div class="timeline-label bottom">
                          <div class="timeline-date">2018年頃</div>
                          <div class="timeline-text">BookRoll正式運用開始</div>
                        </div>
                        <div class="timeline-icon">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.png" alt="BookRoll Logo">
                        </div>
                      </div>

                      <!-- 3 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="200">
                        <div class="timeline-label top">
                          <div class="timeline-date">2018年〜</div>
                          <div class="timeline-text">LEAFシステム開発・導入開始</div>
                        </div>
                        <div class="timeline-icon">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/brain.svg" alt="brain">
                        </div>
                      </div>

                      <!-- 4 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="300">
                        <div class="timeline-label bottom">
                          <div class="timeline-date">2021年頃</div>
                          <div class="timeline-text">京都市立西京高校などでBookRoll活用</div>
                        </div>
                        <div class="timeline-icon">
                           <img src="<?php echo get_template_directory_uri(); ?>/images/school.svg" alt="school">
                        </div>
                      </div>

                      <!-- 5 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="400">
                        <div class="timeline-label top">
                          <div class="timeline-date">2021年〜</div>
                          <div class="timeline-text">京都大学FD活動にて教員研修での活用開始</div>
                        </div>
                        <div class="timeline-icon">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/graduation-cap.svg" alt="cap">
                        </div>
                      </div>

                      <!-- 6 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="500">
                        <div class="timeline-label bottom">
                          <div class="timeline-date">2023年9月</div>
                          <div class="timeline-text">北海道寿都高校・天塩高校でLEAFシステム実証開始</div>
                        </div>
                        <div class="timeline-icon">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/test.svg" alt="test">
                        </div>
                      </div>

                      <!-- 7 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="600">
                        <div class="timeline-label top">
                          <div class="timeline-date">2023年10月</div>
                          <div class="timeline-text">SIP第3期プロジェクト始動</div>
                        </div>
                        <div class="timeline-icon">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/rocket.svg" alt="rocket">
                        </div>
                      </div>

                      <!-- 8 -->
                      <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="700">
                        <div class="timeline-label bottom">
                          <div class="timeline-date">2024年</div>
                          <div class="timeline-text">xAPIプロファイルサーバ連携プロジェクトに参加</div>
                        </div>
                        <div class="timeline-icon">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/server.svg" alt="server">
                        </div>
                      </div> 
                  </section>

                        <div class="tagline-anim-wrapper">
                        <div class="tagline-split">「見えなかった学び」が見える</div>
                        </div>



                        


                    <!-- Main Content Section -->
                    <section class="about-content section-spacing content-block">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            the_content(); // Editable content from WordPress editor
                        endwhile;
                        ?>
                    </section>

                    <section class="approach-section container content-block">
                        <h2 class="section-title">私たちのアプローチ</h2>
                        <p class="section-intro">
                        緒方研究室では、「見えなかった学び」を可視化することで、教育を直感や経験に頼るものから、データとエビデンスに基づくものへと転換することを目指しています。従来、学習者の理解度やつまずきは教師の勘に委ねられてきました。しかし私たちは、テクノロジーとラーニングアナリティクスを活用することで、学習の過程そのものを記録・分析し、目に見える形で捉え直すことを可能にしています。</p>

                        <p class="section-intro">このようなアプローチは、次の4つのステップからなる開発サイクルで支えられています。まず、教育現場の課題に応じた設計・開発を行い、それを授業に導入。そこで得られる学習ログや行動データを収集・分析し、見えてきた課題や成果をもとに振り返りと改善を重ねていきます。この循環を繰り返すことで、教育の質を継続的に高め、学習者一人ひとりに最適な学びの支援を届けることが可能になります。</p>

                          <div class="research-cycle container section-spacing">
                            <div class="research-cycle-layout">
                              <!-- Top -->
                              <div class="research-text top">
                                <h3>研究</h3>
                                <p>学習ログや教育理論をもとに、現場の課題を分析。AIやデータサイエンスを活用し、教育の個別最適化を目指しています。</p>
                              </div>

                              <!-- Right -->
                              <div class="research-text right">
                                <h3>開発</h3>
                                <p>得られた知見をもとに、教育支援ツールを開発。BookRollやLogPaletteなど、現場で使いやすいシステムを設計しています。</p>
                              </div>

                              <!-- Bottom -->
                              <div class="research-text bottom">
                                <h3>授業実施</h3>
                                <p>パイロット校で実際の授業に導入し、教育効果や課題を検証。多様な学校と連携し、現場での検証を行います。</p>
                              </div>

                              <!-- Left -->
                              <div class="research-text left">
                                <h3>フィードバック</h3>
                                <p>授業で得たフィードバックやデータをもとに改善。改良は次の研究サイクルへつながり、実践的な教育イノベーションを生み出します。</p>
                              </div>

                              <!-- Centered SVG -->
                              <div class="research-cycle-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about-research.svg" alt="研究サイクルの図" class="research-cycle-graphic" />
                              </div>
                            </div>
                      ``</div>
                        <section class="founder-quote-section container content-block">
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
                                    私たちの開発しているような教育システムが日本のスタンダードになって、全国各学校の教育データが集約されて、どのような教育をすればよいのかがわかるようになり、より質の高い学びが実現するとうれしいです。日本に生まれれば日本語を話せるようになるように、人間というのは学ぶ生き物だと思います。その学び方について、個人に合ったものにできればよいですね。
                                    </p>
                                </div>
                                </div>

                                </div>
                            </section>
                           


                        <div class="approach-buttons">
                        <a href="research/" class="btn btn--cta">
                          <span>研究内容を見る</span>
                        </a>
                        </div>
                        </section>

                        <section class="voices-section section-spacing content-block">
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
        <h3 class="student-name">一伊建　初音</h3>
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
<div class="row justify-content-center">
  <div class="col-md-10 text-left qa-block">
    <div class="qa-item">
      <p class="question">緒方研究室での研究生活は、どのような経験ですか？</p>
      <p>研究室では、ゼミ等の発表やディスカッションを通じて、自分の研究を深めたり他の人の視点を取り入れたりする機会が多くあります。先生方や先輩方にも気軽に質問や相談ができる環境で、研究室が一体となって、熱意を持って研究に取り組んでいると感じます。</p>
    </div>

    <div class="qa-item">
      <p class="question">国際的な研究環境で学ぶことで、どのような影響を受けましたか？</p>
      <p>はじめは、学生を専業として進学した日本人学生が少数派であることにとても驚きました。さまざまなバックグラウンドを持つ方と話す中で、「授業での参加の仕方」や「学びへの姿勢」に国や文化の違いがあることに気づき、非常に刺激を受けています。英語・日本語の両方でのコミュニケーションが求められる環境の中で、英語は「学ぶべきもの」から「使うための道具」へと意識が変わりました。</p>
    </div>

    <div class="qa-item">
      <p class="question">教育工学という分野において、緒方研究室だからこそできた学びは何ですか？</p>
      <p>緒方研究室では、研究だけでなく「人との関わり方」も大切な学びの一つだと実感しています。実際の教育現場で日常的に使われるシステムを研究・開発・実証を行うので、さまざまな立場の方と関わる機会があります。開発者、現場の先生方、生徒、それぞれのニーズや制約を理解し、調整しながら研究を進めることが求められます。こうした経験を通して、単なる技術開発にとどまらず、実社会に根ざした研究のあり方を学んでいます。</p>
    </div>
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
      <h3 class="student-name">スティーブ・ウラストン</h3>
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
<div class="row justify-content-center">
  <div class="col-md-10 text-left qa-block">
    <div class="qa-item">
      <p class="question">緒方研究室に入ろうと思ったきっかけは何ですか？</p>
      <p>ニュージーランドで教育工学を学んでいたときに、学習ログを活用した研究に興味を持ちました。その中で、BookRollやLogPaletteなどのツールを活用して教育現場で実証的な研究を行っている緒方研究室を知り、「ここでなら自分の研究を深められる」と思って志望しました。</p>
    </div>

    <div class="qa-item">
      <p class="question">ここで研究目標を達成するために、どのようなサポートを受けましたか？</p>
      <p>先生方からの丁寧な指導に加えて、週ごとのゼミでフィードバックをもらえる環境がとてもありがたいです。また、同じように留学生として頑張っている仲間がいるので、精神的にも支えられています。英語・日本語の両方で情報が得られるのも大きな助けになっています。</p>
    </div>

    <div class="qa-item">
      <p class="question">これから緒方研究室に入ろうとしている人に、どんなメッセージがありますか？</p>
      <p>国際的な環境で、自分のペースで研究を進めたい人にはとてもおすすめの研究室です。教育現場とつながりながら実践的な研究ができるので、理論と現場を結びつけたい人には特に合っていると思います。日本語が完璧でなくても、安心して参加できる雰囲気がありますよ。</p>
    </div>
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
      <a href="join-us/" class="btn btn--cta">
        <span>訪問予約をする</span>
      </a>
      <a href="join-us/" class="btn btn--cta">
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
