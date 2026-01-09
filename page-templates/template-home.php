<?php
/**
 * Template Name: Template-Home
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
  'symposiums'   => 'シンポジウム',
  'workshops'    => 'ワークショップ',
  'lectures'     => '講演',
  'conferences'  => 'カンファレンス',
  'publications' => '出版物',
  'media'        => 'メディア掲載',
  'awards'       => '受賞',
  'projects'     => 'プロジェクト',
  'contests'     => 'コンテスト',
  'news'         => 'ニュース'
];

// ✅ SAFELY ASSIGN THIS BEFORE ANY JS
$logo_image_url = trim( get_template_directory_uri() . '/images/let_logo_letters.png' );

/**
 * Derive a short, tag-free teaser string.
 * Prefers $desc_field, else falls back to $body_field (HTML), then excerpt/content.
 */
function let_teaser_from_fields( $desc_field, $body_field, $fallback_len = 40 ) {
  $raw = '';
  if ( !empty($desc_field) ) {
    $raw = $desc_field;
  } elseif ( !empty($body_field) ) {
    $raw = $body_field; // ACF WYSIWYG may include HTML
  } else {
    $raw = get_the_excerpt() ?: get_the_content('');
  }
  $text = wp_strip_all_tags( $raw );
  return wp_html_excerpt( $text, $fallback_len, '…' );
}
?>

<script>
  window.logoImageUrl = "<?php echo esc_js($logo_image_url); ?>";
</script>

