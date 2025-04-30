<?php
/**
 * Template Name: Template-Home
 */
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="idea-svg-container">
  
 
  <svg class="idea-lines" width="100%" height="100%" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid meet">
    
    <path d="M952.5,180 L820,40 L0,0" class="idea-line delay-1 duration-very-slow" />
   
    <path d="M952.5,180 L880,60 L0,60" class="idea-line delay-2 duration-slow" />
    <path d="M952.5,180 L952.5,0 L0,0" class="idea-line delay-3 duration-fast" />
    <path d="M952.5,180 L1020,60 L1920,60" class="idea-line delay-4 duration-med" />
    <path d="M952.5,180 L1080,40 L1920,40" class="idea-line delay-5 duration-slow" />
    <path d="M952.5,180 L820,180 L820,0 L0,0" class="idea-line delay-6 duration-slow" />
    <path d="M952.5,180 L1080,180 L1080,0 L1920,0" class="idea-line delay-7 duration-med" />
    <path d="M952.5,180 L900,120 L900,0 L0,0" class="idea-line delay-8 duration-med" />
    <path d="M952.5,180 L1005,120 L1005,0 L1920,0" class="idea-line delay-9 duration-med" />
    <path d="M952.5,180 L800,180 L800,0 L0,0" class="idea-line delay-10 duration-fast" />
  </svg>
</div> 


<!-- 🔹 Full-width tagline (outside container) -->
 <h1 class="tagline">
    未来の教育をデザインする<br>
    LETでの研究を始めよう
</h1> 


<section class="about-let">
  <div data-anim-trigger="">
    <div class="anim-scroll-background">
      <div class="anim-scroll-background__img-wrapper">
	  <div class="image-snippet image-snippet__fill image-snippet__fill--desktop image-snippet__fill--tablet image-snippet__fill--mobile"
     style="--aspect-ratio: 1440 / 1100; --aspect-ratio-tablet: 1440 / 1100; --aspect-ratio-mobile: 1440 / 1100;">
  
  <img class="image-snippet__img image-snippet__img--fill image-snippet__img--desktop"
       src="<?php echo get_template_directory_uri(); ?>/images/lab-image.jpeg"
       alt="LET Lab background" loading="lazy">
</div>

      </div>

      <div class="about-let-inner">
      <div class="quote-heading">
  <div class="split-line">LET研究室では、より良い学びを支える</div>
  <div class="split-line">研究をしています。現場と連携し、教育</div>
  <div class="split-line">データとテクノロジーを活用したツール</div>
  <div class="split-line">を開発しています。</div>
</div>



        <a data-anim-trigger-self="" data-anim="fade-in" href="/about" class="btn btn--secondary-outline">
          <span>LETについてもっと知る</span>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- 🔹 Learning-centered section -->
<section class="learning-centered-section mb-25">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Text block floats upward with sticky+pause -->
<div class="col-md-5">
  <div class="sticky-section">
    <div class="sticky-content">
      <h2 class="section-heading">学習者中心</h2>
      <p class="section-text">
        LET研究室では、いつでもどこでも学べる教育を支援するために、
        学習者中心のツールを設計し、学生が最適なタイミングと場所で学べるようサポートしています。
      </p>
    </div>
  </div>
</div>


    <!-- Image floats downward with fade-in -->
<div class="col-md-5 offset-md-1">
  <div class="float-wrapper sticky-section">
	<div class="sticky-content">
    <img src="<?php echo get_template_directory_uri(); ?>/images/learning-centered.png" 
     alt="学習者中心イラスト" 
     class="img-fluid scroll-float fade-in-on-scroll"  
     data-speed="0.3">

  </div>
</div>
</div>

    </div>
  </div>
</section>



<!-- 🔹 Data-driven section -->
<section class="learning-centered-section">
  <div class="container">
    <div class="row align-items-center justify-content-around">

      <!-- Image fades in and stays -->
      <div class="col-md-5">
        <div class="float-wrapper sticky-section">
          <div class="sticky-content">
		  <img 
  src="<?php echo get_template_directory_uri(); ?>/images/graph.png"
  alt="データ駆動型イラスト"
  class="img-fluid scroll-float fade-in-on-scroll"
  data-speed="-0.2">

          </div>
        </div>
      </div>

      <!-- Text scrolls upward and locks -->
      <div class="col-md-5 offset-md-1">
  <div class="float-wrapper sticky-section">
    <div class="sticky-content">
      <div class="text-content-wrapper scroll-float fade-in-on-scroll"
           data-speed="-0.2">
        <h2 class="section-heading">データ駆動型</h2>
        <p class="section-text">
          教育ビッグデータとラーニングアナリティクスを活用することで、個別最適化されたデータ駆動型の学習体験を実現しています。
        </p>
      </div>
    </div>
  </div>
</div>


    </div>
  </div>
