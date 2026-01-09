<?php
/**
 * Template Name: Template-Home-EN
 */
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );

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
  'symposiums'   => 'Symposium',
  'workshops'    => 'Workshop',
  'lectures'     => 'Lecture',
  'conferences'  => 'Conference',
  'publications' => 'Publication',
  'media'        => 'Media',
  'awards'       => 'Award',
  'projects'     => 'Project',
  'contests'     => 'Contest',
  'news'         => 'News'
];

// ✅ before any JS
$logo_image_url = trim( get_template_directory_uri() . '/images/let_logo_letters.png' );

/**
 * Build a short teaser from the native editor first; fall back to legacy ACF.
 * Returns plain text with HTML stripped.
 */
function let_teaser_en( $len = 80 ) {
  $raw = get_post_field('post_content', get_the_ID());  // native editor (Gutenberg/classic)
  if ( empty($raw) ) {
    $raw = get_field('news_body');                      // legacy ACF fallback
  }
  if ( empty($raw) ) {
    $raw = get_the_excerpt() ?: get_the_content('');
  }
  $text = wp_strip_all_tags($raw);
  return wp_html_excerpt($text, $len, '…');
}

?>

<script>
  window.logoImageUrl = "<?php echo esc_js($logo_image_url); ?>";
</script>

<section class="home-hero-section-en">
  <div class="hero-inner">
    <!-- Left: Logo -->
    <div class="hero-logo">
      <!-- keep your existing SVG exactly as-is -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150.43 150.45" width="150" height="150">
        <!-- … SVG content unchanged … -->
      </svg>
    </div>

    <!-- Right: Tagline and Intro Text -->
    <div class="hero-content-en">
      <h1 class="hero-title-en">
        Committed to evidence-based, <br />learner-centered education
      </h1>
      <p class="hero-description-en">
        At <strong>LET (Learning and Educational Technologies Research Unit / Ogata Lab)</strong>, we design and develop digital tools—such as interactive reading systems, learning dashboards, and school platforms—to support evidence-based, learner-centered education. Our mission is to make the learning process more visible, personalized, and effective through data and technology.
      </p>

      <div class="hero-buttons">
        <a data-anim-trigger-self data-anim="fade-in" href="/en/about" class="btn btn--cta">
          <span>Learn more about LET</span>
        </a>
        <a data-anim-trigger-self data-anim="fade-in" href="/en/research" class="btn btn--cta">
          <span>Explore our research</span>
        </a>
      </div>
    </div>
  </div>

  <div class="updates-carousel-wrapper">
    <div class="updates-carousel-inner">
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

      <div class="swiper updates-carousel">
        <div class="swiper-wrapper">
          <?php
          $args = [
            'post_type'      => ['news_en', 'event_en'],
            'posts_per_page' => 10,
            'meta_key'       => 'update_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
          ];

          $updates_query = new WP_Query($args);

          if ($updates_query->have_posts()) :
            while ($updates_query->have_posts()) : $updates_query->the_post();
              $post_type     = get_post_type();
              $update_date   = get_field('update_date');
              $formatted_date = 'TBD';
              if ($update_date) {
                $date_obj = DateTime::createFromFormat('Ymd', $update_date);
                if ($date_obj) {
                  $formatted_date = $date_obj->format('Y/m/d');
                }
              }

              $tag_value = '';
              $tag_label = '';
              $teaser    = '';

              if ($post_type === 'news_en') {
                $cat_val   = get_field('news_category'); // slug like 'symposiums', 'news', etc.
                $tag_value = $cat_val ?: 'news';
                $tag_label = $category_labels[$tag_value] ?? 'News';

                // Teaser from body (no separate description)
                $teaser = let_teaser_en(70);

              } elseif ($post_type === 'event_en') {
                $tag_value = 'news'; // styling fallback
                $tag_label = 'Event';
                
                $raw = get_field('event_body');
                if ( empty($raw) ) {
                  $raw = get_the_content('') ?: ( get_field('event_title') ?: get_the_title() );
                }
                $teaser = wp_html_excerpt( wp_strip_all_tags($raw), 70, '…' );                
              }

              $tag_class = $category_classes[$tag_value] ?? 'tag-news';
          ?>
            <div class="swiper-slide">
              <a href="<?php the_permalink(); ?>" class="update-card-link">
                <div class="update-card">
                  <div class="update-date">
                    <?php echo esc_html($formatted_date); ?>
                    <span class="tag <?php echo esc_attr($tag_class); ?>">
                      <?php echo esc_html($tag_label); ?>
                    </span>
                  </div>
                  <h3 class="update-title">
                    <?php echo esc_html( mb_strimwidth( get_the_title(), 0, 70, '…' ) ); ?>
                  </h3>
                  <p class="update-text">
                    <?php echo esc_html( $teaser ); ?>
                  </p>
                </div>
              </a>
            </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>

    <div class="pagination-and-scroll">
      <div class="swiper-pagination"></div>
      <a href="#tools" class="scroll-indicator">
        <img src="<?php echo get_template_directory_uri(); ?>/images/scroll_down.svg" alt="Scroll Down">
      </a>
    </div>
  </div>
