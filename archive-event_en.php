<?php
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
$lang = 'en'; // Fixed for English

/**
 * Parse various date formats into a UNIX timestamp.
 * Accepts: Ymd (ACF return), d/m/Y (editor display), Y-m-d, or anything strtotime understands.
 */
if (!function_exists('archive_parse_to_ts')) {
  function archive_parse_to_ts($date_string) {
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
}

// Short date: "Y/n/j"
if (!function_exists('archive_format_short')) {
  function archive_format_short($ts) {
    if ($ts === false) return '';
    return date_i18n('Y/n/j', $ts);
  }
}
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
                <h2 class="page-subtitle">Latest updates</h2>
              </div>

              <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;

              $events_query = new WP_Query([
                'post_type'      => 'event_en',
                'posts_per_page' => 10,
                'paged'          => $paged,
                'orderby'        => 'meta_value',
                'meta_key'       => 'event_date_start',
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
                'symposiums'   => 'Symposium',
                'workshops'    => 'Workshop',
                'lectures'     => 'Lecture',
                'conferences'  => 'Conference',
                'expo'         => 'Expo',
                'camp'         => 'Camp',
                'visit'        => 'Visit',
                'social_event' => 'Social Event',
                'publications' => 'Publication',
                'media'        => 'Media',
                'awards'       => 'Award',
                'projects'     => 'Project',
                'contests'     => 'Contest',
                'news'         => 'News'
              ];
              

              if ($events_query->have_posts()) :
                while ($events_query->have_posts()) : $events_query->the_post();

                  // Times
                  $start = get_field('event_start_time');
                  $end   = get_field('event_end_time');

                  // Date mode + fields
                  $date_mode   = get_field('event_date_mode');   // 'single' | 'range' | 'multiple'
                  $start_date  = get_field('event_date_start');
                  $end_date    = get_field('event_date_end');
                  $second_date = get_field('event_date_second');
                  $third_date  = get_field('event_date_third');   // NEW
                  $fourth_date = get_field('event_date_fourth');  // NEW

                  // Build formatted date (short)
                  $formatted_date = 'TBD';

                  if ($date_mode === 'single' && $start_date) {
                    $ts = archive_parse_to_ts($start_date);
                    if ($ts !== false) {
                      $formatted_date = archive_format_short($ts);
                    }

                  } elseif ($date_mode === 'range' && $start_date && $end_date) {
                    $ts1 = archive_parse_to_ts($start_date);
                    $ts2 = archive_parse_to_ts($end_date);
                    if ($ts1 !== false && $ts2 !== false) {
                      $formatted_date = archive_format_short($ts1) . ' – ' . archive_format_short($ts2);
                    }

                  } elseif ($date_mode === 'multiple') {
                    // Collect up to four dates; normalize, dedupe, sort; print each
                    $candidates = array_filter([$start_date, $second_date, $third_date, $fourth_date]);
                    $ts_list = [];
                    foreach ($candidates as $d) {
                      $ts = archive_parse_to_ts($d);
                      if ($ts !== false) $ts_list[] = $ts;
                    }
                    $ts_list = array_values(array_unique($ts_list));
                    sort($ts_list);

                    if (!empty($ts_list)) {
                      $shorts = array_map('archive_format_short', $ts_list);
                      // Join with comma (e.g., 2025/10/28, 2025/10/29, 2025/11/4)
                      $formatted_date = implode(', ', array_filter($shorts));
                    }
                  }

                  // Time string
                  $time_string = ($start && $end)
                    ? date('H:i', strtotime($start)) . ' - ' . date('H:i', strtotime($end))
                    : '';

                  // Thumbnail: try event_thumbnail first, fall back to 'thumbnail' field if that's what your ACF uses here
                  $thumbnail = get_field('event_thumbnail');
                  if (!$thumbnail) {
                    $thumbnail = get_field('thumbnail');
                  }
                  $category_value = get_field('event_category');
                  $category_label = $category_labels[$category_value] ?? 'Event';
                  $tag_class = $category_classes[$category_value] ?? 'tag-news';
              ?>

              <hr class="event-divider" />

              <div class="event-item">
                <?php if ($thumbnail && is_array($thumbnail) && !empty($thumbnail['url'])) : ?>
                  <div class="event-thumbnail">
                    <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt'] ?? ''); ?>" />
                  </div>
                <?php endif; ?>

                <div class="event-content">
                  <div class="event-date"><?php echo esc_html($formatted_date); ?></div>
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
                <p>No events yet.</p>
              <?php endif; wp_reset_postdata(); ?>
            </div>
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>