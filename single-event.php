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
              $date_raw = get_field('event_date');
              $start_time = get_field('event_start_time');
              $end_time = get_field('event_end_time');
              $format = get_field('event_format');
              $thumbnail = get_field('event_thumbnail');
              $body = get_field('event_body');

              $format_labels = [
                'online' => 'オンライン',
                'in_person' => '対面',
                'hybrid' => 'ハイブリッド'
              ];

              $formatted_date = !empty($date_raw) ? date_i18n('Y年n月j日', strtotime($date_raw)) : '';              $start = !empty($start_time) ? date_i18n('H:i', strtotime($start_time)) : '';
              $date_raw = get_field('event_date');

                $weekday_map = [
                'Sun' => '日', 'Mon' => '月', 'Tue' => '火',
                'Wed' => '水', 'Thu' => '木', 'Fri' => '金', 'Sat' => '土'
                ];

                if (!empty($date_raw)) {
                $date_obj = strtotime($date_raw);
                $weekday_en = date_i18n('D', $date_obj);
                $weekday_jp = $weekday_map[$weekday_en] ?? '';
                $formatted_date = date_i18n('Y年n月j日', $date_obj) . '（' . $weekday_jp . '）';
                } else {
                $formatted_date = '';
                }

              $end = !empty($end_time) ? date_i18n('H:i', strtotime($end_time)) : '';
            ?>

            <section class="section-spacing">
              <div class="container">
                <!-- Hero -->
                <div class="events-header">
                  <h1 class="section-title">Events</h1>
                  <h3 class="section-title section-title--sub">イベント</h3>
                </div>

                <!-- Title -->
                <h2 class="event-title"><?php the_title(); ?></h2>

                <!-- Meta Info with Icons -->
                <div class="event-meta-grid">
                  <?php if ($formatted_date): ?>
                    <div class="event-meta-item">
                    <span class="event-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/calendar-days-solid.png" alt="Calendar Icon" />
                    </span>
                      <span class="event-meta-text"><?php echo esc_html($formatted_date); ?></span>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/images/location-dot-solid.png" alt="Calendar Icon" />
                    </span>
                      <span class="event-meta-text"><?php echo esc_html($format_labels[$format] ?? $format); ?></span>
                    </div>
                  <?php endif; ?>
                </div>

                <!-- Description -->
                <div class="event-body content-block">
                  <?php echo wp_kses_post($body); ?>
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
