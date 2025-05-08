<?php
/**
 * Template Name: News Archive
 *
 * Template for displaying a list of News custom posts.
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
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$news_query = new WP_Query([
  'post_type' => 'news',
  'posts_per_page' => 10,
  'paged' => $paged,
]);
?>

        <section class="news-section section-spacing">
  <div class="container">
    <div class="news-header">
      <h2 class="section-title">News</h2>
      <h3 class="section-title section-title--sub">ニュース</h3>
    </div>

    <?php
    if ($news_query->have_posts()) :
      while ($news_query->have_posts()) : $news_query->the_post();
      $date_raw = get_field('news_date');
      $date = $date_raw ? DateTime::createFromFormat('Ymd', $date_raw)->format('Y/m/d') : '';      
        $category = get_field('category');
        $description = get_field('news_description');

        $category_classes = [
          'event' => 'tag-event',
          'symposium' => 'tag-symposium',
          'notice' => 'tag-notice',
          'presentation' => 'tag-research'
        ];

        $category_labels = [
          'event' => 'イベント',
          'symposium' => 'シンポジウム',
          'notice' => 'お知らせ',
          'presentation' => '研究発表'
        ];
    ?>

    <hr class="news-divider">

    <div class="news-item">
      <div class="news-date"><?php echo esc_html($date); ?></div>
      <div class="news-tag <?php echo esc_attr($category_classes[$category] ?? ''); ?>">
        <?php echo esc_html($category_labels[$category] ?? $category); ?>
      </div>
      <div class="news-summary">
        <p>
          <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
            <?php echo esc_html($description); ?>
          </a>
        </p>
      </div>
    </div>

    <?php endwhile; ?>
    <hr class="news-divider">

    <div class="text-right mt-4">
      <?php echo paginate_links(); ?>
    </div>

    <?php else : ?>
      <p>ニュースがまだありません。</p>
    <?php endif; ?>
  </div>
</section>




				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
