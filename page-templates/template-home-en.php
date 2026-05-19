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
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150.43 150.45" width="150" height="150">
        <defs>
          <style>
            .cls-1 { fill: #cfdb00; stroke: #cfdb00; }
            .cls-1, .cls-2 { stroke-miterlimit: 10; }
            .cls-3 { fill: #71b230; }
            .cls-2 { fill: #fff; stroke: #fff; }
            .cls-4 { fill: #8ec31f; }
          </style>
        </defs>
        <g id="Layer_4" data-name="Layer 4">
          <path d="M.92,82.59c.04.36.09.72.13,1.09l.07.02c-.04-.36-.1-.72-.14-1.09l-.06-.02Z"></path>
          <path class="cls-4" d="M75.3.29C34.04.29.59,33.73.59,74.99c0,2.57.13,5.12.38,7.62l23.8,7.34,25.1-17.96,25.42,2.99,25.16-18.21,25.64-5.11,15.17-11.48c.16.3.31.6.46.9l-15.22,11.52-25.65,5.12-25.29,18.32-.19-.02-25.23-2.97-25.19,18.02-23.84-7.36c4.32,37.15,35.87,66,74.18,66,41.26,0,74.71-33.45,74.71-74.7S116.55.29,75.3.29Z"></path>
        </g>
        <g id="Layer_5" data-name="Layer 5">
          <path class="cls-3" d="M142.2,41.68l-15.22,11.52-25.65,5.12-25.29,18.32-.19-.02-25.23-2.97-25.19,18.02-23.9-7.38c4.24,37.24,35.83,66.17,74.21,66.17,41.26,0,74.71-33.45,74.71-74.71,0-12.27-2.98-23.85-8.22-34.06Z"></path>
        </g>
        <g id="network">
          <path class="cls-1" d="M52.54,73.07c-.19,1.58-1.62,2.71-3.2,2.53s-2.71-1.62-2.53-3.2,1.62-2.71,3.2-2.53,2.71,1.62,2.53,3.2ZM75.04,72.56c-1.58-.19-3.01.95-3.2,2.53s.95,3.01,2.53,3.2,3.01-.95,3.2-2.53-.95-3.01-2.53-3.2ZM99.86,54.68c-1.58-.19-3.01.95-3.2,2.53s.95,3.01,2.53,3.2,3.01-.95,3.2-2.53-.95-3.01-2.53-3.2ZM125.1,49.67c-1.58-.19-3.01.95-3.2,2.53s.95,3.01,2.53,3.2,3.01-.95,3.2-2.53-.95-3.01-2.53-3.2ZM25.27,87.24c-1.58-.19-3.01.95-3.2,2.53s.95,3.01,2.53,3.2,3.01-.95,3.2-2.53-.95-3.01-2.53-3.2ZM1.51,84.8l20.08,6.32.99-3.28-21.28-7.13.21,4.09ZM27.8,90.44l21.07-15.93-1.31-2.53-21.3,16.1,1.55,2.37ZM52.38,73.73l20.13,2.42.31-2.92-20.44-2.25v2.74ZM77.56,75.76l20.85-15.89-1.76-2.66-20.47,15.75,1.37,2.8ZM102.39,57.88l20.95-4.02-.56-2.82-21.35,3.89.97,2.94ZM127.61,52.06l13.97-10.94-1.25-1.9-14.12,10.81,1.41,2.03Z"></path>
          <ellipse class="cls-1" cx="47.91" cy="73.84" rx=".91" ry=".96"></ellipse>
        </g>
        <g id="letters">
          <polygon class="cls-2" points="33.54 52.1 44.66 52.1 44.66 95.04 80.42 95.04 80.42 106.16 33.54 106.16 33.54 52.1"></polygon>
          <polygon class="cls-2" points="56.46 27.33 89.54 27.33 89.54 38.17 67.58 38.17 67.72 52.1 89.54 52.1 89.54 62.38 67.3 62.38 67.3 80.4 89.54 80.4 89.54 91.24 56.46 91.24 56.46 27.33"></polygon>
          <polygon class="cls-2" points="90.46 65.46 124.46 65.46 124.46 76.34 113.33 76.34 112.91 121.35 103.06 121.35 102.95 76.27 90.63 76.23 90.46 65.46"></polygon>
          <rect class="cls-2" x="32.06" y="108.48" width="3.94" height="12.87"></rect>
          <rect class="cls-2" x="68.1" y="108.48" width="4.9" height="12.87"></rect>
          <rect class="cls-2" x="93.54" y="57.55" width="16.97" height="3.85"></rect>
          <polygon class="cls-2" points="117.5 41.82 121.91 44.64 114.73 59.28 110.51 55.8 117.5 41.82"></polygon>
        </g>
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
        <a data-anim-trigger-self data-anim="fade-in" href="/en/about" class="btn btn--accent btn--overlay">
          <span>Learn more about LET</span>
        </a>
        <a data-anim-trigger-self data-anim="fade-in" href="/en/research" class="btn btn--accent btn--overlay">
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
          // Try to get cached carousel data
          $cache_key = 'home_carousel_posts_en';
          $sorted_posts = get_transient($cache_key);

          if (false === $sorted_posts) {
            // Cache miss - fetch and process posts
            $args = [
              'post_type'      => ['news_en', 'event_en'],
              'posts_per_page' => 100, // Fetch enough posts to ensure proper sorting after filtering
              'orderby'        => 'date',
              'order'          => 'DESC',
              'no_found_rows'  => true, // Skip pagination count for performance
              'update_post_meta_cache' => false, // Skip meta cache for initial load
            ];

            $updates_query = new WP_Query($args);

            // Collect posts with their sort dates
            $sorted_posts = [];
            if ($updates_query->have_posts()) :
              // Get all post IDs for bulk ACF loading
              $post_ids = wp_list_pluck($updates_query->posts, 'ID');

              while ($updates_query->have_posts()) : $updates_query->the_post();
                $post_type = get_post_type();
                $sort_date = null;

                // Get the appropriate date field based on post type
                if ($post_type === 'news_en') {
                  $sort_date = get_field('update_date') ?: get_field('news_date');
                } elseif ($post_type === 'event_en') {
                  $sort_date = get_field('update_date') ?: get_field('event_date_start');
                }

                // Fallback to WordPress post date if no ACF date found
                if (!$sort_date) {
                  $sort_date = get_the_date('Ymd');
                }

                // Include all posts (now all should have dates)
                $sorted_posts[] = [
                  'post' => get_post(),
                  'sort_date' => $sort_date,
                  'post_type' => $post_type
                ];
              endwhile;
              wp_reset_postdata();
            endif;

            // Sort by date (newest first)
            usort($sorted_posts, function($a, $b) {
              return strcmp($b['sort_date'], $a['sort_date']);
            });

            // Limit to 10 posts
            $sorted_posts = array_slice($sorted_posts, 0, 10);

            // Cache for 15 minutes (900 seconds)
            set_transient($cache_key, $sorted_posts, 900);
          }

          // Now loop through sorted posts
          foreach ($sorted_posts as $item) :
            $post = $item['post'];
            setup_postdata($post);
            $post_type = $item['post_type'];
            $raw_date = $item['sort_date'];

            $formatted_date = 'TBD';
            if ($raw_date) {
              $date_obj = DateTime::createFromFormat('Ymd', $raw_date);
              if ($date_obj) {
                $formatted_date = $date_obj->format('Y/m/d');
              }
            }

            $tag_value = '';
            $tag_label = '';
            $teaser    = '';

            if ($post_type === 'news_en') {
              $cat_val   = get_field('news_category');
              $tag_value = $cat_val ?: 'news';
              $tag_label = $category_labels[$tag_value] ?? 'News';

              // Teaser from body (no separate description)
              $teaser = let_teaser_en(70);

            } elseif ($post_type === 'event_en') {
              // Get the actual event category
              $cat_val   = get_field('event_category');
              $tag_value = $cat_val ?: 'news';
              $tag_label = $category_labels[$tag_value] ?? 'Event';

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
          endforeach;
          wp_reset_postdata();
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
        <a data-anim-trigger-self="" data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/en/bookroll/" class="btn btn--accent btn--overlay">
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
        <a data-anim-trigger-self="" data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/en/logpalette/" class="btn btn--accent btn--overlay">
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
      <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(home_url('/en/news/')); ?>" class="btn btn--accent btn--overlay">
        <span>Browse News</span>
      </a>
    </div>

    <hr class="news-divider">

    <?php
    $news_query = new WP_Query([
      'post_type'      => ['news_en'],
      'posts_per_page' => 5,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);

    if ($news_query->have_posts()) :
      while ($news_query->have_posts()) : $news_query->the_post();
        $news_date_raw = get_field('update_date') ?: get_field('news_date') ?: get_the_date('Ymd');
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
    <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(get_post_type_archive_link('news_en')); ?>" class="btn btn--accent btn--overlay">
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
          <a href="/en/research" class="btn btn--accent btn--overlay">
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
      <a href="/en/research" class="btn btn--accent btn--overlay">
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
        <a href="/en/members" class="btn btn--accent btn--overlay">
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
      <a href="/en/members" class="btn btn--accent btn--overlay">
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
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSc3G_xoAp_1Q9LKaHFNzgeJojFMnLEYlFzbMSXiJOrLuN_njA/viewform" class="btn btn--accent btn--overlay" target="_blank" rel="noopener">
          <span>Inquiry Form</span>
        </a>
        <a href="/en/join-us" class="btn btn--accent btn--overlay">
          <span>Learn more</span>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const logo = document.querySelector('.hero-logo');
    if (!logo) return;
    let animationStarted = false;
    logo.addEventListener('animationstart', () => { animationStarted = true; });
    setTimeout(() => { if (!animationStarted) { logo.classList.add('no-anim'); } }, 1000);
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Use IntersectionObserver to only initialize Swiper when carousel is in viewport
    const carouselElement = document.querySelector('.updates-carousel');
    if (!carouselElement) return;

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          // Initialize Swiper only when visible
          new Swiper('.updates-carousel', {
            slidesPerView: 3,
            spaceBetween: 12,
            loop: true,
            centeredSlides: true,
            watchOverflow: true,
            lazy: true, // Enable lazy loading
            autoplay: {
              delay: 4000,
              disableOnInteraction: false,
              pauseOnMouseEnter: true // Pause on hover for better UX
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev'
            },
            breakpoints: {
              0:    { slidesPerView: 1, centeredSlides: true },
              768:  { slidesPerView: 2, centeredSlides: false },
              1280: { slidesPerView: 3, centeredSlides: false }
            }
          });
          // Stop observing after initialization
          observer.unobserve(carouselElement);
        }
      });
    }, { rootMargin: '50px' }); // Start loading 50px before entering viewport

    observer.observe(carouselElement);
  });
</script>

<?php get_footer(); ?>
