<?php
/**
 * Template Name: Template-Home
 */
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="idea-svg-container">
  <!-- Base image swapped to ideas-figure.svg -->
  <img src="<?php echo get_template_directory_uri(); ?>/images/ideas-figure.svg" alt="Ideas Figure" class="base-image" />
  <!-- Extended, kinked lines radiating upward or horizontally -->
  <svg class="idea-lines" width="100%" height="100%" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid meet">
    <!-- Line 1: Far up-left (~1200px) -->
    <path d="M952.5,180 L820,40 L0,0" class="idea-line delay-1 duration-very-slow" />
    <!-- Line 2: Up-left (~1160px) -->
    <path d="M952.5,180 L880,60 L0,60" class="idea-line delay-2 duration-slow" />
    <!-- Line 3: Straight up then far left (~1130px) -->
    <path d="M952.5,180 L952.5,0 L0,0" class="idea-line delay-3 duration-fast" />
    <!-- Line 4: Up-right (~1040px) -->
    <path d="M952.5,180 L1020,60 L1920,60" class="idea-line delay-4 duration-med" />
    <!-- Line 5: Far up-right (~1035px) -->
    <path d="M952.5,180 L1080,40 L1920,40" class="idea-line delay-5 duration-slow" />
    <!-- Line 6: Horizontal-left then up-left (~1130px) -->
    <path d="M952.5,180 L820,180 L820,0 L0,0" class="idea-line delay-6 duration-slow" />
    <!-- Line 7: Horizontal-right then up-right (~1150px) -->
    <path d="M952.5,180 L1080,180 L1080,0 L1920,0" class="idea-line delay-7 duration-med" />
    <!-- Line 8: Slight up-left then far left (~1150px) -->
    <path d="M952.5,180 L900,120 L900,0 L0,0" class="idea-line delay-8 duration-med" />
    <!-- Line 9: Slight up-right then far right (~1170px) -->
    <path d="M952.5,180 L1005,120 L1005,0 L1920,0" class="idea-line delay-9 duration-med" />
    <!-- Line 10: Gentle horizontal-left then up-left (~1130px) -->
    <path d="M952.5,180 L800,180 L800,0 L0,0" class="idea-line delay-10 duration-fast" />
  </svg>
</div>


<!-- 🔹 Full-width tagline (outside container) -->
<h1 class="tagline">
    未来の教育をデザインする<br>
    LETでの研究を始めよう
</h1>


<!-- 🔹 Bootstrap container for main content -->
<div class="wrapper" id="homepage-wrapper">
  <div class="container" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- LET intro content -->
          <h2 class="LET_heading">LETについて</h2>
          <p class="content-block">
            私たちは京都大学の研究チームです。テクノロジーやデータを活用して、より良い学びを実現する方法を探求しています。
            デジタル教科書やラーニングダッシュボード、学校向けのプラットフォームなどのツールを開発しています。
            私たちの研究は、実際の教室や学生とともに行われており、現場で得られた知見をもとに、先生の授業や学生の学びをサポートしています。
          </p>

        </main>
      </div><!-- #primary -->
    </div><!-- .row -->
  </div><!-- #content -->
</div><!-- #homepage-wrapper -->

<!-- 🔹 Learning-centered section -->
<section class="learning-centered-section mb-25">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5">
        <div class="text-content-wrapper">
          <h2 class="section-heading">学習者中心</h2>
          <p class="section-text">
            LET研究室では、いつでもどこでも学べる教育を支援するために、
            学習者中心のツールを設計し、学生が最適なタイミングと場所で学べるようサポートしています。
          </p>
        </div>
      </div>
      <div class="col-md-5 offset-md-1">
        <img src="<?php echo get_template_directory_uri(); ?>/images/learning-centered.png" alt="学習者中心イラスト" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<!-- 🔹 Learning-centered section -->
<section class="learning-centered-section ">
  <div class="container">
    <div class="row align-items-center justify-content-around">
      <div class="col-md-5">
	  <img src="<?php echo get_template_directory_uri(); ?>/images/graph.png" alt="学習者中心イラスト" class="img-fluid">
      </div>
      <div class="col-md-5 offset-md-1">
	  <div class="text-content-wrapper">
          <h2 class="section-heading">データ駆動型</h2>
          <p class="section-text">
		    教育ビッグデータとラーニングアナリティクスを活用することで、個別最適化されたデータ駆動型の学習体験を実現しています。
          </p>
        </div>
        
      </div>
    </div>
  </div>
</section>

<section class="video-intro py-4">
  <div class="container text-center">
    <h2 class="section-heading mb-3">LEAFシステムの全体像</h3>
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
  </div>
</section>


<?php get_footer(); ?>
