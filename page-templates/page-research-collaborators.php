<?php
/**
 * Template Name: Research Collaborators
 * Template for displaying external research collaborators (共同研究員).
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
                <h2 class="page-subtitle">共同研究者</h2>
              </div>
            </div>
          </section>

          <!-- MEMBER CARDS -->
          <div class="container">
            <div class="row members-list">
              <?php
              $collaborators = new WP_Query([
                'post_type' => 'member',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'meta_query' => [
                  [
                    'key' => 'member_type',
                    'value' => 'collaborator',
                    'compare' => '='
                  ]
                ]
              ]);

              if ($collaborators->have_posts()) :
                while ($collaborators->have_posts()) : $collaborators->the_post();
                  $employment_title = get_field('employment_title');
              ?>
              <div class="col-md-3 member p-member-list__item group-collaborator">
                <a href="<?php the_permalink(); ?>" class="p-member-list__thumbnail">
                  <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('medium');
                  } else {
                    echo '<div class="p-member-list__thumbnail --empty"></div>';
                  } ?>
                </a>
                <a href="<?php the_permalink(); ?>" class="p-member-list__name"><?php the_title(); ?></a>
                <?php if ($employment_title) : ?>
                  <p class="p-member-list__position"><?php echo esc_html($employment_title); ?></p>
                <?php endif; ?>
              </div>
              <?php endwhile; wp_reset_postdata(); else : ?>
              <p>現在、表示する共同研究員はいません。</p>
              <?php endif; ?>
            </div>
          </div>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
