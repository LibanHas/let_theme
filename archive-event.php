<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper events-archive">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
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
                'meta_key' => 'event_date',
                'order' => 'DESC',
              ]);

              if ($events_query->have_posts()) :
                while ($events_query->have_posts()) : $events_query->the_post();
                  $date_raw = get_field('event_date');
                  $format = get_field('event_format');
                  $start = get_field('event_start_time');
                  $end = get_field('event_end_time');

                  $formatted_date = $date_raw ? date_i18n('Y/m/d', strtotime($date_raw)) : '';

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
                <div class="event-date"><?php echo esc_html($formatted_date); ?></div>
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

              <?php endwhile; ?>

              <hr class="event-divider" />
              <div class="pagination text-center mt-4">
                <?php echo paginate_links(); ?>
              </div>

              <?php else: ?>
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
