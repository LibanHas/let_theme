<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
$lang = (get_locale() === 'en') ? 'en' : 'ja';
?>

<div class="wrapper events-archive">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <section class="events-section section-spacing">
            <div class="container">
              <!-- Hero header -->
              <div class="events-header">
                <h1 class="page-title">Events</h1>
                <h2 class="page-subtitle"><?php echo ($lang === 'en') ? 'Latest updates' : 'イベント'; ?></h2>
              </div>

              <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;

              $events_query = new WP_Query([
                'post_type' => 'event',
                'posts_per_page' => 10,
                'paged' => $paged,
                'orderby' => 'meta_value',
                'meta_key' => 'event_date_start',
                'order' => 'DESC',
              ]);

              $category_classes = [
                'symposiums'   => 'tag-symposium',
                'workshops'    => 'tag-workshop',
                'lectures'     => 'tag-lecture',
                'conferences'  => 'tag-conference',
                'publications' => 'tag-publication',
                'media'        => 'tag-media',
                'awards'       => 'tag-award',
                'projects'     => 'tag-project',
                'contests'     => 'tag-contest',
                'news'         => 'tag-news'
              ];

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
              

              if ($events_query->have_posts()) :
                while ($events_query->have_posts()) : $events_query->the_post();

                  $start = get_field('event_start_time');
                  $end = get_field('event_end_time');
                  $date_mode = get_field('event_date_mode');
                  $start_date = get_field('event_date_start');
                  $end_date = get_field('event_date_end');
                  $second_date = get_field('event_date_second');

                  $formatted_date = ($lang === 'en') ? 'TBD' : '未定';

                  if ($date_mode === 'single' && $start_date) {
                    $formatted_date = date_i18n('Y/n/j', strtotime($start_date));
                  } elseif ($date_mode === 'range' && $start_date && $end_date) {
                    $start_ts = strtotime($start_date);
                    $end_ts = strtotime($end_date);

                    $same_year = date_i18n('Y', $start_ts) === date_i18n('Y', $end_ts);
                    $same_month = date_i18n('n', $start_ts) === date_i18n('n', $end_ts);

                    if ($same_year && $same_month) {
                      $year = date_i18n('Y', $start_ts);
                      $month = date_i18n('n', $start_ts);
                      $day_start = date_i18n('j', $start_ts);
                      $day_end = date_i18n('j', $end_ts);
                      $formatted_date = $year . '/' . $month . '/' . $day_start . '–' . $day_end;
                    } else {
                      $year = date_i18n('Y', $start_ts);
                      $formatted_date = $year . '/' . date_i18n('n/j', $start_ts) . ' – ' . date_i18n('n/j', $end_ts);
                    }
                  } elseif ($date_mode === 'multiple' && $start_date && $second_date) {
                    $ts1 = strtotime(str_replace('/', '-', $start_date));
                    $ts2 = strtotime(str_replace('/', '-', $second_date));
                    if ($ts1 && $ts2) {
                      if ($ts1 > $ts2) [$ts1, $ts2] = [$ts2, $ts1];
                      $year = date_i18n('Y', $ts1);
                      $start_display = date_i18n('n/j', $ts1);
                      $second_display = date_i18n('n/j', $ts2);
                      $formatted_date = '<span class="event-year">' . esc_html($year) . '/</span>' . esc_html($start_display) . '・' . esc_html($second_display);
                    }
                  }

                  $time_string = ($start && $end) ? date('H:i', strtotime($start)) . ' - ' . date('H:i', strtotime($end)) : '';
                  $thumbnail = get_field('thumbnail');
                  $category_value = get_field('event_category');
                  $category_label = $category_labels[$category_value][$lang] ?? (($lang === 'en') ? 'Event' : 'イベント');
                  $tag_class = $category_classes[$category_value] ?? 'tag-news';
              ?>

              <hr class="event-divider" />

              <div class="event-item">
                <?php if ($thumbnail) : ?>
                  <div class="event-thumbnail">
                    <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" />
                  </div>
                <?php endif; ?>

                <div class="event-content">
                  <div class="event-date"><?php echo $formatted_date; ?></div>
                  <div class="event-tag <?php echo esc_attr($tag_class); ?>">
                    <?php echo esc_html($category_label); ?>
                  </div>
                  <div class="event-summary">
                    <a href="<?php the_permalink(); ?>" class="event-title-link">
                      <?php the_title(); ?>
                    </a>
                    <?php if ($time_string): ?>
                      <div class="event-time"><?php echo esc_html($time_string); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <?php endwhile; ?>

              <hr class="event-divider" />
              <div class="custom-pagination">
                <?php
                $pagination = paginate_links([
                  'prev_next' => false,
                  'type' => 'array',
                  'mid_size' => 2,
                  'end_size' => 1
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
                <p><?php echo ($lang === 'en') ? 'No events yet.' : 'イベントがまだありません。'; ?></p>
              <?php endif; ?>
            </div>
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
