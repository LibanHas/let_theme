<?php
/**
 * Template Name: Members page
 * Template for displaying members with front-end filter buttons.
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
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
                <h2 class="page-subtitle">メンバー</h2>
              </div>
            </div>
          </section>

          <div class="container">
            <!-- FILTER BUTTONS -->
            <div class="wp-block-buttons alignwide is-content-justification-center is-layout-flex wp-block-buttons-is-layout-flex" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70)">
              <?php
              $buttons = [
                'faculty' => '教員・スタッフ',
                'student' => '学生',
                'alumni'  => '元メンバー'
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
              function render_member_card($post) {
                  setup_postdata($post);
                  $post_id = $post->ID;
                  $member_type = get_field('member_type', $post_id);
                  $student_level = get_field('student_level', $post_id);
                  $student_year = get_field('student_year', $post_id);
                  $employment_title = get_field('employment_title', $post_id);
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
                    $label = $student_level === 'doctoral' ? '博士' : '修士';
                    echo '<p class="p-member-list__position">' . esc_html($label . $student_year . '年') . '</p>';
                } elseif ($member_type === 'faculty' && $employment_title) {
                    echo '<p class="p-member-list__position">' . esc_html($employment_title) . '</p>';
                }
                ?>
              </div>
              <?php wp_reset_postdata(); }

              // Query
              $members = new WP_Query([
                'post_type' => 'member',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
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

              <!-- 博士 -->
              <?php if (!empty($doctoral)) : ?>
              <div class="member-group-section group-student">
                <div class="member-subheading">
                  <h2 class="subheading-title">博士</h2>
                  <div class="subheading-line"></div>
                </div>
                <div class="row members-list">
                  <?php foreach ($doctoral as $post) render_member_card($post); ?>
                </div>
              </div>
              <?php endif; ?>

              <!-- 修士 -->
              <?php if (!empty($masters)) : ?>
              <div class="member-group-section group-student">
                <div class="member-subheading">
                  <h2 class="subheading-title">修士</h2>
                  <div class="subheading-line"></div>
                </div>
                <div class="row members-list">
                  <?php foreach ($masters as $post) render_member_card($post); ?>
                </div>
              </div>
              <?php endif; ?>

              <!-- 教員・スタッフ -->
              <?php if (!empty($faculty)) : ?>
              <div class="member-group-section group-faculty">
                <div class="member-subheading">
                  <h2 class="subheading-title">教員・スタッフ</h2>
                  <div class="subheading-line"></div>
                </div>
                <div class="row members-list">
                <?php foreach ($faculty as $post) render_member_card($post); ?>
                <!-- Research Collaborators Card -->
                <div class="col-md-3 member p-member-list__item group-faculty">
                  <a href="<?php echo esc_url(site_url('/members/research-collaborators')); ?>" class="p-member-list__thumbnail --empty">
                    <span class="collab-label-jp" style="display: flex; align-items: center; justify-content: center; height: 100%; width: 100%; font-weight: bold; color: #fff;">
                      共同研究員
                    </span>
                  </a>
                  <a href="<?php echo esc_url(site_url('/members/research-collaborators')); ?>" class="p-member-list__name">共同研究員</a>
                  <p class="p-member-list__position">Research Collaborators</p>
                </div>
              </div>
              </div>
              <?php endif; ?>

              <!-- 元メンバー -->
              <?php
              $faculty_alumni = [];
              $student_alumni = [];

              foreach ($alumni as $post) {
                  setup_postdata($post);
                  $type = get_field('member_type');
                  $level = get_field('student_level');

                  if ($type === 'faculty') {
                      $faculty_alumni[] = $post;
                  } else {
                      $student_alumni[] = $post;
                  }
              }
              ?>

              <?php if (!empty($faculty_alumni) || !empty($student_alumni)) : ?>
              <div class="member-group-section group-alumni accordion-section">
                <div class="member-subheading">
                  <h2 class="subheading-title">元メンバー</h2>
                  <div class="subheading-line"></div>
                </div>

                <!-- Former Faculty -->
                <?php if (!empty($faculty_alumni)) : ?>
                <div class="accordion-item">
                  <button class="accordion-header" type="button" data-target="faculty-panel">
                    元 教員・スタッフ <span class="accordion-icon">＋</span>
                  </button>
                  <div class="accordion-panel" id="faculty-panel">
                    <ol>
                      <?php foreach ($faculty_alumni as $post) : setup_postdata($post); ?>
                      <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php
                        $title = get_field('employment_title');
                        if ($title) echo '（' . esc_html($title) . '）';
                        ?>
                      </li>
                      <?php endforeach; ?>
                    </ol>
                  </div>
                </div>
                <?php endif; ?>

                <!-- Former Students -->
                <?php if (!empty($student_alumni)) : ?>
                <div class="accordion-item">
                  <button class="accordion-header" type="button" data-target="student-panel">
                    元 学生（博士・修士）<span class="accordion-icon">＋</span>
                  </button>
                  <div class="accordion-panel" id="student-panel">
                    <ul class="alumni-list with-icon">
                      <?php foreach ($student_alumni as $post) : setup_postdata($post); ?>
                      <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/graduation-cap.svg" alt="" class="alumni-icon" />
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php
                        $level = get_field('student_level');
                        $year = get_field('student_year');
                        if ($level && $year && $level !== 'na') {
                            $label = $level === 'doctoral' ? '博士' : '修士';
                            echo '（' . esc_html($label . $year . '年') . '）';
                        }
                        ?>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
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