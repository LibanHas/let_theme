<?php
/**
 * Template Name: Library Integration Project Page (EN)
 *
 * Template for displaying the Library Integration project in full width (English).
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-library-integration-en">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row justify-content-center">
      <div class="col-lg-10 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/en">Home</a> &gt;
            <a href="/en/projects-2">Projects</a> &gt;
            <span>[Kyoto University] Development of a Library Recommendation System</span>
          </nav>

          <article class="project-entry">
            <header class="project-header">
              <h1 class="project-title">[Kyoto University Internal Funds] Promoting Self-Directed Learning by Integrating a Digital Teaching Material Distribution System and a Library Recommendation System</h1>
              <p class="project-meta">Research Funding: Kyoto University Internal Funds</p>
            </header>

            <div class="project-content">
              <p>This project develops a library recommendation system that promotes self-directed learning by implementing integration and feedback features between the digital teaching material distribution system, BookRoll, and the library system.</p>

              <h2>Overview</h2>
              <p>BookRoll displays teaching materials such as textbooks and slides on users’ PCs during lectures and for pre-study/review, while also recording and analyzing learning logs such as viewed pages, viewing times, and highlighted sections.</p>
              <p>By implementing a library recommendation feature in BookRoll (covering library collections and KURENAI repository papers), the system presents materials related to learners’ study topics and supports deeper engagement. It also offers recommendations for new arrivals, automatic analysis, commenting features, and a feedback dashboard for teachers.</p>

              <h2>Expected Benefits</h2>
              <ul>
                <li>Evidence-based support for self-directed learning utilizing learning logs</li>
                <li>Enhanced integration between library materials and digital teaching content, and promotion of new arrivals</li>
                <li>Contribution to increased use and citations of open-access papers</li>
                <li>Strengthened adaptability to future online learning environments</li>
                <li>Improved educational quality and understanding through feedback to teachers</li>
              </ul>
            </div>
          </article>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
