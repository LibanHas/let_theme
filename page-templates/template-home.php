<?php
/**
 * Template Name: Template-Home
 */
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- 🔹 Full-width hero section (outside Bootstrap container) -->
<div class="idea-svg-container">
  <img src="<?php echo get_template_directory_uri(); ?>/images/ideas-figure.png" class="base-image" alt="Ideas figure" />

  <svg class="idea-lines" width="500" height="500" viewBox="0 0 500 500">
    <!-- Line 1 -->
    <path d="M250,300 L260,260 L300,200" class="idea-line delay-1 duration-med" />
    <image
		href="<?php echo get_template_directory_uri(); ?>/images/icon-lightbulb.png"
		x="292" y="192" width="16" height="16"
		class="idea-icon delay-icon-1"
		/>

    <!-- Line 2 -->
    <path d="M250,300 L240,250 L180,180" class="idea-line delay-2 duration-slow" />
    <circle cx="180" cy="180" r="6" class="idea-icon delay-icon-2" />

    <!-- Line 3 -->
    <path d="M250,300 L270,280 L330,250" class="idea-line delay-3 duration-fast" />
    <circle cx="330" cy="250" r="6" class="idea-icon delay-icon-3" />

    <!-- Line 4 -->
    <path d="M250,300 L230,270 L160,240" class="idea-line delay-4 duration-very-slow" />
    <circle cx="160" cy="240" r="6" class="idea-icon delay-icon-4" />

    <!-- Line 5 -->
    <path d="M250,300 L250,260 L250,190" class="idea-line delay-5 duration-med" />
    <circle cx="250" cy="190" r="6" class="idea-icon delay-icon-5" />
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
<section class="learning-centered-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="text-content-wrapper">
          <h2 class="section-heading">学習者中心</h2>
          <p class="section-text">
            LET研究室では、いつでもどこでも学べる教育を支援するために、<br>
            学習者中心のツールを設計し、学生が最適なタイミングと場所で学べるようサポートしています。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo get_template_directory_uri(); ?>/images/learning-centered.png" alt="学習者中心イラスト" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
