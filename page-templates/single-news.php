<?php
/**
 * Template Name: Single News Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

// if ( is_front_page() ) {
// 	get_template_part( 'global-templates/hero' );
// }

// $wrapper_id = 'full-width-page-wrapper';
// if ( is_page_template( 'page-templates/no-title.php' ) ) {
// 	$wrapper_id = 'no-title-page-wrapper';
// }
?>

<div class="wrapper" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

                <?php
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-news-wrapper">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php
              $date = get_field('news_date');
              $category = get_field('category');
              $description = get_field('news_description');
              $category_labels = [
                'event' => 'イベント',
                'symposium' => 'シンポジウム',
                'notice' => 'お知らせ',
                'presentation' => '研究発表'
              ];
              $category_classes = [
                'event' => 'tag-event',
                'symposium' => 'tag-symposium',
                'notice' => 'tag-notice',
                'presentation' => 'tag-research'
              ];
            ?>

            <section class="news-single section-spacing">
              <div class="container">
                <h1 class="section-title">News</h1>

                <div class="news-meta">
                  <span class="news-date"><?php echo esc_html($date); ?></span>
                  <?php if ($category): ?>
                    <span class="news-tag <?php echo esc_attr($category_classes[$category] ?? ''); ?>">
                      <?php echo esc_html($category_labels[$category] ?? $category); ?>
                    </span>
                  <?php endif; ?>
                </div>

                <h2 class="news-title"><?php the_title(); ?></h2>

                <?php if (has_post_thumbnail()): ?>
                  <div class="news-image">
                    <?php the_post_thumbnail('large'); ?>
                  </div>
                <?php endif; ?>

                <div class="news-content content-block">
                  <?php the_content(); ?>
                </div>
              </div>
            </section>

          <?php endwhile; ?>
        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>


				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
