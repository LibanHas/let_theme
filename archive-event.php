<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
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
                <h2 class="page-subtitle">イベント</h2>
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

              if ($events_query->have_posts()) :
                while ($events_query->have_posts()) : $events_query->the_post();
                  $format = get_field('event_format');
                  $start = get_field('event_start_time');
                  $end = get_field('event_end_time');

                  $date_mode = get_field('event_date_mode');
                  $start_date = get_field('event_date_start');
                  $end_date = get_field('event_date_end');
                  $second_date = get_field('event_date_second');

                  $formatted_date = '未定';

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
                      // Fallback to full range
                      $year = date_i18n('Y', $start_ts);
                      $formatted_date = $year . '/' . date_i18n('n/j', $start_ts) . ' – ' . date_i18n('n/j', $end_ts);
                    }                  
                  } elseif ($date_mode === 'multiple' && $start_date && $second_date) {
                    $ts1 = strtotime(str_replace('/', '-', $start_date));
                    $ts2 = strtotime(str_replace('/', '-', $second_date));
                  
                    if ($ts1 && $ts2) {
                      if ($ts1 > $ts2) {
                        [$ts1, $ts2] = [$ts2, $ts1];
                      }
                  
                      $year = date_i18n('Y', $ts1);
                      $start_display = date_i18n('n/j', $ts1);
                      $second_display = date_i18n('n/j', $ts2);
                      $formatted_date = '<span class="event-year">' . esc_html($year) . '/</span>' . esc_html($start_display) . '・' . esc_html($second_display);
                    } else {
                      $formatted_date = '未定';
                    }
                  }

                  $format_labels = [
                    'online' => 'オンライン',
                    'in_person' => '対面',
                    'hybrid' => 'ハイブリッド',
                  ];
                  $format_label = $format_labels[$format] ?? $format;

                  $time_string = '';
                  if ($start && $end) {
                    $time_string = date('H:i', strtotime($start)) . ' - ' . date('H:i', strtotime($end));
                  }
              ?>

              <hr class="event-divider" />

              <div class="event-item">
                <?php
                $thumbnail = get_field('thumbnail');
                if ($thumbnail) :
                ?>
                  <div class="event-thumbnail">
                    <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" />
                  </div>
                <?php endif; ?>

                <div class="event-content">
                  <div class="event-date"><?php echo $formatted_date; ?></div>
                  <div class="event-badge <?php echo esc_attr($format); ?>">
                    <?php echo esc_html($format_label); ?>
                  </div>
                  <div class="event-summary">
                    <a href="<?php the_permalink(); ?>" class="event-title-link">
                      <strong><?php the_title(); ?></strong>
                    </a>
                    <?php if ($time_string): ?>
                      <div class="event-time"><?php echo esc_html($time_string); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <?php endwhile; ?>

              <hr class="event-divider" />
              <div class="pagination text-center mt-4">
                <?php echo paginate_links(); ?>
              </div>

              <?php else : ?>
                <p>イベントがまだありません。</p>
              <?php endif; ?>
            </div>
          </section>
        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
