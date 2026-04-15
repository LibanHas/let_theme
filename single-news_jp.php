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
  $news_kicker = trim((string) get_field('news_kicker'));
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

  // Optional event-report module.
  // Show only when the toggle is enabled (if present) and a related event can be resolved.
  $toggle_raw = null;
  $toggle_candidates = ['news_show_event_report', 'show_event_report', 'event_report_enabled'];
  foreach ($toggle_candidates as $toggle_field) {
    $value = get_field($toggle_field);
    if ($value !== null && $value !== '') {
      $toggle_raw = $value;
      break;
    }
  }
  $show_event_report = ($toggle_raw === null) ? true : (bool) $toggle_raw;

  $related_event_raw = null;
  $related_event_candidates = ['news_related_event', 'related_event', 'event_reference', 'news_event'];
  foreach ($related_event_candidates as $related_field) {
    $value = get_field($related_field);
    if (!empty($value)) {
      $related_event_raw = $value;
      break;
    }
  }

  $related_event_id = 0;
  if ($related_event_raw instanceof WP_Post) {
    $related_event_id = (int) $related_event_raw->ID;
  } elseif (is_numeric($related_event_raw)) {
    $related_event_id = (int) $related_event_raw;
  } elseif (is_array($related_event_raw)) {
    if (isset($related_event_raw['ID']) && is_numeric($related_event_raw['ID'])) {
      $related_event_id = (int) $related_event_raw['ID'];
    } elseif (isset($related_event_raw[0])) {
      $first = $related_event_raw[0];
      if ($first instanceof WP_Post) {
        $related_event_id = (int) $first->ID;
      } elseif (is_numeric($first)) {
        $related_event_id = (int) $first;
      } elseif (is_array($first) && isset($first['ID']) && is_numeric($first['ID'])) {
        $related_event_id = (int) $first['ID'];
      }
    }
  }

  $related_event_type = $related_event_id > 0 ? (string) get_post_type($related_event_id) : '';
  $has_event_report = $show_event_report && $related_event_id > 0 && strpos($related_event_type, 'event') === 0;

  $event_report = [
    'title'        => '',
    'permalink'    => '',
    'datetime'     => '',
    'venue'        => '',
    'organizer'    => '',
    'coorganizers' => [],
    'sessions'     => [],
  ];

  if ($has_event_report) {
    $normalize_text = function($value) {
      $value = (string) $value;
      // Trim both ASCII and full-width/Unicode separator spaces.
      $value = preg_replace('/^\p{Z}+|\p{Z}+$/u', '', $value);
      return trim((string) $value);
    };
    $normalize_name = function($value) use ($normalize_text) {
      $value = $normalize_text($value);
      // If the name is CJK-only, remove separator spaces to avoid oversized visual gaps.
      if (preg_match('/[\p{Han}\p{Hiragana}\p{Katakana}]/u', $value) && !preg_match('/[A-Za-z]/', $value)) {
        return preg_replace('/[\p{Z}\s]+/u', '', $value);
      }
      // Otherwise collapse separators to one normal space for Latin names.
      return preg_replace('/[\p{Z}\s]+/u', ' ', $value);
    };
    $parse_people_with_affils = function($names, $affils = '') use ($normalize_name, $normalize_text) {
      $names_arr = array_values(array_filter(array_map($normalize_name, explode("\n", (string) $names))));
      $affils_arr = array_values(array_map($normalize_text, explode("\n", (string) $affils)));
      $people = [];

      foreach ($names_arr as $index => $name) {
        $people[] = [
          'name' => $name,
          'affiliation' => $affils_arr[$index] ?? '',
        ];
      }

      return $people;
    };

    $event_report['title'] = get_the_title($related_event_id);
    $event_report['permalink'] = get_permalink($related_event_id);
    $event_report['venue'] = $normalize_text(get_field('event_venue', $related_event_id));
    $event_report['organizer'] = $normalize_text(get_field('event_organizer', $related_event_id));

    $coorganizer_text = (string) get_field('event_coorganizer', $related_event_id);
    if ($coorganizer_text !== '') {
      $event_report['coorganizers'] = array_values(array_filter(array_map($normalize_text, explode("\n", $coorganizer_text))));
    }

    $start_time = get_field('event_start_time', $related_event_id);
    $end_time   = get_field('event_end_time', $related_event_id);
    $date_mode   = get_field('event_date_mode', $related_event_id);   // single | range | multiple
    // Force raw values to avoid formatted strings stripping weekday handling.
    $start_date  = get_field('event_date_start', $related_event_id, false);
    $end_date    = get_field('event_date_end', $related_event_id, false);
    $second_date = get_field('event_date_second', $related_event_id, false);
    $third_date  = get_field('event_date_third', $related_event_id, false);
    $fourth_date = get_field('event_date_fourth', $related_event_id, false);

    $parse_to_ts = function($date_string) {
      if (empty($date_string)) {
        return false;
      }
      if (preg_match('/^\d{8}$/', $date_string)) {
        $dt = DateTime::createFromFormat('Ymd', $date_string);
        return $dt ? $dt->getTimestamp() : false;
      }
      if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $date_string)) {
        $dt = DateTime::createFromFormat('Y/m/d', $date_string);
        return $dt ? $dt->getTimestamp() : false;
      }
      if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $date_string, $m)) {
        return mktime(0, 0, 0, (int) $m[2], (int) $m[1], (int) $m[3]);
      }
      // Y年n月j日 (e.g., 2026年6月30日)
      if (preg_match('/^(\d{4})年(\d{1,2})月(\d{1,2})日$/', $date_string, $m)) {
        return mktime(0, 0, 0, (int) $m[2], (int) $m[3], (int) $m[1]);
      }
      if (preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $date_string)) {
        $dt = date_create($date_string);
        return $dt ? $dt->getTimestamp() : false;
      }
      $ts = strtotime($date_string);
      return $ts ? $ts : false;
    };

    $format_jp_date_wday = function($ts) {
      if ($ts === false) {
        return '';
      }
      $wmap = ['Sun' => '日', 'Mon' => '月', 'Tue' => '火', 'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土'];
      $w = $wmap[date('D', $ts)] ?? '';
      return date_i18n('Y年n月j日', $ts) . '（' . $w . '）';
    };

    $date_text = '';
    if ($start_date && $end_date) {
      $ts1 = $parse_to_ts($start_date);
      $ts2 = $parse_to_ts($end_date);
      if ($ts1 !== false && $ts2 !== false) {
        $date_text = $format_jp_date_wday($ts1) . ' – ' . $format_jp_date_wday($ts2);
      }
    } elseif ($date_mode === 'multiple') {
      $candidates = array_filter([$start_date, $second_date, $third_date, $fourth_date]);
      $ts_list = [];
      foreach ($candidates as $d) {
        $ts = $parse_to_ts($d);
        if ($ts !== false) {
          $ts_list[] = $ts;
        }
      }
      $ts_list = array_values(array_unique($ts_list));
      sort($ts_list);
      if (!empty($ts_list)) {
        $formatted_each = array_map($format_jp_date_wday, $ts_list);
        $date_text = implode(', ', $formatted_each);
      }
    } elseif ($start_date) {
      $ts = $parse_to_ts($start_date);
      if ($ts !== false) {
        $date_text = $format_jp_date_wday($ts);
      }
    }

    $normalize_time = function($value) {
      if (is_array($value) && isset($value['value'])) {
        $value = $value['value'];
      } elseif (is_array($value)) {
        $value = reset($value);
      }
      $value = trim((string) $value);
      if ($value === '') {
        return '';
      }
      $ts = strtotime($value);
      return $ts !== false ? date('H:i', $ts) : $value;
    };

    $start_time_text = $normalize_time($start_time);
    $end_time_text   = $normalize_time($end_time);
    $time_text = '';
    if ($start_time_text && $end_time_text) {
      $time_text = $start_time_text . '〜' . $end_time_text;
    } elseif ($start_time_text) {
      $time_text = $start_time_text;
    }

    $event_report['datetime'] = trim($date_text . ' ' . $time_text);

    $program_items = get_posts([
      'post_type'      => 'program_item',
      'posts_per_page' => -1,
      'meta_query'     => [
        [
          'key'   => 'related_event',
          'value' => $related_event_id,
        ],
      ],
      'meta_key'       => 'start_time',
      'orderby'        => 'meta_value',
      'order'          => 'ASC',
    ]);

    $sessions = [];
    foreach ($program_items as $program_item) {
      $start_time = $normalize_text(get_field('start_time', $program_item->ID));
      $program_type = (string) get_field('program_type', $program_item->ID);
      $panel_title = $normalize_text(get_field('panel_title', $program_item->ID));
      $speaker_name = $normalize_name(get_field('speaker_name', $program_item->ID));
      $speaker_title = $normalize_text(get_field('speaker_title', $program_item->ID));
      $speaker_affiliation = $normalize_text(get_field('speaker_affiliation', $program_item->ID));
      $moderator_names = (string) get_field('panel_moderator', $program_item->ID);
      $moderator_affiliation = (string) get_field('panel_moderator_affiliation', $program_item->ID);
      $panelist_names = (string) get_field('panel_panelists', $program_item->ID);
      $panelist_affiliation = (string) get_field('panel_panelist_affils', $program_item->ID);
      $discussant_names = (string) get_field('panel_discussants', $program_item->ID);
      $discussant_affiliation = (string) get_field('panel_discussant_affils', $program_item->ID);
      $youtube = get_field('youtube_url', $program_item->ID);
      $pdf = get_field('presentation_pdf', $program_item->ID);
      $resolved_title = ($program_type === 'panel' && $panel_title !== '') ? $panel_title : $normalize_text(get_the_title($program_item->ID));
      $presenter = $speaker_name !== '' ? $speaker_name : '';
      $presenter_title = $speaker_title;
      $presenter_affiliation = $speaker_affiliation;
      if ($presenter === '' && $moderator_names !== '') {
        $presenter = $normalize_name(explode("\n", $moderator_names)[0]);
      }
      if ($presenter_affiliation === '' && $moderator_affiliation !== '') {
        $presenter_affiliation = $normalize_text(explode("\n", $moderator_affiliation)[0]);
      }

      if (empty($youtube) && empty($pdf)) {
        continue;
      }

      $sessions[] = [
        'type'      => $program_type === 'panel' ? 'panel' : 'presentation',
        'time'      => $start_time,
        'title'     => $resolved_title,
        'presenter' => $presenter,
        'presenter_title' => $presenter_title,
        'presenter_affiliation' => $presenter_affiliation,
        'moderators' => $parse_people_with_affils($moderator_names, $moderator_affiliation),
        'panelists' => $parse_people_with_affils($panelist_names, $panelist_affiliation),
        'discussants' => $parse_people_with_affils($discussant_names, $discussant_affiliation),
        'video_url' => !empty($youtube) ? esc_url_raw($youtube) : '',
        'pdf_url'   => !empty($pdf) ? esc_url_raw($pdf) : '',
      ];
    }
    $event_report['sessions'] = $sessions;
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

              <?php
              // Get adjacent news posts ordered by news_date
              $prev_post = get_adjacent_news_by_date('previous');
              $next_post = get_adjacent_news_by_date('next');

              if ($prev_post || $next_post):
              ?>
              <nav class="news-navigation">
                <div class="news-nav-next">
                  <?php if ($next_post):
                    $next_title = mb_strimwidth($next_post->post_title, 0, 40, '…');
                  ?>
                    <a href="<?php echo get_permalink($next_post); ?>">
                      <span class="nav-arrow">←</span>
                      <span class="nav-label"><?php echo esc_html($next_title); ?></span>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="news-nav-prev">
                  <?php if ($prev_post):
                    $prev_title = mb_strimwidth($prev_post->post_title, 0, 40, '…');
                  ?>
                    <a href="<?php echo get_permalink($prev_post); ?>">
                      <span class="nav-label"><?php echo esc_html($prev_title); ?></span>
                      <span class="nav-arrow">→</span>
                    </a>
                  <?php endif; ?>
                </div>
              </nav>
              <?php endif; ?>

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

                <?php if ($news_kicker !== ''): ?>
                  <p class="news-kicker"><?php echo esc_html($news_kicker); ?></p>
                <?php endif; ?>

                <h2 class="news-title"><?php the_title(); ?></h2>

                <div class="news-content content-block">
                  <?php echo $content; ?>
                </div>

                <?php if (has_post_thumbnail()): ?>
                  <div class="news-image">
                    <?php the_post_thumbnail('large'); ?>
                  </div>
                <?php endif; ?>

                <?php if ($has_event_report): ?>
                  <section class="news-event-report">
                    <div class="news-event-report__box">
                      <div class="news-event-report__section news-event-report__section--summary">
                        <?php if (!empty($event_report['datetime'])): ?>
                          <div class="news-event-report__row">
                            <div class="news-event-report__label">日時</div>
                            <div class="news-event-report__value"><?php echo esc_html($event_report['datetime']); ?></div>
                          </div>
                        <?php endif; ?>

                        <?php if (!empty($event_report['venue'])): ?>
                          <div class="news-event-report__row">
                            <div class="news-event-report__label">会場</div>
                            <div class="news-event-report__value"><?php echo nl2br(esc_html($event_report['venue'])); ?></div>
                          </div>
                        <?php endif; ?>

                        <?php if (!empty($event_report['organizer'])): ?>
                          <div class="news-event-report__row">
                            <div class="news-event-report__label">主催</div>
                            <div class="news-event-report__value"><?php echo nl2br(esc_html($event_report['organizer'])); ?></div>
                          </div>
                        <?php endif; ?>

                        <?php if (!empty($event_report['coorganizers'])): ?>
                          <div class="news-event-report__row">
                            <div class="news-event-report__label">共催</div>
                            <div class="news-event-report__value">
                              <ul class="news-event-report__list">
                                <?php foreach ($event_report['coorganizers'] as $cohost): ?>
                                  <li><?php echo esc_html($cohost); ?></li>
                                <?php endforeach; ?>
                              </ul>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>

                      <?php if (!empty($event_report['sessions'])): ?>
                        <div class="news-event-report__section news-event-report__section--program">
                          <h3 class="news-event-report__heading">プログラム</h3>
                          <ul class="news-event-program-list">
                            <?php foreach ($event_report['sessions'] as $session): ?>
                              <li class="news-event-program-item <?php echo $session['type'] === 'panel' ? 'is-panel' : 'is-presentation'; ?>">
                                <div class="news-event-program-item__head">
                                  <?php if (!empty($session['time'])): ?>
                                    <span class="news-event-program-item__time"><?php echo esc_html($session['time']); ?></span>
                                  <?php endif; ?>
                                  <article class="news-event-program-card">
                                    <div class="news-event-program-card__content">
                                      <?php if ($session['type'] === 'panel'): ?>
                                        <div class="news-event-program-item__kind">パネル討論</div>
                                      <?php endif; ?>
                                      <span class="news-event-program-item__title"><?php echo esc_html($session['title']); ?></span>

                                      <?php if ($session['type'] === 'panel'): ?>
                                        <div class="news-event-panel-roles">
                                          <?php if (!empty($session['moderators'])): ?>
                                            <div class="news-event-panel-role">
                                              <span class="news-event-panel-role__label">司会</span>
                                              <div class="news-event-panel-role__people">
                                                <?php foreach ($session['moderators'] as $person): ?>
                                                  <div class="news-event-panel-role__person">
                                                    <div class="news-event-panel-role__name"><?php echo esc_html($person['name']); ?></div>
                                                    <?php if (!empty($person['affiliation'])): ?>
                                                      <div class="news-event-panel-role__affiliation"><?php echo esc_html($person['affiliation']); ?></div>
                                                    <?php endif; ?>
                                                  </div>
                                                <?php endforeach; ?>
                                              </div>
                                            </div>
                                          <?php endif; ?>

                                          <?php if (!empty($session['panelists'])): ?>
                                            <div class="news-event-panel-role">
                                              <span class="news-event-panel-role__label">パネリスト</span>
                                              <div class="news-event-panel-role__people">
                                                <?php foreach ($session['panelists'] as $person): ?>
                                                  <div class="news-event-panel-role__person">
                                                    <div class="news-event-panel-role__name"><?php echo esc_html($person['name']); ?></div>
                                                    <?php if (!empty($person['affiliation'])): ?>
                                                      <div class="news-event-panel-role__affiliation"><?php echo esc_html($person['affiliation']); ?></div>
                                                    <?php endif; ?>
                                                  </div>
                                                <?php endforeach; ?>
                                              </div>
                                            </div>
                                          <?php endif; ?>

                                          <?php if (!empty($session['discussants'])): ?>
                                            <div class="news-event-panel-role">
                                              <span class="news-event-panel-role__label">指定討論者</span>
                                              <div class="news-event-panel-role__people">
                                                <?php foreach ($session['discussants'] as $person): ?>
                                                  <div class="news-event-panel-role__person">
                                                    <div class="news-event-panel-role__name"><?php echo esc_html($person['name']); ?></div>
                                                    <?php if (!empty($person['affiliation'])): ?>
                                                      <div class="news-event-panel-role__affiliation"><?php echo esc_html($person['affiliation']); ?></div>
                                                    <?php endif; ?>
                                                  </div>
                                                <?php endforeach; ?>
                                              </div>
                                            </div>
                                          <?php endif; ?>
                                        </div>
                                      <?php else: ?>
                                        <?php if (!empty($session['presenter'])): ?>
                                          <div class="news-event-program-item__presenter"><?php echo esc_html($session['presenter']); ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($session['presenter_title'])): ?>
                                          <div class="news-event-program-item__presenter-meta"><?php echo esc_html($session['presenter_title']); ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($session['presenter_affiliation'])): ?>
                                          <div class="news-event-program-item__presenter-meta"><?php echo esc_html($session['presenter_affiliation']); ?></div>
                                        <?php endif; ?>
                                      <?php endif; ?>

                                      <div class="news-event-program-item__links">
                                        <?php if (!empty($session['video_url'])): ?>
                                          <a class="news-program-link news-program-link--video" href="<?php echo esc_url($session['video_url']); ?>" target="_blank" rel="noopener">
                                            <span class="icon icon-youtube"></span>
                                            動画を見る
                                          </a>
                                        <?php endif; ?>
                                        <?php if (!empty($session['pdf_url'])): ?>
                                          <a class="news-program-link news-program-link--pdf" href="<?php echo esc_url($session['pdf_url']); ?>" target="_blank" rel="noopener">
                                            <span class="icon icon-pdf"></span>
                                            資料を見る
                                          </a>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                  </article>
                                </div>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      <?php endif; ?>
                    </div>
                  </section>
                <?php endif; ?>
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
