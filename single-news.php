<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper news-single">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php
              $date_raw = get_field('news_date');
              $date = $date_raw ? date('Y/m/d', strtotime($date_raw)) : '';
              $category = get_field('category');
              $description = get_field('news_description');

              $category_labels = [
                'event' => 'イベント',
                'symposium' => 'シンポジウム',
                'notice' => 'お知らせ',
                'presentation' => '研究発表'
              ];

              $tag_label = $category_labels[$category] ?? $category;
            ?>

            <section class="section-spacing">
              <div class="container">
                <!-- Section header -->
                <div class="news-header">
      <h2 class="section-title">News</h2>
      <h3 class="news-section subheading">ニュース</h3>
    </div>
                <!-- Meta: Date + Badge -->
                <div class="news-meta">
                  <span class="news-date"><?php echo esc_html($date); ?></span>
                  <?php if ($category): ?>
                    <span class="news-badge <?php echo esc_attr($category); ?>">
                      <?php echo esc_html($tag_label); ?>
                    </span>
                  <?php endif; ?>
                </div>

                <!-- Title -->
                <h2 class="news-title"><?php the_title(); ?></h2>

                <!-- Image -->
                <?php if (has_post_thumbnail()): ?>
                  <div class="news-image">
                    <?php the_post_thumbnail('large'); ?>
                  </div>
                <?php endif; ?>

                <!-- Main content -->
                <div class="news-content content-block">
                  <?php the_field('news_body'); ?>
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
