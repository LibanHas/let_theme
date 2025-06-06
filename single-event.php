<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
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

              $weekday_map = [
                'Sun' => '日', 'Mon' => '月', 'Tue' => '火',
                'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土'
              ];

              $formatted_dates = ''; // stacked full dates

              if ($date_mode === 'single' && $start_date) {
                $ts = strtotime(str_replace('/', '-', $start_date));
                $weekday = $weekday_map[date_i18n('D', $ts)] ?? '';
                $formatted_dates = '<div>' . date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）</div>';
              } elseif ($date_mode === 'range' && $start_date && $end_date) {
                foreach ([$start_date, $end_date] as $date) {
                  $ts = strtotime($date);
                  $weekday = $weekday_map[date_i18n('D', $ts)] ?? '';
                  $formatted_dates .= '<div>' . date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）</div>';
                }
              } elseif ($date_mode === 'multiple' && $start_date && $second_date) {
                foreach ([$start_date, $second_date] as $date) {
                  $ts = strtotime(str_replace('/', '-', $date));

                  $weekday = $weekday_map[date_i18n('D', $ts)] ?? '';
                  $formatted_dates .= '<div>' . date_i18n('Y年n月j日', $ts) . '（' . $weekday . '）</div>';
                }
              }

              $format_labels = [
                'online' => 'オンライン',
                'in_person' => '対面',
                'hybrid' => 'ハイブリッド'
              ];

              $start = !empty($start_time) ? date_i18n('H:i', strtotime($start_time)) : '';
              $end = !empty($end_time) ? date_i18n('H:i', strtotime($end_time)) : '';
            ?>

            <section class="section-spacing">
              <div class="container">
                <!-- Hero -->
                <div class="events-header">
                  <h1 class="page-title">Events</h1>
                  <h2 class="page-subtitle">イベント</h2>
                </div>

                <!-- Title -->
                <h2 class="event-title"><?php the_title(); ?></h2>

                <!-- Meta Info with Icons -->
                <div class="event-meta-grid">
                  <?php if ($formatted_dates): ?>
                    <div class="event-meta-item">
                      <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/calendar-days-solid.png" alt="Calendar Icon" />
                      </span>
                      <div class="event-meta-text">
                        <?php echo $formatted_dates; ?>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if ($start && $end): ?>
                    <div class="event-meta-item">
                      <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Vector.png" alt="Clock" />
                      </span>
                      <span class="event-meta-text"><?php echo esc_html($start); ?> – <?php echo esc_html($end); ?></span>
                    </div>
                  <?php endif; ?>

                  <?php if ($format): ?>
                    <div class="event-meta-item">
                      <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/location-dot-solid.png" alt="Location Icon" />
                      </span>
                      <span class="event-meta-text"><?php echo esc_html($format_labels[$format] ?? $format); ?></span>
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
