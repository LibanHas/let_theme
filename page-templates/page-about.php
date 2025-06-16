<?php
/**
 * Template Name: About Page
 *
 * Step 2: Reintroduce Hero Section
 *
 * @package Understrap
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="wrapper" id="about-page-wrapper">
  <div class="container-fluid" id="content">
    <main class="site-main" id="main">

      <!-- Hero Section -->
      <!-- Hero Section -->
<section class="about-hero section-spacing">
  <div class="container">
    <div class="row align-items-center">
      <!-- Text Column -->
      <div class="col-12 col-lg-6 mb-4 mb-lg-0 text-lg-start text-center">
        <h1 class="about-hero-title fw-bold mb-4">
          <span class="d-block d-md-inline">すべての学びに、</span>
          <span class="d-block d-md-inline">エビデンスとテクノロジーを。</span>
        </h1>
        <p>
          緒方研究室（LET）では、直感や経験に頼ってきた教育を、エビデンスとテクノロジーに基づくものへと進化させることを目指しています。
        </p>
        <p>
          学習のプロセスを可視化し、一人ひとりの理解やつまずきを捉えることで、より良い授業づくりと学習支援を実現しています。<br>
          教育機関と連携しながら、誰もがどこでも効果的に学べる環境を共に築いています。
        </p>
      </div>

      <!-- Image Column -->
      <div class="col-12 col-lg-6 text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/images/center-image.jpg" alt="LET Lab building" class="img-fluid rounded-3">
      </div>
    </div>
  </div>
</section>

<!-- Timeline Section -->
<!-- Timeline Section -->
<section class="timeline-section section-spacing">
  <div class="container">
    <h2 class="section-title">緒方研究室の歩み</h2>
    <div class="timeline-wrapper">
      <div class="timeline-line"></div>

      <?php
      $milestones = [
        ["2017年4月", "京都大学にて緒方研究室を設立", "uni_building.png"],
        ["2018年頃", "BookRoll正式運用開始", "bookroll-icon.png"],
        ["2018年〜", "LEAFシステム開発・導入開始", "brain.svg"],
        ["2021年頃", "京都市立西京高校などでBookRoll活用", "school.svg"],
        ["2021年〜", "京都大学FD活動にて教員研修での活用開始", "graduation-cap.svg"],
        ["2023年9月", "北海道寿都高校・天塩高校でLEAFシステム実証開始", "test.svg"],
        ["2023年10月", "SIP第3期プロジェクト始動", "rocket.svg"],
        ["2024年", "xAPIプロファイルサーバ連携プロジェクトに参加", "server.svg"]
      ];

      foreach ($milestones as $i => $milestone) :
        $delay = $i * 100;
        $isLeft = $i % 2 === 0;
        ?>
        <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="<?php echo esc_attr($delay); ?>">

          <!-- Left label (only rendered if $isLeft is true) -->
          <div class="timeline-label left">
            <?php if ($isLeft): ?>
              <div class="timeline-date"><?php echo $milestone[0]; ?></div>
              <div class="timeline-text"><?php echo $milestone[1]; ?></div>
            <?php endif; ?>
          </div>

          <!-- Icon -->
          <div class="timeline-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $milestone[2]; ?>" alt="" class="img-fluid rounded-3">
          </div>

          <!-- Right label (only rendered if $isLeft is false) -->
          <div class="timeline-label right">
            <?php if (!$isLeft): ?>
              <div class="timeline-date"><?php echo $milestone[0]; ?></div>
              <div class="timeline-text"><?php echo $milestone[1]; ?></div>
            <?php endif; ?>
          </div>

        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



    </main>
  </div>
</div>

<?php get_footer(); ?>