</section>

<section id="tools" class="our-tools-section section-spacing">
  <div class="container">
    <h2 class="section-title">Our Tools</h2>

    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.svg" alt="BookRoll Logo">
      </div>
      <div class="tool-description">
        <p>
          BookRoll is a digital platform for delivering and recording interactive learning materials, enabling data-driven, personalized learning.
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self="" data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/en/bookroll/" class="btn btn--cta">
          <span>Learn more about BookRoll</span>
        </a>
      </div>
    </div>

    <hr class="tool-divider">

    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logpalette-icon.png" alt="LogPalette Logo">
      </div>
      <div class="tool-description">
        <p>
          LogPalette is a learning analytics tool that visualizes how learners interact with educational materials, providing insights for both learners and educators.
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self="" data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/en/logpalette/" class="btn btn--cta">
          <span>Learn more about LogPalette</span>
        </a>
      </div>
    </div>
    <hr class="tool-divider">
  </div>
</section>

<section class="news-section section-spacing">
  <div class="container">
    <div class="news-header">
      <h2 class="section-title">News</h2>
    </div>

    <div class="news-button-top">
      <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(home_url('/en/news/')); ?>" class="btn btn--cta">
        <span>Browse News</span>
      </a>
    </div>

    <hr class="news-divider">

    <?php
    $news_query = new WP_Query([
      'post_type'      => ['news_en'],
      'posts_per_page' => 5,
      'meta_key'       => 'news_date',
      'orderby'        => 'meta_value',
      'order'          => 'DESC',
    ]);

    if ($news_query->have_posts()) :
      while ($news_query->have_posts()) : $news_query->the_post();
        $news_date_raw = get_field('news_date');
        $news_date     = DateTime::createFromFormat('Ymd', $news_date_raw);

        $category_value = get_field('news_category');
        $category_label = $category_labels[$category_value] ?? 'News';
        $tag_class      = $category_classes[$category_value] ?? 'tag-news';

        // Teaser from news_body (no description field)
        $teaser = let_teaser_en(80);

    ?>
      <div class="news-item">
        <div class="news-date-tag-combo">
          <div class="news-date"><?php echo $news_date ? esc_html($news_date->format('Y/m/d')) : ''; ?></div>
          <div class="news-tag <?php echo esc_attr($tag_class); ?>"><?php echo esc_html($category_label); ?></div>
        </div>
        <div class="news-summary">
          <p><a href="<?php the_permalink(); ?>"><?php echo esc_html( $teaser ); ?></a></p>
        </div>
      </div>

      <hr class="news-divider">
    <?php
      endwhile;
      wp_reset_postdata();
    else :
    ?>
      <p>No news available yet.</p>
    <?php endif; ?>
  </div>

  <div class="news-button-bottom">
    <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(get_post_type_archive_link('news_en')); ?>" class="btn btn--cta">
      <span>Browse News</span>
    </a>
  </div>
