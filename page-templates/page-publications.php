<?php
/**
 * Template Name: Publications Page
 *
 * Template for displaying the Publications page.
 *
 * @package UnderStrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="publications-wrapper">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO BANNER -->
          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <h2 class="page-subtitle">出版</h2>
              </div>
            </div>
          </section>

          <!-- ACCORDION SECTION -->
          <div class="accordion-section">

            <!-- Journal Papers -->
            <div class="accordion-item">
              <button class="accordion-header active" data-target="panel1">
                <span>Journal papers</span>
                <span class="accordion-icon">×</span>
              </button>
              <div class="accordion-panel show" id="panel1">
                <ol reversed start="186">
                  <!-- Publication list items -->
                  <!-- ... -->
                </ol>
              </div>
            </div>

            <!-- International Conferences -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel2">
                <span>International Conferences</span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-panel" id="panel2">
                <ol>
                  <!-- Conference list items -->
                  <!-- ... -->
                </ol>
              </div>
            </div>

            <!-- Book Editor -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel3">
                <span>Book editor</span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-panel" id="panel3">
                <ol>
                  <!-- Book editor list items -->
                  <!-- ... -->
                </ol>
              </div>
            </div>

            <!-- Book Chapter -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel4">
                <span>Book chapter</span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-panel" id="panel4">
                <ol>
                  <!-- Book chapter list items -->
                  <!-- ... -->
                </ol>
              </div>
            </div>

            <!-- Keynote -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel5">
                <span>Keynote</span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-panel" id="panel5">
                <ol>
                  <!-- Keynote list items -->
                  <!-- ... -->
                </ol>
              </div>
            </div>

            <!-- Survey Paper -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel6">
                <span>Survey paper</span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-panel" id="panel6">
                <ol>
                  <!-- Survey paper list items -->
                  <!-- ... -->
                </ol>
              </div>
            </div>

          </div><!-- .accordion-section -->

        </main><!-- #main -->
      </div><!-- #primary -->
    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
