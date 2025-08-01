<?php
/**
 * Template Name: Projects Page (EN)
 */
defined('ABSPATH') || exit;
get_header();
$container = get_theme_mod('understrap_container_type');
?>
<section class="project-sections-wrapper">
<section class="projects-hero-section section-spacing">
  <div class="container">
        <h1 class="page-title">Projects</h1>
        <h2 class="page-subtitle">Our Projects</h2>
        <p class="projects-intro">
          At LET, we collaborate with schools and educational institutions to drive diverse research projects.<br>
          We develop practical initiatives in response to societal challenges and technological advances.
        </p>
  </div>
</section>

<section class="project-cards-section section-spacing">
  <div class="container">
    <div class="row g-4">
      <?php
      $projects = [
        [
          'title' => '[NEDO] Research and Development of EXAIT',
          'excerpt' => 'Building the educational explanation-generation AI engine EXAIT, aiming for deployment in collaboration with Kyoto City Board of Education.',
          'image' => 'project-nedo.png',
          'link' => '/en/nedo-exait/'
        ],
        [
          'title' => '[Cabinet Office] Research on Tailor-Made Education',
          'excerpt' => 'Integrating learning cognitive science, AI, and information infrastructure technologies to study big data-driven educational support.',
          'image' => 'project-sip2.png',
          'link' => '/en/sip2/'
        ],
        [
          'title' => '[Kyoto University] Library Recommendation System Development',
          'excerpt' => 'Developing a library recommendation feature integrated with BookRoll to promote self-directed learning.',
          'image' => 'project-library.jpg',
          'link' => '/en/library-integration/'
        ],
        [
          'title' => '[MEXT] Experimental Future-Oriented Education Model',
          'excerpt' => 'Exploring and verifying an educational model that enables personalized learning through collaborative activities.',
          'image' => 'project-mext.png',
          'link' => '/en/mext-model/'
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
