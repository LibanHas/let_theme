<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

/**
 * Parse various date formats into a UNIX timestamp.
 * Accepts: Ymd (ACF return), d/m/Y (editor display), Y-m-d, or anything strtotime understands.
 */
function en_parse_to_ts($date_string) {
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
 * Format timestamp -> "F j, Y (Day)"
 */
function en_format_date_wday($ts) {
    if ($ts === false) return '';
    return date('F j, Y', $ts) . ' (' . date('D', $ts) . ')';
}

function en_render_people_with_affils($names, $affils = '') {
  if (!$names) return;

  $names_arr  = array_filter(array_map('trim', explode("\n", $names)));
  $affils_arr = array_filter(array_map('trim', explode("\n", (string)$affils)));

  foreach ($names_arr as $i => $name) {
    echo '<div class="program-person">';

    echo '<div class="program-speaker">' . esc_html($name) . '</div>';

    if (!empty($affils_arr[$i])) {
      echo '<div class="program-affiliation">' . esc_html($affils_arr[$i]) . '</div>';
    }

    echo '</div>';
  }
}

// Inside The Loop
while (have_posts()) : the_post();

  // Hardcode language to English
  $lang = 'en';

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
  $third_date  = get_field('event_date_third');  // multiple third
  $fourth_date = get_field('event_date_fourth'); // multiple fourth

  $category_value = get_field('event_category');

  // Category labels and classes
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

  $category_label = $category_labels[$category_value] ?? 'Event';
  $tag_class      = $category_classes[$category_value] ?? 'tag-event';

  // Build formatted date string (supports single | range | multiple 2–4 dates)
  $formatted_dates = '';

  if ($date_mode === 'single' && $start_date) {
    $ts = en_parse_to_ts($start_date);
    if ($ts !== false) {
      $formatted_dates = en_format_date_wday($ts);
    }

  } elseif ($date_mode === 'range' && $start_date && $end_date) {
    $ts1 = en_parse_to_ts($start_date);
    $ts2 = en_parse_to_ts($end_date);
    if ($ts1 !== false && $ts2 !== false) {
      $formatted_dates = en_format_date_wday($ts1) . ' – ' . date('F j, Y', $ts2);
    }

  } elseif ($date_mode === 'multiple') {
    // Collect up to four dates; normalize, dedupe, sort
    $candidates = array_filter([$start_date, $second_date, $third_date, $fourth_date]);
    $ts_list = [];
    foreach ($candidates as $d) {
      $ts = en_parse_to_ts($d);
      if ($ts !== false) $ts_list[] = $ts;
    }
    $ts_list = array_values(array_unique($ts_list));
    sort($ts_list);

    if (!empty($ts_list)) {
      $formatted_each = array_map('en_format_date_wday', $ts_list);
      $formatted_dates = implode(', ', $formatted_each);
    }
  }

  $format_labels = [
    'online'    => 'Online',
    'in_person' => 'In-person',
    'hybrid'    => 'Hybrid',
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
                <h2 class="page-subtitle">Event Details</h2>
              </div>

              <?php
              // Get adjacent events ordered by event_date_start
              $prev_event = get_adjacent_event_by_date('previous');
              $next_event = get_adjacent_event_by_date('next');

              if ($prev_event || $next_event):
              ?>
              <nav class="event-navigation">
                <div class="event-nav-next">
                  <?php if ($next_event):
                    $next_title = mb_strimwidth($next_event->post_title, 0, 40, '…');
                  ?>
                    <a href="<?php echo get_permalink($next_event); ?>">
                      <span class="nav-arrow">←</span>
                      <span class="nav-label"><?php echo esc_html($next_title); ?></span>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="event-nav-prev">
                  <?php if ($prev_event):
                    $prev_title = mb_strimwidth($prev_event->post_title, 0, 40, '…');
                  ?>
                    <a href="<?php echo get_permalink($prev_event); ?>">
                      <span class="nav-label"><?php echo esc_html($prev_title); ?></span>
                      <span class="nav-arrow">→</span>
                    </a>
                  <?php endif; ?>
                </div>
              </nav>
              <?php endif; ?>

              <h2 class="event-title"><?php the_title(); ?></h2>

              <div class="event-meta-grid">
                <?php if ($formatted_dates): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar-days-solid.png" alt="Calendar"></span>
                    <div class="event-meta-text"><?php echo $formatted_dates; ?></div>
                  </div>
                <?php endif; ?>

                <?php if ($start_time && $end_time): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/Vector.png" alt="Clock"></span>
                    <div class="event-meta-text">
                      <?php echo esc_html(date('H:i', strtotime($start_time))); ?> – <?php echo esc_html(date('H:i', strtotime($end_time))); ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($format): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/location-dot-solid.png" alt="Location"></span>
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
              <?php
              // Fetch program items linked to this event
              $program_items = get_posts([
                'post_type'      => 'program_item',
                'posts_per_page' => -1,
                'meta_query'     => [
                  [
                    'key'   => 'related_event',
                    'value' => get_the_ID(),
                  ],
                ],
                'meta_key' => 'start_time',
                'orderby'  => 'meta_value',
                'order'    => 'ASC',
              ]);
              ?>

              <?php if ($program_items): ?>
                <section class="event-program section-spacing">
                  <div class="container">

                    <h3 class="event-section-title">Program</h3>

                    <ul class="event-program-list">
                      <?php
                        $current_section = null;

                        foreach ($program_items as $item):

                          // Core timeline fields
                          $start_time = get_field('start_time', $item->ID);
                          $section    = get_field('section_label', $item->ID);

                          // Program type
                          $program_type = get_field('program_type', $item->ID);
                          $is_panel = ($program_type === 'panel');
                          $is_presentation = ($program_type === 'presentation');

                          // Universal media fields (retrieve once, branch later)
                          $youtube = get_field('youtube_url', $item->ID);
                          $pdf     = get_field('presentation_pdf', $item->ID);

                          // Presentation fields
                          $speaker = get_field('speaker_name', $item->ID);
                          $affil   = get_field('speaker_affiliation', $item->ID);
                          $notes   = get_field('speaker_notes', $item->ID);

                          // Panel fields
                          $panel_title        = get_field('panel_title', $item->ID);

                          $moderator_names    = get_field('panel_moderator', $item->ID);
                          $moderator_affils   = get_field('panel_moderator_affiliation', $item->ID);

                          $panelist_names     = get_field('panel_panelists', $item->ID);
                          $panelist_affils    = get_field('panel_panelist_affils', $item->ID);

                          $discussant_names   = get_field('panel_discussants', $item->ID);
                          $discussant_affils  = get_field('panel_discussant_affils', $item->ID);

                          // Section heading (timeline-safe)
                          if ($section && $section !== $current_section):
                      ?>
                          <li class="program-section-row">
                            <div class="program-time"></div>
                            <div class="program-section-heading">
                              <?php echo esc_html($section); ?>
                            </div>
                          </li>
                      <?php
                          $current_section = $section;
                          endif;
                      ?>

                      <li class="program-row <?php echo $is_panel ? 'is-panel' : ''; ?> <?php echo $is_presentation ? 'is-event' : ''; ?>">

                        <div class="program-time">
                          <span class="time-badge"><?php echo esc_html($start_time); ?></span>
                          <span class="timeline-dot"></span>
                        </div>

                        <?php
                        $card_class = 'program-card';
                        if ($is_panel) {
                          $card_class .= ' program-card--panel';
                        } elseif ($is_presentation) {
                          $card_class .= ' program-card--event';
                        }
                        ?>
                        <div class="<?php echo $card_class; ?>">
                          <div class="program-card__content">

                            <h5 class="program-title">
                              <?php echo esc_html($is_panel && $panel_title ? $panel_title : $item->post_title); ?>
                            </h5>

                          <?php if ($is_panel): ?>

                            <div class="panel-roles">

                              <?php if ($moderator_names): ?>
                                <div class="panel-role">
                                  <span class="program-role-pill">Moderator</span>
                                  <div class="panel-role-content">
                                    <?php en_render_people_with_affils($moderator_names, $moderator_affils); ?>
                                  </div>
                                </div>
                              <?php endif; ?>

                              <?php if ($panelist_names): ?>
                                <div class="panel-role">
                                  <span class="program-role-pill">Panelists</span>
                                  <div class="panel-role-content">
                                    <?php en_render_people_with_affils($panelist_names, $panelist_affils); ?>
                                  </div>
                                </div>
                              <?php endif; ?>

                              <?php if ($discussant_names): ?>
                                <div class="panel-role">
                                  <span class="program-role-pill">Discussants</span>
                                  <div class="panel-role-content">
                                    <?php en_render_people_with_affils($discussant_names, $discussant_affils); ?>
                                  </div>
                                </div>
                              <?php endif; ?>

                            </div>

                          <?php else: ?>

                            <?php if ($speaker): ?>
                              <div class="program-speaker"><?php echo esc_html($speaker); ?></div>
                            <?php endif; ?>

                            <?php if ($affil): ?>
                              <div class="program-affiliation"><?php echo esc_html($affil); ?></div>
                            <?php endif; ?>

                          <?php endif; ?>

                          <?php if ($notes): ?>
                            <div class="program-notes">
                              <?php echo nl2br(esc_html($notes)); ?>
                            </div>
                          <?php endif; ?>

                          <?php // Action links (YouTube universal, PDF presentation-only)
                          if ($youtube || ($is_presentation && $pdf)): ?>
                            <div class="program-card__actions">
                              <?php if ($youtube): ?>
                                <a href="<?php echo esc_url($youtube); ?>" class="program-link program-link--video" target="_blank" rel="noopener">
                                  <span class="icon icon-youtube"></span>
                                  Watch Video
                                </a>
                              <?php endif; ?>

                              <?php if ($is_presentation && $pdf): ?>
                                <a href="<?php echo esc_url($pdf); ?>" class="program-link program-link--pdf" target="_blank" rel="noopener">
                                  <span class="icon icon-pdf"></span>
                                  Download PDF
                                </a>
                              <?php endif; ?>
                            </div>
                          <?php endif; ?>

                          </div><!-- .program-card__content -->
                        </div><!-- .program-card -->
                      </li>

                      <?php endforeach; ?>
                    </ul>

                    <script>
                    (function() {
                      const list = document.querySelector('.event-program-list');
                      if (!list) return;
                      const dots = list.querySelectorAll('.timeline-dot');
                      if (dots.length < 2) return;

                      function adjustTimeline() {
                        const listRect = list.getBoundingClientRect();
                        const firstDot = dots[0].getBoundingClientRect();
                        const lastDot = dots[dots.length - 1].getBoundingClientRect();

                        const topOffset = (firstDot.top + firstDot.height / 2) - listRect.top;
                        const bottomOffset = listRect.bottom - (lastDot.top + lastDot.height / 2);

                        list.style.setProperty('--timeline-top', topOffset + 'px');
                        list.style.setProperty('--timeline-bottom', bottomOffset + 'px');
                      }

                      adjustTimeline();
                      window.addEventListener('resize', adjustTimeline);
                    })();
                    </script>

                  </div>
                </section>
              <?php endif; ?>

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
