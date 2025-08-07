<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

// Inside The Loop
while ( have_posts() ) : the_post();

  // Set language manually for JP
  $lang = 'ja';

  // Define labels and classes
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
  

  // ACF fields
  $date_raw = get_field('news_date');
  $date = $date_raw ? date('Y/m/d', strtotime($date_raw)) : '';
  $category = get_field('news_category');
  $category_label = $category_labels[$category] ?? 'ニュース';
  $category_class = $category_classes[$category] ?? 'tag-news';
  $body = get_field('news_body');
  $title = get_the_title();
?>

<div class="wrapper news-single">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title">News</h1>
                <h2 class="page-subtitle">ニュース</h2>
              </div>

              <div class="news-inner">

                <div class="news-meta">
                  <span class="news-date"><?php echo esc_html($date); ?></span>
                  <?php if ($category): ?>
                    <span class="news-tag <?php echo esc_attr($category_class); ?>">
                      <?php echo esc_html($category_label); ?>
                    </span>
                  <?php endif; ?>
                </div>

                <h2 class="news-title"><?php echo esc_html($title); ?></h2>

                <?php if (has_post_thumbnail()): ?>
                  <div class="news-image">
                    <?php the_post_thumbnail('large'); ?>
                  </div>
                <?php endif; ?>

                <div class="news-content content-block">
                  <?php echo $body; ?>
                </div>

              </div>
            </div>
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>
