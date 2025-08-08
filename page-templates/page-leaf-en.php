<?php
/**
 * Template Name: LEAF Page - EN
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
                <h2 class="page-subtitle">LEAF</h2>
              </div>
            </div>
          </section>

          <!-- LEAF INTRO BLOCK -->
          <section class="leaf-intro section-spacing">
            <div class="container leaf-intro__container">
              <div class="leaf-intro__content">
                <h2 class="leaf-intro__title">LEAF</h2>
                <p class="leaf-intro__description">
                  LEAF (Learning and Evidence Analytics Framework) is an integrated system that supports teaching by utilizing educational data through tools such as BookRoll and LogPalette.
                </p>
                <div class="leaf-intro__links">
                  <a href="https://eds.let.media.kyoto-u.ac.jp/leaf/" target="_blank" class="btn btn-primary">Visit the Official LEAF Site</a>
                  <a href="https://live.let.media.kyoto-u.ac.jp/evidence-portal/" target="_blank" class="btn btn-secondary">Visit the Evidence Portal</a>
                </div>
              </div>
            </div>
          </section>

          <!-- VIDEO SECTION -->
          <section class="presentation-video">
            <h2>LEAF System Introduction Video</h2>
            <p>
              🎥 Title: What is the LEAF System Transforming Education?<br>
              Duration: 5 minutes 4 seconds<br>
              Content: Introduction of educational support tools using BookRoll and LogPalette
            </p>
            <div class="video-embed ratio-16x9">
              <iframe
                src="https://www.youtube.com/embed/UaFCPePgc54"
                title="LEAF System Introduction Video"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              ></iframe>
            </div>
          </section>

          <!-- PRESENTATIONS LIST -->
          <section class="presentation-section section-spacing">
            <div class="container">
              <h2 class="section-title">Presentation Videos & Slides</h2>
              <ul class="presentation-list">

<!-- From this point on, individual entries are mostly titles and don’t require translation unless they contain Japanese descriptions.
     But for consistency, here’s how you can treat Japanese-only entries: -->

<!-- Example entry (translated): -->
<li class="presentation-entry">
  <div class="presentation-date">2023/1/6</div>
  <div class="presentation-description">
    Kyushu University Learning Analytics Center 1st Symposium<br>
    "Aiming for Ideal Learning Analytics: Bridging Research and Practice"<br>
    "My Vision of the Ideal Learning Analytics Environment — Building an Ecosystem of Research, Practice, Human Resources, Funding, and Evidence"
  </div>
  <div class="presentation-links">
    <a href="https://lab.let.media.kyoto-u.ac.jp/nextcloud/index.php/s/XHdKTWrw5ieWGe3" target="_blank" rel="noopener">Slides</a>
  </div>
</li>

<!-- Repeat this approach for each presentation entry -->

<!-- SECTION: Slides -->
<h2 class="section-title">Slides</h2>
<ul class="presentation-list">
  <li class="presentation-entry">
    <div class="presentation-description">
      Latest Trends in Learning Analytics Research (Tohoku University LARC Presentation Slides)
    </div>
    <div class="presentation-links">
      [<a href="/wp-content/uploads/2021/07/603b542fafc54003eb4a1a42bb92069f.pdf" target="_blank" rel="noopener">PDF</a>]
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      How to Start Learning Analytics at the University Level: Developing an Educational Data Usage Policy
    </div>
    <div class="presentation-links">
      [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2021/05/199d8cbdc595d5ed4e465cfcbc23d822.pdf" target="_blank" rel="noopener">PDF</a>]
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      How to Get Started with Learning Analytics
    </div>
    <div class="presentation-links">
      [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/12/4c3c245d55730bbf4efb22c9775bfbb6.pdf" target="_blank" rel="noopener">PDF</a>]
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      Utilizing Educational Data — Learning Analytics Research
    </div>
    <div class="presentation-links">
      [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/12/90199ebfc59dfe072a8616c1a6a9e882.pdf" target="_blank" rel="noopener">PDF</a>]
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      Explanation of the Science Council of Japan’s Proposal on Learning Data Utilization
    </div>
    <div class="presentation-links">
      [<a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/12/630592a7639bfdd240e9750526fb9640.pdf" target="_blank" rel="noopener">PDF</a>]
    </div>
  </li>
</ul>

<!-- SECTION: Related LEAF Materials -->
<h2 class="section-title">LEAF Related Materials</h2>
<h3>BookRoll</h3>
<ul class="presentation-list">
  <li class="presentation-entry">
    <div class="presentation-description">
      <strong>On-demand (Asynchronous) Classes Using BookRoll and Audio Recording [For Teachers]</strong> — Explanation
    </div>
    <div class="presentation-links">
      <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/03/ccd3448eec5c49f158ebcb3fffd6b40c.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      <strong>Real-time (Synchronous) Classes Using BookRoll and Audio Conversation [For Teachers]</strong> — Explanation
    </div>
    <div class="presentation-links">
      <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/03/1e8fa04ba32712c24fb3d4ea6a298f12.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      <strong>On-demand (Asynchronous) Classes Using BookRoll and Audio Recording [For Students]</strong> — Explanation
    </div>
    <div class="presentation-links">
      <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/04/149af0e5c66b7590da5a252051ec0d1c.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      <strong>Real-time (Synchronous) Classes Using BookRoll and Audio Conversation [For Students]</strong> — Explanation
    </div>
    <div class="presentation-links">
      <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2020/04/d39ff7b01926e349a888bc6980aa0a2b.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
</ul>

<h2 class="section-title">■ LEAF (Moodle, BookRoll, LogPalette)</h2>
<ul class="presentation-list">
  <li class="presentation-entry">
    <div class="presentation-description">
      Designing Classes Using LEAF (For Schools)
    </div>
    <div class="presentation-links">
      <a href="https://www.let.media.kyoto-u.ac.jp/wp-content/uploads/2021/08/e6c1175746bfc3d93eedfa7990283ca5.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      Introduction to LEAF (You Can Try It by Creating an Account): Basic Version
    </div>
    <div class="presentation-links">
      <a href="https://youtu.be/tKTEsweCDEI" target="_blank" rel="noopener">[Video]</a>
      <a href="https://www.nii.ac.jp/event/upload/20200508-6_Ogata.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      Introduction to LEAF: Advanced Version
    </div>
    <div class="presentation-links">
      <a href="https://youtu.be/Pu-sqUrUVXE" target="_blank" rel="noopener">[Video]</a>
      <a href="https://www.nii.ac.jp/event/upload/20200515-6_Ogata.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
  <li class="presentation-entry">
    <div class="presentation-description">
      Use Cases of BookRoll in High School (Math & English)
    </div>
    <div class="presentation-links">
      <a href="https://youtu.be/ShE-_r4vL_0" target="_blank" rel="noopener">[Video]</a>
      <a href="https://www.nii.ac.jp/news/upload/20200410-6_Ogata.pdf" target="_blank" rel="noopener">[Slides]</a>
    </div>
  </li>
</ul>

<h2 class="section-title">Manuals and More</h2>
<p class="presentation-description">
  For manuals and more details about BookRoll, please visit
  <a href="https://eds.let.media.kyoto-u.ac.jp/previous/?page_id=3511" target="_blank" rel="noopener">this page</a>.
</p>
<p class="presentation-description">
  (You can find FAQs and detailed manuals about Moodle, BookRoll, and LogPalette.)
</p>

</section>

</main><!-- #main -->
</div><!-- #primary -->
</div><!-- .row -->
</div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
