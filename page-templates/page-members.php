<?php
/**
 * Template Name: Members page
 * Template for displaying members with front-end filter buttons.
 * @package Understrap
 */

defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
// Detect current language with Polylang
$lang = function_exists('pll_current_language') ? pll_current_language() : 'ja';
?>

<div class="wrapper" id="page-members">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-lg-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO SECTION -->
          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <h2 class="page-subtitle"><?php echo $lang === 'ja' ? 'メンバー' : 'Members'; ?></h2>
              </div>
            </div>
          </section>

          <div class="container">
            <!-- FILTER BUTTONS -->
            <div class="wp-block-buttons alignwide is-content-justification-center is-layout-flex wp-block-buttons-is-layout-flex" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70)">
              <?php
              $buttons = $lang === 'ja' ? [
                'faculty' => '教員・スタッフ',
                'student' => '学生',
                'alumni'  => '元メンバー'
              ] : [
                'faculty' => 'Faculty & Staff',
                'student' => 'Students',
                'alumni'  => 'Former Members'
              ];
              $default_filter = 'faculty';

              foreach ($buttons as $slug => $label) :
                  $is_active = ($slug === $default_filter);
              ?>
              <div class="wp-block-button <?php echo $is_active ? 'is-style-fill' : 'is-style-outline is-style-outline--1'; ?>">
                <button class="wp-block-button__link wp-element-button filter-button member-button-wrapper <?php echo $is_active ? 'active' : ''; ?>"
                        data-filter="<?php echo esc_attr($slug); ?>">
                  <?php echo esc_html($label); ?>
                </button>
              </div>
              <?php endforeach; ?>
            </div>

            <!-- MEMBERS LIST -->
            <div class="members-container">
              <?php
              function render_member_card($post, $lang) {
                  setup_postdata($post);
                  $post_id = $post->ID;
                  $member_type = get_field('member_type', $post_id);
                  $student_level = get_field('student_level', $post_id);
                  $student_year = get_field('student_year', $post_id);
                  $employment_title = $lang === 'ja' ? get_field('employment_title', $post_id) : get_field('employment_title_en', $post_id);
              ?>
              <div class="col-md-3 member p-member-list__item group-<?php echo esc_attr($member_type); ?>">
                <a href="<?php the_permalink(); ?>" class="p-member-list__thumbnail">
                  <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('medium');
                  } else {
                      echo '<div class="p-member-list__thumbnail --empty"></div>';
                  } ?>
                </a>
                <a href="<?php the_permalink(); ?>" class="p-member-list__name"><?php the_title(); ?></a>
                <?php
                if ($student_level && $student_year) {
                    if ($lang === 'ja') {
                        $label = $student_level === 'doctoral' ? '博士' : '修士';
                        echo '<p class="p-member-list__position">' . esc_html($label . $student_year . '年') . '</p>';
                    } else {
                        $label = $student_level === 'doctoral' ? 'PhD' : 'M';
                        echo '<p class="p-member-list__position">' . esc_html($label . ' ' . $student_year) . '</p>';
                    }
                } elseif ($member_type === 'faculty' && $employment_title) {
                    echo '<p class="p-member-list__position">' . esc_html($employment_title) . '</p>';
                }
                ?>
              </div>
              <?php wp_reset_postdata(); }

              // Query: Polylang automatically filters posts by language
              $members = new WP_Query([
                'post_type' => 'member',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
              ]);

              $faculty = [];
              $alumni = [];
              $doctoral = [];
              $masters = [];

              if ($members->have_posts()) {
                  while ($members->have_posts()) {
                      $members->the_post();
                      $type = get_field('member_type');
                      $level = get_field('student_level');

                      switch ($type) {
                          case 'faculty': $faculty[] = get_post(); break;
                          case 'alumni': $alumni[] = get_post(); break;
                          case 'student':
                              if ($level === 'doctoral') {
                                  $doctoral[] = get_post();
                              } elseif ($level === 'masters') {
                                  $masters[] = get_post();
                              }
                              break;
                      }
                  }
                  wp_reset_postdata();
              }
              ?>

              <!-- Display sections -->
              <?php
              $sections = [
                  'doctoral' => $lang === 'ja' ? '博士' : 'PhD Students',
                  'masters'  => $lang === 'ja' ? '修士' : 'Masters Students',
                  'faculty'  => $lang === 'ja' ? '教員・スタッフ' : 'Faculty & Staff'
              ];
              foreach (['doctoral', 'masters', 'faculty'] as $group) :
                  $posts = $$group;
                  if (!empty($posts)) :
              ?>
              <div class="member-group-section group-<?php echo $group === 'faculty' ? 'faculty' : 'student'; ?>">
                <div class="member-subheading">
                  <h2 class="subheading-title"><?php echo esc_html($sections[$group]); ?></h2>
                  <div class="subheading-line"></div>
                </div>
                <div class="row members-list">
                  <?php foreach ($posts as $post) render_member_card($post, $lang); ?>
                </div>
              </div>
              <?php
                  endif;
              endforeach;
              ?>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>

<!-- FILTER SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const defaultFilter = 'faculty';
  const buttons = document.querySelectorAll('.filter-button');
  const sections = document.querySelectorAll('.member-group-section');

  sections.forEach(section => {
    section.style.display = section.classList.contains('group-' + defaultFilter) ? '' : 'none';
  });

  buttons.forEach(button => {
    button.addEventListener('click', function () {
      const filter = this.dataset.filter;
      buttons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      sections.forEach(section => {
        section.style.display = section.classList.contains('group-' + filter) ? '' : 'none';
      });
    });
  });
});
</script>

<?php get_footer(); ?>
