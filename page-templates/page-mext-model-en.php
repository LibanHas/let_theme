<?php
/**
 * Template Name: MEXT Kyoto Model Project Page (EN)
 *
 * Template for displaying the MEXT Kyoto Model project page (English).
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-mext-kyoto-model-en">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row justify-content-center">
      <div class="col-lg-10 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <nav class="breadcrumb">
            <a href="/en">Home</a> &gt;
            <a href="/en/projects-2">Projects</a> &gt;
            <span>[MEXT] Kyoto Model Demonstration Project</span>
          </nav>

          <article class="project-entry">
            <header class="project-header">
              <h1 class="project-title">[MEXT] “Future-Oriented Education” Kyoto Model Demonstration Project (2018–2019)</h1>
              <p class="project-meta">2018–2019 | Funded by: Ministry of Education, Culture, Sports, Science and Technology (MEXT)</p>
            </header>

            <div class="project-content">
              <p>This project focuses on understanding students’ actual conditions—including academic ability, learning status, and psychological state—primarily through collaborative learning. It aims to explore optimal learning approaches for each individual through integrated analysis.</p>

              <h2>Objectives</h2>
              <ul>
                <li>Visualizing students’ academic performance, daily learning status, and psychological conditions to understand their actual situations</li>
                <li>Providing teacher support and personalized learning to maximize learning outcomes based on evidence-based policy making (EBPM) in education</li>
                <li>Exploring and verifying policies for utilizing study logs</li>
              </ul>

              <h2>Overview</h2>
              <p>To develop the competencies required in the Society 5.0 era, this project researches learning, teaching, and assessment methods that effectively use cutting-edge technologies to foster thinking, decision-making, expression, and autonomy.</p>
              <p>Through collaborative learning, teachers’ and students’ voices are captured and displayed in real time on tablets, showing speech content and emotional changes. By visualizing learning situations and supporting reflection, the project promotes active learning.</p>
              <p>Furthermore, by analyzing proficiency levels and logs, it investigates personalized learning methods and teaching strategies. It integrates survey data, academic performance, and tablet operation logs to optimize group formation in collaborative learning and achieve educational EBPM.</p>
              <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/project-mext-kyoto-diagram.png" alt="Future-Oriented Education System Diagram" class="img-fluid">
                <figcaption class="text-center"><strong>Conceptual Diagram of the Future-Oriented Education Model</strong></figcaption>
              </figure>

              <h2>Research Grant</h2>
              <ul>
                <li>MEXT “Demonstration Research Project on the Introduction of Advanced Technologies in New Era Learning”</li>
                <li>(Demonstration Project on the Use of Advanced Technologies in Schools)</li>
                <li>2018–2019</li>
              </ul>
            </div>
          </article>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
