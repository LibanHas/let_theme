<?php
/**
 * Template Name: Project SIP2 Page (EN)
 *
 * A dedicated full-width template for the SIP2 project (English version).
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-sip2-en">
  <div class="container" id="content">
    <div class="row justify-content-center">
      <div class="col-lg-10 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <nav class="breadcrumb">
            <a href="/en">Home</a> &gt;
            <a href="/en/projects-2">Projects</a> &gt;
            <span>[Cabinet Office] Research and Development of Tailor-Made Education</span>
          </nav>

          <article class="project-entry">
            <header class="project-header">
              <h1 class="project-title">[Cabinet Office] Research and Development of a Cyber Space Platform / Learning Support Technologies / Evidence-Based Tailor-Made Education Utilizing Big Data and AI</h1>
              <p class="project-meta">2018 – 2020 | Commissioned by: Strategic Innovation Promotion Program (SIP)</p>
            </header>

            <div class="project-content">
              <p>This project focuses on education, a field requiring advanced interaction and traditionally difficult to automate. By collecting, storing, and analyzing study logs (learning-related data), and organically integrating learning cognitive science, artificial intelligence (AI), and information infrastructure technologies, we aim to develop a pedagogical information platform. This platform will reproduce expert teachers’ skills anytime, anywhere through AI and realize evidence-based tailor-made education adapted to learners’ characteristics.</p>

              <h2>Overview</h2>
              <p>We aim to provide fair, individually optimized learning support by building a pedagogical information platform that integrates learning cognitive science, AI, and information infrastructure technologies.  
              The target is to improve English and mathematics (arithmetic) skills of elementary, junior high, and high school students. Study logs will store learning histories and interactions with teachers, and the system will use similarity matching and other techniques to recommend learning materials and methods.</p>

              <h2>Research and Development Themes</h2>
              <ul>
                <li>Theme 1: Collection of evidence and development of evidence-based learning support</li>
                <li>Theme 2: Development of the pedagogical information platform and research for societal implementation</li>
              </ul>

              <h2>Research Activities in Our Lab</h2>
              <p>Our laboratory develops core modules needed for intelligent educational and learning support, such as knowledge models and user models, on the LA platform. We extract knowledge elements from learning materials and tasks to build knowledge models. By analyzing logs, we form user models to support personalized learning recommendations and optimal group formation.</p>

              <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/project-sip2.png" alt="Knowledge and User Models" class="img-fluid">
                <figcaption class="text-center"><strong>Knowledge Models and User Models</strong></figcaption>
              </figure>

              <h2>Research Grant</h2>
              <ul>
                <li>Strategic Innovation Promotion Program (SIP) Phase 2</li>
                <li>“Research and Development of Cyber Space Platform / Learning Support Technologies / Evidence-Based Tailor-Made Education Utilizing Big Data and AI”</li>
                <li>Research Period: 2018 – 2020</li>
              </ul>
            </div>
          </article>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
