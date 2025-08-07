<?php
/**
 * Template Name: Research Collaborators (EN)
 * Template for displaying external research collaborators (English version).
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-research-collaborators">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-lg-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO SECTION -->
          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <h2 class="page-subtitle">Research Collaborators</h2>
              </div>
            </div>
          </section>

          <!-- SIMPLE LIST OF COLLABORATORS -->
          <div class="container">
            <div class="collaborators-list">
              <?php
            $collaborators = new WP_Query([
                'post_type' => 'member',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'meta_query' => [
                  'relation' => 'AND',
                  [
                    'key' => 'member_type',
                    'value' => 'collaborator',
                    'compare' => '='
                  ],
                  [
                    'key' => 'language',
                    'value' => 'en',
                    'compare' => '='
                  ]
                ]
              ]);
              

              if ($collaborators->have_posts()) :
                while ($collaborators->have_posts()) : $collaborators->the_post();
                  $employment_title = get_field('employment_title'); // Position
                  $institution = get_field('institution'); // Institution
              ?>
                <div class="collaborator-item">
                  <p class="collaborator-name"><strong><?php the_title(); ?></strong></p>
                  <?php if ($institution): ?>
                    <p class="collaborator-institution"><?php echo esc_html($institution); ?></p>
                  <?php endif; ?>
                  <?php if ($employment_title): ?>
                    <p class="collaborator-position"><?php echo esc_html($employment_title); ?></p>
                  <?php endif; ?>
                </div>
              <?php
                endwhile;
                wp_reset_postdata();
              else : ?>
                <p>No research collaborators to display at this time.</p>
              <?php endif; ?>
            </div>
          </div>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
