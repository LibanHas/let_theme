<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

/**
 * Parse various date formats into a UNIX timestamp.
 * Accepts: Ymd (ACF return), Y/m/d, d/m/Y (editor display), Y-m-d, or anything strtotime understands.
 */
function parse_to_ts($date_string) {
    if (empty($date_string)) return false;

    // Ymd (e.g., 20251028)
    if (preg_match('/^\d{8}$/', $date_string)) {
        $dt = DateTime::createFromFormat('Ymd', $date_string);
        return $dt ? $dt->getTimestamp() : false;
    }
    // Y/m/d (e.g., 2026/01/09)
    if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $date_string)) {
        $dt = DateTime::createFromFormat('Y/m/d', $date_string);
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

function render_people_with_affils($names, $affils = '') {
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

  // Hardcode language to Japanese
  $lang = 'ja';

  // ACF fields
  $start_time = get_field('event_start_time');
  $end_time   = get_field('event_end_time');
  $venue_mode = get_field('event_participation_mode');
  $participation_method = get_field('event-participation');
  if (empty($participation_method)) {
    $participation_method = get_field('event_participation');
  }
  $event_venue = get_field('event_venue');
  $organizer = get_field('event_organizer');
  $coorganizer = get_field('event_coorganizer');
  $body       = get_field('event_body');

  // Registration fields (top-level ACF fields)
  $registration_required = get_field('registration_required');
  $registration_url = get_field('registration_url');
  $registration_cta_text = get_field('registration_cta_text');
  $registration_deadline_date = get_field('registration_deadline_date');
  $registration_deadline_note = get_field('registration_deadline_note');
  $registration_details = get_field('registration_details');
  $registration_official_page = get_field('registration_official_page');

  if (!$registration_cta_text) {
    $registration_cta_text = '参加登録フォームに移動する';
  }

  // Normalize ACF time values (supports scalar/array/object) and format to HH:ii.
  $normalize_event_time = function($value) {
    if (is_array($value)) {
      if (isset($value['value'])) {
        $value = $value['value'];
      } else {
        $value = reset($value);
      }
    } elseif (is_object($value) && method_exists($value, '__toString')) {
      $value = (string) $value;
    }

    $value = trim((string) $value);
    if ($value === '') {
      return '';
    }

    $ts = strtotime($value);
    if ($ts !== false) {
      return date('H:i', $ts);
    }

    return $value;
  };

  $start_time_text = $normalize_event_time($start_time);
  $end_time_text = $normalize_event_time($end_time);

  if ($start_time_text && $end_time_text) {
    $event_time_text = $start_time_text . '〜' . $end_time_text;
  } elseif ($start_time_text) {
    $event_time_text = $start_time_text;
  } elseif ($end_time_text) {
    $event_time_text = $end_time_text;
  } else {
    $event_time_text = '';
  }

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
      // Include weekday for both dates
      $formatted_dates = format_jp_date_wday($ts1) . ' – ' . format_jp_date_wday($ts2);
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

  $participation_labels = [
    'in_person' => '対面',
    'online'    => 'オンライン',
  ];

  // Safely flatten ACF payloads (scalar / array / object / both-format items) into text tokens.
  $extract_text_tokens = function($input) use (&$extract_text_tokens) {
    $tokens = [];

    if (is_array($input)) {
      $is_assoc = array_keys($input) !== range(0, count($input) - 1);
      if ($is_assoc) {
        if (array_key_exists('value', $input)) {
          $tokens = array_merge($tokens, $extract_text_tokens($input['value']));
        } elseif (array_key_exists('label', $input)) {
          $tokens = array_merge($tokens, $extract_text_tokens($input['label']));
        } else {
          foreach ($input as $item) {
            $tokens = array_merge($tokens, $extract_text_tokens($item));
          }
        }
      } else {
        foreach ($input as $item) {
          $tokens = array_merge($tokens, $extract_text_tokens($item));
        }
      }
      return $tokens;
    }

    if (is_object($input)) {
      if (isset($input->value)) {
        return $extract_text_tokens($input->value);
      }
      if (isset($input->label)) {
        return $extract_text_tokens($input->label);
      }
      if (method_exists($input, '__toString')) {
        $value = trim((string) $input);
        return $value !== '' ? [$value] : [];
      }
      return [];
    }

    if (is_scalar($input)) {
      $value = trim((string) $input);
      return $value !== '' ? [$value] : [];
    }

    return [];
  };

  // Use raw (unformatted) value so checkbox/select return format changes do not break display.
  $venue_raw = get_field('event_participation_mode', get_the_ID(), false);
  $venue_obj = get_field_object('event_participation_mode');
  $venue_choices = is_array($venue_obj) && !empty($venue_obj['choices'])
    ? $venue_obj['choices']
    : [];

  if ($venue_raw === null || $venue_raw === '' || $venue_raw === []) {
    $venue_raw = $venue_mode;
  }

  $raw_modes = array_values(array_unique($extract_text_tokens($venue_raw)));

  $modes = [];
  foreach ($raw_modes as $mode) {
    $normalized_key = strtolower($mode);

    // Canonical keys
    if ($normalized_key === 'in_person' || $normalized_key === 'online') {
      $modes[] = $normalized_key;
      continue;
    }

    // Japanese labels / values from checkbox/select settings
    if ($mode === '対面') {
      $modes[] = 'in_person';
      continue;
    }
    if ($mode === 'オンライン') {
      $modes[] = 'online';
      continue;
    }

    // Fallback: keep as-is so it can still display later
    $modes[] = $mode;
  }
  $modes = array_values(array_unique($modes));

  $has_in_person = in_array('in_person', $modes, true);
  $has_online = in_array('online', $modes, true);

  if ($has_in_person && $has_online) {
    $venue_text = 'ハイブリッド（対面・オンライン）';
  } else {
    $venue_text_parts = [];
    foreach ($modes as $mode) {
      if (isset($participation_labels[$mode])) {
        $venue_text_parts[] = $participation_labels[$mode];
      } elseif (isset($venue_choices[$mode])) {
        $venue_text_parts[] = $venue_choices[$mode];
      } else {
        $venue_text_parts[] = $mode;
      }
    }
    $venue_text = implode('・', $venue_text_parts);
  }

  // 会場 (event_venue) - supports scalar or array/object values safely.
  $event_venue_tokens = array_values(array_unique($extract_text_tokens($event_venue)));
  $event_venue_text = implode("\n", $event_venue_tokens);

  // 参加方法 (event-participation / event_participation) - supports scalar or array values.
  $participation_tokens = array_values(array_unique($extract_text_tokens($participation_method)));
  $participation_text = implode('・', $participation_tokens);
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
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar-days-solid.png" alt="カレンダー"></span>
                    <div class="event-meta-text"><?php echo $formatted_dates; ?></div>
                  </div>
                <?php endif; ?>

                <?php if ($event_time_text): ?>
                  <div class="event-meta-item">
                    <span class="event-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/Vector.png" alt="時計"></span>
                    <div class="event-meta-text">
                      <?php echo esc_html($event_time_text); ?>
                    </div>
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

              <?php if (has_post_thumbnail()): ?>
                <div class="event-image">
                  <?php
                  $thumb_id  = get_post_thumbnail_id();
                  $full_url  = wp_get_attachment_url($thumb_id);
                  $thumb_img = wp_get_attachment_image(
                    $thumb_id,
                    'medium',
                    false,
                    [
                      'class' => 'alignnone size-medium wp-image-' . $thumb_id,
                      'style' => 'width:200px;height:auto;',
                    ]
                  );
                  ?>
                  <?php if ($full_url && $thumb_img): ?>
                    <a class="event-image-lightbox-trigger" href="<?php echo esc_url($full_url); ?>" rel="attachment wp-att-<?php echo esc_attr($thumb_id); ?>">
                      <?php echo $thumb_img; ?>
                    </a>

                    <div class="event-image-lightbox" id="event-image-lightbox" hidden>
                      <img class="event-image-lightbox__image" src="<?php echo esc_url($full_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </div>

                    <script>
                    (function () {
                      const trigger = document.querySelector('.event-image-lightbox-trigger');
                      const lightbox = document.getElementById('event-image-lightbox');
                      const image = lightbox ? lightbox.querySelector('.event-image-lightbox__image') : null;

                      if (!trigger || !lightbox || !image) return;

                      function closeLightbox() {
                        lightbox.hidden = true;
                      }

                      trigger.addEventListener('click', function (e) {
                        e.preventDefault();
                        image.src = trigger.getAttribute('href');
                        lightbox.hidden = false;
                      });

                      lightbox.addEventListener('click', function (e) {
                        // Close only when clicking outside the enlarged image
                        if (e.target === lightbox) {
                          closeLightbox();
                        }
                      });

                      document.addEventListener('keydown', function (e) {
                        if (e.key === 'Escape' && !lightbox.hidden) {
                          closeLightbox();
                        }
                      });
                    })();
                    </script>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <?php if ($organizer || $coorganizer || !empty($event_venue_text) || !empty($venue_text) || !empty($participation_text) || $registration_required): ?>
              <div class="event-info-box">

                <?php if ($organizer): ?>
                <div class="event-info-row">
                  <div class="event-info-label">主催</div>
                  <div class="event-info-value">
                    <?php echo nl2br(esc_html($organizer)); ?>
                  </div>
                </div>
                <?php endif; ?>

                <?php if ($coorganizer): ?>
                <div class="event-info-row">
                  <div class="event-info-label">共催</div>
                  <div class="event-info-value">

                    <ul class="event-cohosts">
                    <?php
                    $cohosts = array_filter(array_map('trim', explode("\n", $coorganizer)));
                    foreach ($cohosts as $host) {
                        echo '<li>' . esc_html($host) . '</li>';
                    }
                    ?>
                    </ul>

                  </div>
                </div>
                <?php endif; ?>

                <?php if ($formatted_dates || $event_time_text): ?>
                <div class="event-info-row">
                  <div class="event-info-label">日時</div>
                  <div class="event-info-value">
                    <?php if ($formatted_dates): ?>
                      <?php echo esc_html($formatted_dates); ?>
                    <?php endif; ?>
                    <?php if ($event_time_text): ?>
                      <?php if ($formatted_dates) echo ' '; ?>
                      <?php echo esc_html($event_time_text); ?>
                    <?php endif; ?>
                  </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($event_venue_text) || !empty($venue_text)): ?>
                <div class="event-info-row">
                  <div class="event-info-label">会場</div>
                  <div class="event-info-value">
                    <?php
                    if (!empty($event_venue_text)) {
                      echo nl2br(esc_html($event_venue_text));
                    } else {
                      echo esc_html($venue_text);
                    }
                    ?>
                  </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($participation_text)): ?>
                <div class="event-info-row">
                  <div class="event-info-label">参加方法</div>
                  <div class="event-info-value">
                    <?php echo esc_html($participation_text); ?>
                  </div>
                </div>
                <?php endif; ?>

                <?php if ($registration_required): ?>

                <div class="event-info-row event-participation">
                  <div class="event-info-label">参加登録</div>
                  <div class="event-info-value">

                    <?php if (!empty($registration_details)): ?>
                      <div class="registration_details">
                        <?php echo nl2br(esc_html($registration_details)); ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($registration_url): ?>
                      <a class="event-registration-link"
                         href="<?php echo esc_url($registration_url); ?>"
                         target="_blank"
                         rel="noopener">
                         <?php echo esc_html($registration_cta_text); ?>
                      </a>
                    <?php endif; ?>

                    <?php if ($registration_deadline_date || $registration_deadline_note): ?>
                      <div class="event-info-sub">

                        <?php
                        if ($registration_deadline_date) {
                            $ts = parse_to_ts($registration_deadline_date);
                            if ($ts !== false) {
                                echo '登録締切：<span class="event-deadline">' .
                                     esc_html(format_jp_date_wday($ts)) .
                                     '</span>';
                            }
                        }

                        if ($registration_deadline_note) {
                            echo ' ' . esc_html($registration_deadline_note);
                        }
                        ?>

                      </div>
                    <?php endif; ?>

                    <?php if (!empty($registration_official_page)): ?>
                      <div class="registration_official_page">
                        <?php
                        if (is_array($registration_official_page) && !empty($registration_official_page['url'])) {
                          $link_text = !empty($registration_official_page['title']) ? $registration_official_page['title'] : $registration_official_page['url'];
                          echo '公式ページ：<a href="' . esc_url($registration_official_page['url']) . '" target="_blank" rel="noopener">' . esc_html($link_text) . '</a>';
                        } else {
                          echo wp_kses($registration_official_page, [
                            'a' => [
                              'href' => true,
                              'target' => true,
                              'rel' => true,
                            ],
                            'br' => [],
                            'span' => ['class' => true],
                          ]);
                        }
                        ?>
                      </div>
                    <?php endif; ?>

                  </div>
                </div>

                <?php endif; ?>

              </div>

              <?php endif; ?>
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

                    <h3 class="event-section-title">プログラム</h3>

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
                                  <span class="program-role-pill">司会</span>
                                  <div class="panel-role-content">
                                    <?php render_people_with_affils($moderator_names, $moderator_affils); ?>
                                  </div>
                                </div>
                              <?php endif; ?>

                              <?php if ($panelist_names): ?>
                                <div class="panel-role">
                                  <span class="program-role-pill">パネリスト</span>
                                  <div class="panel-role-content">
                                    <?php render_people_with_affils($panelist_names, $panelist_affils); ?>
                                  </div>
                                </div>
                              <?php endif; ?>

                              <?php if ($discussant_names): ?>
                                <div class="panel-role">
                                  <span class="program-role-pill">指定討論者</span>
                                  <div class="panel-role-content">
                                    <?php render_people_with_affils($discussant_names, $discussant_affils); ?>
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
                                  動画はこちら
                                </a>
                              <?php endif; ?>

                              <?php if ($is_presentation && $pdf): ?>
                                <a href="<?php echo esc_url($pdf); ?>" class="program-link program-link--pdf" target="_blank" rel="noopener">
                                  <span class="icon icon-pdf"></span>
                                  資料はこちら
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

            </div>
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>
