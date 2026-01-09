<?php
defined('ABSPATH') || exit;
get_header();

$container = get_theme_mod('understrap_container_type');

while ( have_posts() ) : the_post();

  // Labels & tag classes
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

  // ACF meta
  $date_raw   = get_field('news_date');                // usually Ymd
  $date_obj   = $date_raw ? DateTime::createFromFormat('Ymd', $date_raw) : null;
  $date       = $date_obj ? $date_obj->format('Y/m/d') : '';
  $category   = get_field('news_category');
  $cat_label  = $category_labels[$category] ?? 'ニュース';
  $cat_class  = $category_classes[$category] ?? 'tag-news';

  // Body: prefer native editor, fallback to old ACF field
  $content = get_post_field('post_content', get_the_ID());
  if (empty($content)) {
    $legacy = get_field('news_body');                  // legacy ACF WYSIWYG
    if (!empty($legacy)) {
      // Run through content filters so shortcodes/embeds behave nicely
      $content = apply_filters('the_content', $legacy);
    }
  } else {
    $content = apply_filters('the_content', $content);
  }
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
                  <?php if ($date): ?>
                    <span class="news-date"><?php echo esc_html($date); ?></span>
                  <?php endif; ?>
                  <?php if ($category): ?>
                    <span class="news-tag <?php echo esc_attr($cat_class); ?>">
                      <?php echo esc_html($cat_label); ?>
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
                  <?php echo $content; ?>
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
