<?php
/**
 * Template Name: Projects Page
 */
defined('ABSPATH') || exit;
get_header();
$container = get_theme_mod('understrap_container_type');
?>
<section class="project-sections-wrapper">
<section class="projects-hero-section section-spacing">
  <div class="container">
        <h1 class="page-title">Projects</h1>
        <h2 class="page-subtitle">プロジェクト</h2>
        <p class="projects-intro">
          LETでは、教育の現場と連携しながら、多様な研究プロジェクトを推進しています。<br>
          社会の課題やテクノロジーの進展に応じて、実践的な取り組みを展開しています。
        </p>
  </div>
</section>

<section class="project-cards-section section-spacing">
  <div class="container">
    <div class="row g-4">
      <?php
      $projects = [
        [
          'title' => '【NEDO】EXAITの研究開発',
          'excerpt' => '教育用説明生成AIエンジンEXAITを構築し、京都市教育委員会と連携して学校現場への導入を目指す。',
          'image' => 'project-nedo.png',
          'link' => '/projects/nedo-exait/'
        ],
        [
          'title' => '【内閣府】テーラーメイド教育の研究開発',
          'excerpt' => '学習認知科学・AI・情報基盤技術を統合し、ビッグデータに基づく教育支援を研究。',
          'image' => 'project-sip2.png',
          'link' => '/projects/sip2/'
        ],
        [
          'title' => '【京都大学】図書館資料推薦システムの開発',
          'excerpt' => 'BookRollと連携し、自学自習を促進する図書館推薦機能を開発。',
          'image' => 'project-library.jpg',
          'link' => '/projects/library-integration/'
        ],
        [
          'title' => '【文科省】未来型教育モデルの実証事業',
          'excerpt' => '協働学習を通じた個別最適な学びを実現する教育モデルの検討と検証。',
          'image' => 'project-mext.png',
          'link' => '/projects/mext-model/'
        ],
      ];

      foreach ($projects as $project) :
      ?>
        <div class="col-md-6 mb-4">
  <a href="<?php echo esc_url($project['link']); ?>" class="project-card">
    <?php if (!empty($project['image'])) : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo esc_attr($project['image']); ?>" class="img-fluid" alt="<?php echo esc_attr($project['title']); ?>">
    <?php endif; ?>
    <div class="project-card-body">
      <h3><?php echo esc_html($project['title']); ?></h3>
      <p><?php echo esc_html($project['excerpt']); ?></p>
    </div>
  </a>
</div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
</section>

<?php get_footer(); ?>