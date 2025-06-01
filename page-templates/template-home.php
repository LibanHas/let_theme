<?php
/**
 * Template Name: Template-Home
 */
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );


// ✅ SAFELY ASSIGN THIS BEFORE ANY JS
$logo_image_url = trim( get_template_directory_uri() . '/images/let_logo_letters.png' );
?>

<script>
  window.logoImageUrl = "<?php echo esc_js($logo_image_url); ?>";
</script>







<section class="hero-section">
  <div class="hero-inner">
    <!-- Left: Logo -->
    <div class="hero-logo">
      <img 
        src="<?php echo get_template_directory_uri(); ?>/images/let_logo.svg"
        alt="LET Lab Logo"
        class="hero-logo-img fade-in-logo"
      />
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
</section>

<div class="updates-carousel-wrapper">
  <!-- Arrows -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <div class="swiper updates-carousel">
    <div class="swiper-wrapper">
    <?php
$args = [
  'post_type' => ['news', 'event'],
  'posts_per_page' => 10,
  'orderby' => 'date',
  'order' => 'DESC',
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
    $description = '';

    if ($post_type === 'news') {
      $category_field = get_field_object('news_category');
      $tag_value = $category_field['value'] ?? 'news';
      $tag_label = $category_field['choices'][$tag_value] ?? 'ニュース';
      $description = get_field('news_description') ?: '';
    } elseif ($post_type === 'event') {
      $tag_value = 'event';
      $tag_label = 'イベント';
      $description = get_field('event_title') ?: get_the_title();
    }

    $tag_class = 'tag-' . esc_attr($tag_value);
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
        <h3 class="update-title"><?php the_title(); ?></h3>
        <p class="update-text">
          <?php echo esc_html(mb_strimwidth($description, 0, 70, '...')); ?>
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

  <div class="swiper-pagination"></div>
</div>
<a href="#tools" class="scroll-indicator">
  <img src="<?php echo get_template_directory_uri(); ?>/images/scroll_down.svg" alt="Scroll Down">
</a>



<section  id="tools" class="our-tools-section section-spacing">
  <div class="container">
  <h2 class="section-title">Our Tools</h2>
  <h3 class="section-title section-title--sub">ツール</h3>


    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.png" alt="BookRoll Logo">
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
      <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="btn btn--cta">
        <span>ニュース一覧</span>
      </a>
    </div>

    <hr class="news-divider">

    <?php
$news_query = new WP_Query([
  'post_type' => 'news',
  'posts_per_page' => 5,
  'meta_key' => 'news_date',
  'orderby' => 'meta_value',
  'order' => 'DESC',
]);

if ($news_query->have_posts()) :
  while ($news_query->have_posts()) : $news_query->the_post();
    $news_date_raw = get_field('news_date'); // returns YYYYMMDD format
    $news_date = DateTime::createFromFormat('Ymd', $news_date_raw);
    $news_category_value = get_field('news_category'); // e.g. 'event'
    $news_category_label = [
      'event' => 'イベント',
      'symposium' => 'シンポジウム',
      'notice' => 'お知らせ',
      'presentation' => '研究発表'
    ][$news_category_value] ?? 'お知らせ';
    $tag_class = 'tag-' . esc_attr($news_category_value);
    $news_description = get_field('news_description');
?>
  <div class="news-item">
    <div class="news-date"><?php echo $news_date ? esc_html($news_date->format('Y年n月j日')) : ''; ?></div>
    <?php echo '<!-- Tag class: ' . $tag_class . ' -->'; ?>
    <div class="news-tag <?php echo esc_attr($tag_class); ?>"><?php echo esc_html($news_category_label); ?></div>
    <div class="news-summary">
      <p><a href="<?php the_permalink(); ?>"><?php echo esc_html($news_description); ?></a></p>
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
      <a data-anim-trigger-self data-anim="fade-in" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="btn btn--cta">
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
      <h2 class="cta-title">メンバー募集に興味がありますか？</h2>
      <p class="cta-text">
        私たちは、教育技術の発展に情熱を注ぐ研究者や学生の参加をいつでも歓迎しています。<br><br>
        私たちのミッションに共感してくださる方はもちろん、「ちょっと見てみたい」という方も大歓迎です。<br>
        ぜひお気軽にご連絡ください！
      </p>

      <div class="cta-buttons">
      <a href="join-us/" class="btn btn--cta">
        <span>訪問予約をする</span>
      </a>
      <a href="join-us/" class="btn btn--cta">
        <span>申請する</span>
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

  logo.addEventListener('animationstart', () => {
    animationStarted = true;
  });

  setTimeout(() => {
    if (!animationStarted) {
      logo.classList.add('no-anim');
    }
  }, 1000); // 1 second grace period
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  new Swiper('.updates-carousel', {
    slidesPerView: 3,
    spaceBetween: 12,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1280: { slidesPerView: 3 }
    }
  });
});



</script>


<?php get_footer(); ?>