<section class="home-hero-section">
  <div class="hero-inner">
    <!-- Left: Logo -->
    <div class="hero-logo">
      <!-- (SVG omitted here for brevity — keep your existing SVG exactly as-is) -->
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
    <div class="hero-content">
      <h1 class="hero-title">
        エビデンスに基づく<br>確かな教育を求めて
      </h1>
      <p class="hero-description">
        <strong>LET（Learning and Educational Technologies Research Unit／緒方研究室）</strong>では、デジタル教科書やラーニングダッシュボード、学校向けのプラットフォームなどのツールを開発しています。<br>
      </p>

      <div class="hero-buttons">
        <a data-anim-trigger-self data-anim="fade-in" href="/about" class="btn btn--cta">
          <span>LETについてもっと知る</span>
        </a>
        <a data-anim-trigger-self data-anim="fade-in" href="/research" class="btn btn--cta">
          <span>研究を見る</span>
        </a>
      </div>
    </div>
  </div>

  <div class="updates-carousel-wrapper">
    <div class="updates-carousel-inner"> 
      <!-- Arrows -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

      <div class="swiper updates-carousel">
        <div class="swiper-wrapper">
        <?php
          $args = [
            'post_type'      => ['news_jp', 'event_jp'],
            'posts_per_page' => 10,
            'meta_key'       => 'update_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
          ];

          $updates_query = new WP_Query($args);

          if ($updates_query->have_posts()) :
            while ($updates_query->have_posts()) : $updates_query->the_post();
              $post_type = get_post_type();

              $update_date = get_field('update_date');
              $formatted_date = '日付未定';
              if ($update_date) {
                $date_obj = DateTime::createFromFormat('Ymd', $update_date);
                if ($date_obj) {
                  $formatted_date = $date_obj->format('Y/m/d');
                }
              }

              $tag_value = '';
              $tag_label = '';
              $teaser    = '';

              if ($post_type === 'news_jp') {
                $cat_val   = get_field('news_category'); // e.g. 'symposiums', 'news', etc.
                $tag_value = $cat_val ?: 'news';
                $tag_label = $category_labels[$tag_value] ?? 'ニュース';
              
                // Prefer native editor content; fallback to legacy ACF 'news_body'
                $body_source = get_post_field('post_content', get_the_ID());
                if (empty($body_source)) {
                  $body_source = get_field('news_body'); // legacy fallback
                }
              
                $teaser = let_teaser_from_fields(
                  '',                // no separate description field
                  $body_source,      // body (may contain HTML)
                  50                 // teaser length (adjust as you like)
                );
              

              } elseif ($post_type === 'event_jp') {
                // Use generic イベント label; class falls back to 'news' styling
                $tag_value = 'news';
                $tag_label = 'イベント';
                $teaser    = let_teaser_from_fields(
                  get_field('event_title'),
                  get_field('event_body'),
                  20
                );
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
                  <?php echo esc_html( mb_strimwidth( get_the_title(), 0, 60, '…' ) ); ?>
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
    <h3 class="section-title section-title--sub">ツール</h3>

    <p class="tools-intro">
      緒方研究室では、学習をより双方向的かつ適応的にし、教育の質を高めるための先進的なツールを開発しています。
    </p>

    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.svg" alt="BookRoll Logo">
      </div>
      <div class="tool-description">
        <p>
          BookRollは、双方向型の教材を配信・記録できるデジタルプラットフォームで、
          個別最適化されたデータ駆動型の学びを実現します。
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self="" data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/bookroll/" class="btn btn--cta">
          <span>Bookrollの詳細へ</span>
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
          LogPaletteは、学習者の教材とのやり取りを可視化するラーニングアナリティクスツールで、
          学習者と教育者の双方に気づきを提供します。
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self="" data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/logpalette/" class="btn btn--cta">
          <span>LogPaletteの詳細へ</span>
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
      <h3 class="section-title section-title--sub">ニュース</h3>
    </div>

    <div class="news-button-top">
      <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(get_post_type_archive_link('news_jp')); ?>" class="btn btn--cta">
        <span>ニュース一覧</span>
      </a>
    </div>

    <hr class="news-divider">

    <?php
      $news_query = new WP_Query([
        'post_type'      => ['news_jp', 'news_en'],
        'posts_per_page' => 5,
        'meta_key'       => 'news_date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
      ]);

      // (maps already defined above)

      if ($news_query->have_posts()) :
        while ($news_query->have_posts()) : $news_query->the_post();
          $news_date_raw = get_field('news_date');
          $news_date     = DateTime::createFromFormat('Ymd', $news_date_raw);

          $category_value = get_field('news_category');
          $category_label = $category_labels[$category_value] ?? 'ニュース';
          $tag_class      = $category_classes[$category_value] ?? 'tag-news';

          // 👇 Use same fallback logic: prefer description, else derive from body/excerpt
          $body_source = get_post_field('post_content', get_the_ID());
          if (empty($body_source)) {
            $body_source = get_field('news_body'); // legacy fallback
          }
          $teaser = let_teaser_from_fields('', $body_source, 50);

    ?>
      <div class="news-item">
        <div class="news-date-tag-combo">
          <div class="news-date"><?php echo $news_date ? esc_html($news_date->format('Y年n月j日')) : ''; ?></div>
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
      <p>まだニュースがありません。</p>
    <?php endif; ?>
  </div>

  <div class="news-button-bottom">
    <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(get_post_type_archive_link('news_jp')); ?>" class="btn btn--cta">
      <span>ニュース一覧</span>
    </a>
  </div>
</section>

<section class="research-teaser-section section-spacing">
  <div class="container">
    <div class="row align-items-start">
      <!-- Left: Text + Desktop Button -->
      <div class="col-md-5">
        <h2 class="section-title">Research</h2>
        <h3 class="section-title section-title--sub">研究</h3>
        <p class="research-description">
          LET研究室では、学習ログの可視化やAIを活用した学習支援などを通じて、
          一人ひとりに最適化された学びの実現に取り組んでいます。<br>
          現場との連携を通して開発したツールや実践事例の一部をご紹介します。
        </p>
        <div class="research-button-top mt-4">
          <a href="research/" class="btn btn--cta">
            <span>研究ページを見る</span>
          </a>
        </div>
      </div>

      <!-- Right: Image Grid -->
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

    <!-- Mobile-only Button -->
    <div class="research-button-bottom mt-4">
      <a href="research/" class="btn btn--cta">
        <span>研究ページを見る</span>
      </a>
    </div>
  </div>
</section>

<section class="members-section section-spacing">
  <div class="container members-wrapper">
    <div class="members-content">
      <h2 class="section-title">Members</h2>
      <h3 class="section-title section-title--sub">メンバー</h3>
      <p class="members-description">
        私たちのメンバーは、世界中から集まった多様でフレンドリーな研究者・教育者・イノベーターの集まりです。
        教育技術の可能性を広げ、意義ある学習体験を生み出すために協働しています。
      </p>
      <div class="members-button-top mt-4">
        <a href="members/" class="btn btn--cta">
          <span>メンバー紹介を見る</span>
        </a>
      </div>
    </div>

    <div class="members-image">
      <div class="image-placeholder">
        <img src="<?php echo get_template_directory_uri(); ?>/images/members-image.jpg" alt="Mascot Robot">
      </div>
    </div>

    <!-- Mobile-only Button -->
    <div class="members-button-bottom">
      <a href="members/" class="btn btn--cta">
        <span>メンバー紹介を見る</span>
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
      <h2 class="cta-title">一緒に学びを進化させませんか？</h2>
      <p class="cta-text">
        緒方研究室では、新しい教育のかたちを共に探究する仲間を募集しています。<br>
        大学院進学に関心のある方、研究室を訪問してみたい方、まずはぜひお気軽にご連絡ください。
      </p>

      <div class="cta-buttons">
        <a href="mailto:info@let.media.kyoto-u.ac.jp" class="btn btn--cta">
          <span>メールで連絡する</span>
        </a>
        <a href="/join-us/" class="btn btn--cta">
          <span>詳しく見る</span>
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
    setTimeout(() => { if (!animationStarted) logo.classList.add('no-anim'); }, 1000);
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
