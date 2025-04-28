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

<section class="test-reveal-section">
  <p class="quote-heading">
    <span class="split-line">これはテストのテキストです。</span>
  </p>
</section>



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
        <p data-anim="text-color-fill" style="--text-color: #fcf7e6;" class="quote-heading heading-1">
          <div class="split-line">私たちは京都大学の研究チームです。</div>
          <div class="split-line">テクノロジーやデータを活用して、より良い学びを実現する方法を探求しています。</div>
          <div class="split-line">デジタル教科書やラーニングダッシュボード、学校向けのプラットフォームなどのツールを開発しています。</div>
          <div class="split-line">実際の教室や学生とともに研究を行い、先生の授業や学生の学びをサポートしています。</div>
        </p>

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
  </div>
</section> 

<script>
document.addEventListener("DOMContentLoaded", () => {
  function revealLine() {
    const line = document.querySelector('.split-line');
    if (!line) return;

    const rect = line.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    const progress = 1 - Math.min(Math.max((rect.top + rect.height / 2) / windowHeight, 0), 1);
    const revealPercent = Math.floor(progress * 100);

	line.style.backgroundImage = `linear-gradient(to right, #fcf7e6 ${safePercent}%, transparent ${safePercent}%)`;
}

  revealLine();
  window.addEventListener('scroll', revealLine);
  window.addEventListener('resize', revealLine);
});
</script>





<?php get_footer(); ?>