</section>

<section class="research-teaser-section section-spacing">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-md-5">
        <h2 class="section-title">Research</h2>
        <p class="research-description">
          At the LET Lab, we work to realize personalized learning tailored to each individual by visualizing learning logs and leveraging AI-based learning support.<br />
          Here, we introduce some of the tools and practical use cases we’ve developed in collaboration with schools and educators.
        </p>
        <div class="research-button-top mt-4">
          <a href="/en/research" class="btn btn--cta">
            <span>Explore our research</span>
          </a>
        </div>
      </div>

      <div class="col-md-7">
        <div class="row g-3">
          <div class="col-6 d-flex mb-5">
            <img src="<?php echo get_template_directory_uri(); ?>/images/network.png" alt="Project 1" class="img-fluid rounded-3 shadow-sm">
          </div>
          <div class="col-6 d-flex mb-5">
            <img src="<?php echo get_template_directory_uri(); ?>/images/post-it.png" alt="Project 2" class="img-fluid rounded-3 shadow-sm">
          </div>
          <div class="col-6 d-flex mb-5">
            <img src="<?php echo get_template_directory_uri(); ?>/images/lms.png" alt="Project 3" class="img-fluid rounded-3 shadow-sm">
          </div>
          <div class="col-6 d-flex mb-5">
            <img src="<?php echo get_template_directory_uri(); ?>/images/classroom.jpg" alt="Project 4" class="img-fluid rounded-3 shadow-sm">
          </div>
        </div>
      </div>
    </div>

    <div class="research-button-bottom mt-4">
      <a href="/en/research" class="btn btn--cta">
        <span>Explore our research</span>
      </a>
    </div>
  </div>
</section>

<section class="members-section section-spacing">
  <div class="container members-wrapper">
    <div class="members-content">
      <h2 class="section-title">Members</h2>
      <p class="members-description">
        Our members are a diverse and friendly group of researchers, educators, and innovators from around the world.
        We work together to expand the possibilities of educational technology and create meaningful learning experiences.
      </p>
      <div class="members-button-top mt-4">
        <a href="/en/members" class="btn btn--cta">
          <span>See Member Profiles</span>
        </a>
      </div>
    </div>

    <div class="members-image">
      <div class="image-placeholder">
        <img src="<?php echo get_template_directory_uri(); ?>/images/members-image.jpg" alt="Mascot Robot">
      </div>
    </div>

    <div class="members-button-bottom">
      <a href="/en/members" class="btn btn--cta">
        <span>See Member Profiles</span>
      </a>
    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container cta-wrapper">
    <div class="cta-image">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logpalette-mascot.png" alt="Mascot Robot">
    </div>

    <div class="cta-content">
      <h2 class="cta-title">Join us in transforming learning.</h2>
      <p class="cta-text">
        The Ogata Lab is looking for new members to explore the future of education together.
        If you're interested in pursuing graduate studies or would like to visit the lab, feel free to get in touch with us.
      </p>

      <div class="cta-buttons">
        <a href="mailto:info@let.media.kyoto-u.ac.jp" class="btn btn--cta">
          <span>Send us an email</span>
        </a>
        <a href="/en/join-us" class="btn btn--cta">
          <span>Learn more</span>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const logo = document.querySelector('.fade-in-logo');
    if (!logo) return;
    let animationStarted = false;
    logo.addEventListener('animationstart', () => { animationStarted = true; });
    setTimeout(() => { if (!animationStarted) { logo.classList.add('no-anim'); } }, 1000);
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper('.updates-carousel', {
      slidesPerView: 3,
      spaceBetween: 12,
      loop: true,
      centeredSlides: true,
      watchOverflow: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: {
        0:    { slidesPerView: 1, centeredSlides: true },
        768:  { slidesPerView: 2, centeredSlides: false },
        1280: { slidesPerView: 3, centeredSlides: false }
      }
    });
  });
</script>

<?php get_footer(); ?>
