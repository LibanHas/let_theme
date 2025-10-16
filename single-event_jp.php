<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

/**
 * Parse various date formats into a UNIX timestamp.
 * Accepts: Ymd (ACF return), d/m/Y (editor display), Y-m-d, or anything strtotime understands.
 */
function parse_to_ts($date_string) {
    if (empty($date_string)) return false;

    // Ymd (e.g., 20251028)
    if (preg_match('/^\d{8}$/', $date_string)) {
        $dt = DateTime::createFromFormat('Ymd', $date_string);
        return $dt ? $dt->getTimestamp() : false;
    }
    // d/m/Y (e.g., 28/10/2025)
    if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $date_string, $m)) {
        return mktime(0, 0, 0, (int)$m[2], (int)$m[1], (int)$m[3]);
    }
    // Y-m-d (e.g., 2025-10-28)
    if (preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $date_string)) {
        $dt = date_create($date_string);
        return $dt ? $dt->getTimestamp() : false;
    }
    // Fallback
    $ts = strtotime($date_string);
    return $ts ? $ts : false;
}

/**
 * Format timestamp -> "Y年n月j日（曜）"
 */
function format_jp_date_wday($ts) {
    if ($ts === false) return '';
    $wmap = ['Sun' => '日', 'Mon' => '月', 'Tue' => '火', 'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土'];
    $w = $wmap[date('D', $ts)] ?? '';
    return date_i18n('Y年n月j日', $ts) . '（' . $w . '）';
}

// Inside The Loop
while (have_posts()) : the_post();

  // Hardcode language to Japanese
  $lang = 'ja';

  // ACF fields
  $start_time = get_field('event_start_time');
  $end_time   = get_field('event_end_time');
  $format     = get_field('event_format');
  $thumbnail  = get_field('event_thumbnail');
  $body       = get_field('event_body');

  $date_mode   = get_field('event_date_mode');   // 'single' | 'range' | 'multiple'
  $start_date  = get_field('event_date_start');  // single/range/multiple primary
  $end_date    = get_field('event_date_end');    // range end (optional)
  $second_date = get_field('event_date_second'); // multiple second
  $third_date  = get_field('event_date_third');  // NEW: multiple third
  $fourth_date = get_field('event_date_fourth'); // NEW: multiple fourth

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
  $tag_class      = $category_classes[$category_value] ?? 'tag-event';

  // Build formatted date string (supports single | range | multiple 2–4 dates)
  $formatted_dates = '';

  if ($date_mode === 'single' && $start_date) {
    $ts = parse_to_ts($start_date);
    if ($ts !== false) {
      $formatted_dates = format_jp_date_wday($ts);
    }

  } elseif ($date_mode === 'range' && $start_date && $end_date) {
    $ts1 = parse_to_ts($start_date);
    $ts2 = parse_to_ts($end_date);
    if ($ts1 !== false && $ts2 !== false) {
      // Start with weekday; end without (consistent with your previous template)
      $formatted_dates = format_jp_date_wday($ts1) . ' – ' . date_i18n('Y年n月j日', $ts2);
    }

  } elseif ($date_mode === 'multiple') {
    // Collect up to four dates; normalize, dedupe, sort; print each with weekday
    $candidates = array_filter([$start_date, $second_date, $third_date, $fourth_date]);
    $ts_list = [];
    foreach ($candidates as $d) {
      $ts = parse_to_ts($d);
      if ($ts !== false) $ts_list[] = $ts;
    }
    $ts_list = array_values(array_unique($ts_list));
    sort($ts_list);

    if (!empty($ts_list)) {
      $formatted_each = array_map('format_jp_date_wday', $ts_list);
      $formatted_dates = implode(', ', $formatted_each);
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
                    <div class="event-meta-text">
                      <?php echo esc_html(date('H:i', strtotime($start_time))); ?> – <?php echo esc_html(date('H:i', strtotime($end_time))); ?>
                    </div>
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