</section>


 <section class="video-intro py-4">
  <div class="container text-center">
    <h2 class="section-heading mb-3">LEAFシステムの全体像</h2>
    <p class="section-text">
      ここまでで「LETの役割」を大まかにご説明しました。<br>
      この動画では、それらを支えるLEAFシステムの仕組みをご覧いただけます。
    </p>
  </div>
</section>
<section class="video-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe
            class="embed-responsive-item"
            src="https://www.youtube.com/embed/UaFCPePgc54?start=1"
            title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a data-anim-trigger-self="" data-anim="fade-in" href="/about" class="btn btn--secondary-outline btn--secondary-outline-dark">
        <span>LETについてもっと知る</span>
      </a>
    </div>
  </div> 
</section> 


<section class="our-tools-section">
  <div class="container">
  <h2 class="section-title">Our Tools</h2>
  <h3 class="section-title section-title--sub">ツール</h3>


    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.png" alt="BookRoll Logo">
      </div>
      <div class="tool-description">
        <p>
          BookRollは、双方向型の教材を配信・記録できるデジタルプラットフォームで、
          個別最適化されたデータ駆動型の学びを実現します。
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self="" data-anim="fade-in" href="/about" class="btn btn--secondary-outline btn--secondary-outline-dark">
          <span>Bookrollの詳細へ</span>
        </a>
      </div>
    </div>

    <hr class="tool-divider">

    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logpalette-icon.png" alt="LogPalette Logo">
      </div>
      <div class="tool-description">
        <p>
          LogPaletteは、学習者の教材とのやり取りを可視化するラーニングアナリティクスツールで、
          学習者と教育者の双方に気づきを提供します。
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self="" data-anim="fade-in" href="/about" class="btn btn--secondary-outline btn--secondary-outline-dark">
          <span>LogPaletteの詳細へ</span>
        </a>
      </div>
    </div>
    <hr class="tool-divider">
  </div>
</section>


<section class="news-section py-5">
  <div class="container">
    <div class="news-header">
      <h2 class="section-title">News</h2>
      <h3 class="section-title section-title--sub">ニュース</h3>
    </div>
      <div class="text-right mt-4">
      <a data-anim-trigger-self="" data-anim="fade-in" href="/about" class="btn btn--secondary-outline btn--secondary-outline-dark">
        <span>ニュース一覧</span>
      </a>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2025.02.17</div>
      <div class="news-tag tag-event">イベント</div>
      <div class="news-summary">
        <p>名古屋大学MDS教育推進室第2回講演会（緒方教授講演）</p>
      </div>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2024.10.19-20</div>
      <div class="news-tag tag-symposium">シンポジウム</div>
      <div class="news-summary">
        <p>教育データ利活用合同シンポジウム開催報告</p>
      </div>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2025.01.11</div>
      <div class="news-tag tag-symposium">シンポジウム</div>
      <div class="news-summary">
        <p>ESD Symposium</p>
      </div>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2024.10.01</div>
      <div class="news-tag tag-notice">お知らせ</div>
      <div class="news-summary">
        <p>新しいメンバーが加わりました！</p>
      </div>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2024.09.24-26</div>
      <div class="news-tag tag-research">研究発表</div>
      <div class="news-summary">
        <p>緒方研究室中間発表会を行いました。</p>
      </div>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2024.08.01</div>
      <div class="news-tag tag-event">イベント</div>
      <div class="news-summary">
        <p>1EdTech Japan Conference 2024（緒方教授・特別講演）</p>
      </div>
    </div>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date">2023.11.17</div>
      <div class="news-tag tag-event">イベント</div>
      <div class="news-summary">
        <p>兵庫県議会・文教常任委員会 (緒方教授講演)</p>
      </div>
    </div>

  </div>
</section>

<section class="projects-section">
  <div class="container">
    <h2 class="section-title">Projects</h2>
    <h3 class="section-title section-title--sub">プロジェクト</h3>
    <div class="projects-content">
      <div class="projects-text">
        <p class="projects-description">
          私たちのプロジェクトは、最先端のツールやシステムの開発を通じて、教育の未来を切り拓くことに取り組んでいます。
          AIを活用した学習支援から革新的なデータ分析まで、次世代の教室にふさわしい学習体験を創造しています。
        </p>
      </div>
      <div class="projects-grid">
        <div class="project-card"></div>
        <div class="project-card"></div>
        <div class="project-card"></div>
        <div class="project-card"></div>
      </div>
    </div>
  </div>
</section>




<section class="members-section">
  <div class="container members-wrapper">
    <div class="members-content">
      <h2 class="section-title">Members</h2>
      <h3 class="section-title section-title--sub">メンバー</h3>
      <p class="members-description">
        私たちのメンバーは、世界中から集まった多様でフレンドリーな研究者・教育者・イノベーターの集まりです。
        教育技術の可能性を広げ、意義ある学習体験を生み出すために協働しています。
      </p>
      <a href="/members" class="btn btn--secondary-outline btn--secondary-outline-dark">
        <span>See All Members</span>
      </a>
    </div>

    <div class="members-image">
      <div class="image-placeholder"></div>
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












<?php get_footer(); ?>
