<?php
/**
 * Template Name: About Page
 *
 * @package Understrap
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="wrapper" id="about-page-wrapper">
  <div class="container-fluid" id="content">
    <main class="site-main" id="main">

      <!-- Hero Section -->
      <section class="about-hero section-spacing">
        <div class="container">
          <div class="row align-items-center">
            <!-- Text Column -->
            <div class="col-12 col-lg-6 mb-4 mb-lg-0 text-lg-start text-center">
              <h1 class="about-hero-title fw-bold mb-4">
                <span class="d-block d-md-inline">すべての学びに、</span>
                <span class="d-block d-md-inline">エビデンスとテクノロジーを。</span>
              </h1>
              <p>
                緒方研究室（LET）では、直感や経験に頼ってきた教育を、エビデンスとテクノロジーに基づくものへと進化させることを目指しています。
              </p>
              <p>
                学習のプロセスを可視化し、一人ひとりの理解やつまずきを捉えることで、より良い授業づくりと学習支援を実現しています。<br>
                教育機関と連携しながら、誰もがどこでも効果的に学べる環境を共に築いています。
              </p>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-lg-6 text-center">
              <img src="<?php echo get_template_directory_uri(); ?>/images/center-image.jpg" alt="LET Lab building" class="img-fluid rounded-3">
            </div>
          </div>
        </div>
      </section>

      <!-- Timeline Section -->
      <section class="timeline-section section-spacing">
        <div class="container">
          <h2 class="section-title">緒方研究室の歩み</h2>
          <div class="timeline-wrapper">
          <div class="timeline-line"></div>

          <?php
          $milestones = [
            ["2017年4月", "京都大学にて緒方研究室を設立", "uni_building.png", "LET Lab team"],
            ["2018年頃", "BookRoll正式運用開始", "bookroll-icon.svg", "BookRoll Logo"],
            ["2018年〜", "LEAFシステム開発・導入開始", "brain.svg", "brain"],
            ["2021年頃", "京都市立西京高校などでBookRoll活用", "school.svg", "school"],
            ["2021年〜", "京都大学FD活動にて教員研修での活用開始", "graduation-cap.svg", "cap"],
            ["2023年9月", "北海道寿都高校・天塩高校でLEAFシステム実証開始", "test.svg", "test"],
            ["2023年10月", "SIP第3期プロジェクト始動", "rocket.svg", "rocket"],
            ["2024年", "xAPIプロファイルサーバ連携プロジェクトに参加", "server.svg", "server"]
          ];

          foreach ($milestones as $i => [$date, $text, $img, $alt]) :
            $labelClass = $i % 2 === 0 ? 'top' : 'bottom';
            $delay = $i * 100;
          ?>
            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="<?= esc_attr($delay); ?>">
              <div class="timeline-label <?= esc_attr($labelClass); ?>">
                <div class="timeline-date"><?= esc_html($date); ?></div>
                <div class="timeline-text"><?= esc_html($text); ?></div>
              </div>
              <div class="timeline-icon">
                <img src="<?= esc_url(get_template_directory_uri() . '/images/' . $img); ?>" alt="<?= esc_attr($alt); ?>" class="img-fluid rounded-3">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
            <!-- Tagline Animation Section -->
      <div class="tagline-anim-wrapper">
        <div class="tagline-split">「見えなかった学び」が見える</div>
      </div>
      <section class="approach-section container content-block">
      <h2 class="section-title">私たちのアプローチ</h2>
      <p class="section-intro">
        緒方研究室では、「見えなかった学び」を可視化することで、教育を直感や経験に頼るものから、データとエビデンスに基づくものへと転換することを目指しています。
        従来、学習者の理解度やつまずきは教師の勘に委ねられてきました。
        しかし私たちは、テクノロジーとラーニングアナリティクスを活用することで、学習の過程そのものを記録・分析し、目に見える形で捉え直すことを可能にしています。
      </p>
      <section class="founder-quote-section container content-block">
      <div class="row align-items-center">
        <!-- Left: Image -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
          <img src="<?php echo get_template_directory_uri(); ?>/images/ogata_portrait 1.png" alt="Prof Hiroaki Ogata" class="founder-photo img-fluid rounded-3">
          <p class="founder-caption mt-3">緒方広明 教授（博士）緒方研究室創設者</p>
        </div>

        <!-- Right: Quote -->
        <div class="col-md-6">
          <div class="founder-quote-box">
            <span class="quote-icon">“</span>
            <p class="founder-quote-text">
              私たちの開発しているような教育システムが日本のスタンダードになって、全国各学校の教育データが集約されて、どのような教育をすればよいのかがわかるようになり、
              より質の高い学びが実現するとうれしいです。
              日本に生まれれば日本語を話せるようになるように、人間というのは学ぶ生き物だと思います。
              その学び方について、個人に合ったものにできればよいですね。
            </p>
          </div>
        </div>
      </div>
    </section>
      <p class="section-intro"> そこで得られる学習ログや行動データを収集・分析し、見えてきた課題や成果をもとに振り返りと改善を重ねていきます。このようなアプローチは、教育現場の課題に応じた4つのステップからなる開発サイクルで支えられています。
      </p>
    </section>

    

    <section class="research-cycle container">

  <div class="research-cycle-layout">
    
    <div class="research-point top-left">
      <div class="research-text">
        <h3>研究</h3>
        <p>学習ログや教育理論をもとに、現場の課題を分析。AIやデータサイエンスを活用し、教育の個別最適化を目指しています。</p>
      </div>
    </div>

    <div class="research-point top-right">
      <div class="research-text">
        <h3>開発</h3>
        <p>得られた知見をもとに、教育支援ツールを開発。BookRollやLogPaletteなど、現場で使いやすいシステムを設計しています。</p>
      </div>
    </div>

    <div class="research-point bottom-right">
      <div class="research-text">
        <h3>授業実施</h3>
        <p>パイロット校で実際の授業に導入し、教育効果や課題を検証。多様な学校と連携し、現場での検証を行います。</p>
      </div>
    </div>

    <div class="research-point bottom-left">
      <div class="research-text">
        <h3>フィードバック</h3>
        <p>授業で得たフィードバックやデータをもとに改善。改良は次の研究サイクルへつながり、実践的な教育イノベーションを生み出します。</p>
      </div>
    </div>

    <div class="research-cycle-center">
      <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/images/about-research.svg" class="research-cycle-graphic"></object>
    </div>
  </div>
  
</section>
<div class="approach-buttons">
                        <a href="research/" class="btn btn--cta">
                          <span>研究内容を見る</span>
                        </a>
                        </div>
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
            <p>私は教育の質を高めるために人工知能を活用するという緒方研究室の取り組みに強く惹かれました。特に、言語学習をサポートするチャットボットシステムの開発という自分の研究テーマが、ラボの「Learning and Educational Technologies」に関する研究とぴったり合っていたのが大きな理由です。心理学、言語学、そしてコンピュータサイエンスのバックグラウンドを持つ私にとって、分野横断的なアプローチをとる緒方研究室は理想的な環境でした。さらに、京都の夏に欠かせない快適な空調設備（笑）、そして毎日ラボメンバーと日本語で交流できる温かい雰囲気も、研究生活をより充実したものにしてくれています。</p>
          </div>

          <div class="qa-item">
            <p class="question">ここで研究目標を達成するために、どのようなサポートを受けましたか？</p>
            <p>ここでのサポートは本当に素晴らしいです！緒方教授やフラナガン准教授をはじめ、多くの研究者の方々が時間を割いてアイデアのブラッシュアップや論文執筆、学会発表の準備まで親身にアドバイスしてくださいました。定例のミーティングはもちろん、コーヒーや抹茶を飲みながらのカジュアルな会話でも刺激的な気づきがあり、研究の幅が広がりました。こうした協働的な環境のおかげで、チャットボットがいかに言語学習を楽しく効果的にできるかを探求することができ、研究者として大きく成長できたと感じています。</p>
          </div>

          <div class="qa-item">
            <p class="question">これから緒方研究室に入ろうとしている人に、どんなメッセージがありますか？</p>
            <p>もし緒方研究室に興味があるなら、ぜひ飛び込んでみてください！ここは最先端の研究に挑戦できるだけでなく、温かくサポートしてくれるコミュニティです。AIや教育、またはその両方に関心がある方には、学び・共有・成長のための無限のチャンスがあります。日本語の練習をする機会もたくさんありますし（心配しなくても、皆さんとても忍耐強く、励ましてくれます！）。私にとっては、分野への貢献や実践的なスキルの習得、そして言語学習をもっと身近にするための取り組みに力を注げる場でした。ぜひこの“ファミリー”に加わってみませんか？</p>
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
                <h2 class="cta-title">一緒に学びを進化させませんか？</h2>
                <p class="cta-text">
                  緒方研究室では、新しい教育のかたちを共に探究する仲間を募集しています。<br>
                  大学院進学に関心のある方、研究室を訪問してみたい方、まずはぜひお気軽にご連絡ください。
                </p>

                <div class="cta-buttons">
                  <a href="mailto:info@let.media.kyoto-u.ac.jp" class="btn btn--cta">
                    <span>メールで連絡する</span>
                  </a>
                  <a href="/join-us/" class="btn btn--cta">
                    <span>詳しく見る</span>
                  </a>
                </div>
              </div>
            </div>
          </section>
    </main>
  </div>
</div>

<?php get_footer(); ?>
