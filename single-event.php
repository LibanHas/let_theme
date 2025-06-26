<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

// Detect language
$lang_raw = get_field('event_language') ?? pll_current_language(); // fallback to Polylang if no ACF field
$lang = ($lang_raw === 'en' || $lang_raw === 'en-US') ? 'en' : 'ja';
?>

<div class="wrapper event-single">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <?php while (have_posts()) : the_post(); ?>
            <?php
              $start_time = get_field('event_start_time');
              $end_time = get_field('event_end_time');
              $format = get_field('event_format');
              $thumbnail = get_field('event_thumbnail');
              $description = get_field('event_description');
              $body = get_field('event_body');

              $date_mode = get_field('event_date_mode');
              $start_date = get_field('event_date_start');
              $end_date = get_field('event_date_end');
              $second_date = get_field('event_date_second');
              $category_value = get_field('event_category');

$category_labels = [
  'symposiums'   => ['ja' => 'シンポジウム',   'en' => 'Symposium'],
  'workshops'    => ['ja' => 'ワークショップ', 'en' => 'Workshop'],
  'lectures'     => ['ja' => '講演',         'en' => 'Lecture'],
  'conferences'  => ['ja' => 'カンファレンス', 'en' => 'Conference'],
  'expo'         => ['ja' => '展示会',       'en' => 'Expo'],
  'camp'         => ['ja' => '合宿',         'en' => 'Camp'],
  'visit'        => ['ja' => '訪問',         'en' => 'Visit'],
  'social_event' => ['ja' => '交流会',       'en' => 'Social Event'],
  'publications' => ['ja' => '出版物',       'en' => 'Publication'],
  'media'        => ['ja' => 'メディア掲載', 'en' => 'Media'],
  'awards'       => ['ja' => '受賞',         'en' => 'Award'],
  'projects'     => ['ja' => 'プロジェクト', 'en' => 'Project'],
  'contests'     => ['ja' => 'コンテスト',   'en' => 'Contest'],
  'news'         => ['ja' => 'ニュース',     'en' => 'News']
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


$category_label = $category_labels[$category_value][$lang] ?? (($lang === 'en') ? 'Event' : 'イベント');
$tag_class = $category_classes[$category_value] ?? 'tag-event';


              $weekday_map_en = ['Sun' => 'Sun', 'Mon' => 'Mon', 'Tue' => 'Tue', 'Wed' => 'Wed', 'Thu' => 'Thu', 'Fri' => 'Fri', 'Sat' => 'Sat'];
              $weekday_map_ja = ['Sun' => '日', 'Mon' => '月', 'Tue' => '火', 'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土'];
              $weekday_map = ($lang === 'en') ? $weekday_map_en : $weekday_map_ja;

              $formatted_dates = ''; // stacked full dates

              if ($date_mode === 'single' && $start_date) {
                $ts = strtotime(str_replace('/', '-', $start_date));
                $weekday = $weekday_map[date('D', $ts)] ?? '';
                $formatted_dates = '<div>' . ($lang === 'en' ? date('F j, Y', $ts) . ' (' . $weekday . ')' : date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）') . '</div>';
              } elseif ($date_mode === 'range' && $start_date && $end_date) {
                foreach ([$start_date, $end_date] as $date) {
                  $ts = strtotime($date);
                  $weekday = $weekday_map[date('D', $ts)] ?? '';
                  $formatted_dates .= '<div>' . ($lang === 'en' ? date('F j, Y', $ts) . ' (' . $weekday . ')' : date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）') . '</div>';
                }
              } elseif ($date_mode === 'multiple' && $start_date && $second_date) {
                foreach ([$start_date, $second_date] as $date) {
                  $ts = strtotime(str_replace('/', '-', $date));
                  $weekday = $weekday_map[date('D', $ts)] ?? '';
                  $formatted_dates .= '<div>' . ($lang === 'en' ? date('F j, Y', $ts) . ' (' . $weekday . ')' : date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）') . '</div>';
                }
              }

              $format_labels = [
                'online'    => ($lang === 'en') ? 'Online' : 'オンライン',
                'in_person' => ($lang === 'en') ? 'In-person' : '対面',
                'hybrid'    => ($lang === 'en') ? 'Hybrid' : 'ハイブリッド'
              ];

              $start = !empty($start_time) ? date('H:i', strtotime($start_time)) : '';
              $end = !empty($end_time) ? date('H:i', strtotime($end_time)) : '';
            ?>

            <section class="section-spacing">
              <div class="container">
                <!-- Hero -->
                <div class="events-header">
                  <h1 class="page-title">Events</h1>
                  <h2 class="page-subtitle"><?php echo ($lang === 'en') ? 'Event Details' : 'イベント'; ?></h2>
                </div>

                <!-- Title -->
                <h2 class="event-title"><?php the_title(); ?></h2>

                <!-- Meta Info with Icons -->
                <div class="event-meta-grid">
                  <?php if ($formatted_dates): ?>
                    <div class="event-meta-item">
                      <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/calendar-days-solid.png" alt="<?php echo ($lang === 'en') ? 'Calendar Icon' : 'カレンダーアイコン'; ?>" />
                      </span>
                      <div class="event-meta-text">
                        <?php echo $formatted_dates; ?>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if ($start && $end): ?>
                    <div class="event-meta-item">
                      <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Vector.png" alt="<?php echo ($lang === 'en') ? 'Clock Icon' : '時計アイコン'; ?>" />
                      </span>
                      <span class="event-meta-text"><?php echo esc_html($start); ?> – <?php echo esc_html($end); ?></span>
                    </div>
                  <?php endif; ?>

                  <?php if ($format): ?>
                    <div class="event-meta-item">
                      <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/location-dot-solid.png" alt="<?php echo ($lang === 'en') ? 'Location Icon' : '場所アイコン'; ?>" />
                      </span>
                      <span class="event-meta-text"><?php echo esc_html($format_labels[$format] ?? $format); ?></span>
                    </div>
                  <?php endif; ?>
                  <?php if ($category_label): ?>
                    <div class="event-meta-item">
                      <span class="event-tag <?php echo esc_attr($tag_class); ?>">
                        <?php echo esc_html($category_label); ?>
                      </span>
                    </div>
                <?php endif; ?>
                </div>
                <hr class="news-divider">
                <!-- Description section -->
                <div class="event-description content-block">
                  <?php the_content(); ?>
                </div>

                <!-- Image -->
                <?php if (!empty($thumbnail) && is_array($thumbnail) && isset($thumbnail['url'])): ?>
                  <div class="event-image">
                    <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt'] ?? ''); ?>" />
                  </div>
                <?php endif; ?>
              </div>
            </section>

          <?php endwhile; ?>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
