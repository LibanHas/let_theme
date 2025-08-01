<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

// Function to convert DD/MM/YYYY to timestamp
function parse_date_ddmmyyyy($date_string) {
    if (empty($date_string)) return false;
    
    // Check if it's in DD/MM/YYYY format
    if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $date_string, $matches)) {
        $day = $matches[1];
        $month = $matches[2];
        $year = $matches[3];
        return mktime(0, 0, 0, $month, $day, $year);
    }
    
    // Fallback to strtotime for other formats
    return strtotime($date_string);
}

// Inside The Loop
while (have_posts()) : the_post();

  // Hardcode language to Japanese
  $lang = 'ja';

  // ACF fields
  $start_time = get_field('event_start_time');
  $end_time = get_field('event_end_time');
  $format = get_field('event_format');
  $thumbnail = get_field('event_thumbnail');
  $body = get_field('event_body');

  $date_mode = get_field('event_date_mode');
  $start_date = get_field('event_date_start');
  $end_date = get_field('event_date_end');
  $second_date = get_field('event_date_second');
  $category_value = get_field('event_category');

  // Category labels and classes
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
  
  // Merged category classes (use in both templates)
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

  $category_label = $category_labels[$category_value] ?? 'イベント';
  $tag_class = $category_classes[$category_value] ?? 'tag-event';

  // Format dates
  $weekday_map = ['Sun' => '日', 'Mon' => '月', 'Tue' => '火', 'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土'];

  $formatted_dates = '';
  if ($date_mode === 'single' && $start_date) {
    $ts = parse_date_ddmmyyyy($start_date);
    if ($ts !== false) {
        $weekday = $weekday_map[date('D', $ts)] ?? '';
        $formatted_dates = date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）';
    }
  } elseif ($date_mode === 'range' && $start_date && $end_date) {
    $ts1 = parse_date_ddmmyyyy($start_date);
    $ts2 = parse_date_ddmmyyyy($end_date);
    if ($ts1 !== false && $ts2 !== false) {
        $formatted_dates = date_i18n('Y年n月j日', $ts1) . ' – ' . date_i18n('Y年n月j日', $ts2);
    }
  } elseif ($date_mode === 'multiple' && $start_date && $second_date) {
    $ts1 = parse_date_ddmmyyyy($start_date);
    $ts2 = parse_date_ddmmyyyy($second_date);
    if ($ts1 !== false && $ts2 !== false) {
        $formatted_dates = date_i18n('Y年n月j日', $ts1) . ', ' . date_i18n('Y年n月j日', $ts2);
    }
  }

  $format_labels = [
    'online'    => 'オンライン',
    'in_person' => '対面',
    'hybrid'    => 'ハイブリッド',
  ];
?>

<div class="wrapper event-single">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <section class="section-spacing">
            <div class="container">
              <div class="events-header">
                <h1 class="page-title">Events</h1>
                <h2 class="page-subtitle">イベント</h2>
              </div>

              <h2 class="event-title"><?php the_title(); ?></h2>

              <div class="event-meta-grid">
                <?php if ($formatted_dates): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar-days-solid.png" alt="カレンダー"></span>
                    <div class="event-meta-text"><?php echo $formatted_dates; ?></div>
                  </div>
                <?php endif; ?>

                <?php if ($start_time && $end_time): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/Vector.png" alt="時計"></span>
                    <div class="event-meta-text"><?php echo esc_html(date('H:i', strtotime($start_time))); ?> – <?php echo esc_html(date('H:i', strtotime($end_time))); ?></div>
                  </div>
                <?php endif; ?>

                <?php if ($format): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/location-dot-solid.png" alt="場所"></span>
                    <div class="event-meta-text"><?php echo esc_html($format_labels[$format] ?? $format); ?></div>
                  </div>
                <?php endif; ?>

                <?php if ($category_label): ?>
                  <div class="event-meta-item">
                    <span class="event-tag <?php echo esc_attr($tag_class); ?>"><?php echo esc_html($category_label); ?></span>
                  </div>
                <?php endif; ?>
              </div>

              <hr class="news-divider">

              <div class="event-description content-block">
                <?php the_content(); ?>
              </div>

              <?php if (!empty($thumbnail) && is_array($thumbnail) && isset($thumbnail['url'])): ?>
                <div class="event-image">
                  <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt'] ?? ''); ?>">
                </div>
              <?php endif; ?>
            </div>
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>