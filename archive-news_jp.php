<?php
/**
 * Archive template for Japanese News
 */
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="news-archive-wrapper">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;

          $news_query = new WP_Query([
            'post_type'      => 'news_jp',
            'posts_per_page' => 10,
            'paged'          => $paged,
            'meta_key'       => 'news_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
          ]);

          $category_classes = [
            'symposiums'   => 'tag-symposium',
            'workshops'    => 'tag-workshop',
            'lectures'     => 'tag-lecture',
            'conferences'  => 'tag-conference',
            'expo'         => 'tag-expo',
            'camp'         => 'tag-camp',
            'visit'        => 'tag-visit',
            'social_event' => 'tag-social',
            'publications' => 'tag-publication',
            'media'        => 'tag-media',
            'awards'       => 'tag-award',
            'projects'     => 'tag-project',
            'contests'     => 'tag-contest',
            'news'         => 'tag-news'
          ];
          
          $category_labels = [
            'symposiums'   => 'シンポジウム',
            'workshops'    => 'ワークショップ',
            'lectures'     => '講演',
            'conferences'  => 'カンファレンス',
            'expo'         => '展示会',
            'camp'         => '合宿',
            'visit'        => '訪問',
            'social_event' => '交流会',
            'publications' => '出版物',
            'media'        => 'メディア掲載',
            'awards'       => '受賞',
            'projects'     => 'プロジェクト',
            'contests'     => 'コンテスト',
            'news'         => 'ニュース'
          ];
          
          ?>

          <section class="section-spacing news-section">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title">News</h1>
                <h2 class="page-subtitle">ニュース</h2>
              </div>

              <?php if ($news_query->have_posts()) : ?>
                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

                  <?php
                  $date_raw = get_field('news_date');
                  $date = $date_raw ? DateTime::createFromFormat('Ymd', $date_raw)->format('Y/m/d') : '';
                  $category_value = get_field('news_category');
                  $category_label = $category_labels[$category_value] ?? 'ニュース';
                  $tag_class = $category_classes[$category_value] ?? 'tag-news';
                  ?>

                  <hr class="news-divider" />

                  <div class="news-item">
                    <div class="news-meta">
                      <div class="news-date"><?php echo esc_html($date); ?></div>
                      <div class="news-tag <?php echo esc_attr($tag_class); ?>">
                        <?php echo esc_html($category_label); ?>
                      </div>
                    </div>
                    <div class="news-summary">
                      <p>
                        <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                        <?php the_title(); ?>
                        </a>
                      </p>
                    </div>
                  </div>

                <?php endwhile; ?>

                <hr class="news-divider" />

                <div class="custom-pagination">
                  <?php
                  $pagination = paginate_links([
                    'prev_next' => false,
                    'type'      => 'array',
                    'mid_size'  => 2,
                    'end_size'  => 1
                  ]);

                  if ($pagination) {
                    echo '<ul class="pagination-list">';
                    foreach ($pagination as $page) {
                      if (trim(strip_tags($page)) !== '') {
                        echo '<li>' . $page . '</li>';
                      }
                    }
                    echo '</ul>';
                  }
                  ?>
                </div>

              <?php else : ?>
                <p>ニュースがまだありません。</p>
              <?php endif; ?>
            </div>
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
