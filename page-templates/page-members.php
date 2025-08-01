<?php
/**
 * Template Name: Members page
 * Template for displaying members with front-end filter buttons.
 * @package Understrap
 */

defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
$lang = (strpos($_SERVER['REQUEST_URI'], '/en/') !== false) ? 'en' : 'ja';
?>

<div class="wrapper" id="page-members">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-lg-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO SECTION -->
          <section class="members-section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <h2 class="page-subtitle"><?php echo $lang === 'ja' ? 'メンバー' : 'Member Profiles'; ?></h2>
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

$members = new WP_Query([
  'post_type' => 'member',
  'posts_per_page' => -1,
  'meta_query' => [
      [
          'key' => 'language',
          'value' => $lang,
          'compare' => '='
      ]
  ],
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
<div class="member-group-section group-<?php echo $group === 'faculty' ? 'faculty' : 'student'; ?>"
     style="<?php echo ($group !== $default_filter) ? 'display:none;' : ''; ?>">
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

              <!-- Former Members Section -->
              <?php
              $faculty_alumni = [];
              $student_alumni = [];
              $staff_alumni = [];

              foreach ($alumni as $post) {
                  setup_postdata($post);
                  $type = get_field('member_type');
                  $level = get_field('student_level');

                  if ($type === 'faculty') {
                      $faculty_alumni[] = $post;
                  } elseif ($level === 'doctoral' || $level === 'masters' || $level === 'research_student') {
                      $student_alumni[] = $post;
                  } else {
                      $staff_alumni[] = $post;
                  }
              }
              ?>

              <?php if (!empty($faculty_alumni) || !empty($student_alumni) || !empty($staff_alumni)) : ?>
              <div class="member-group-section group-alumni accordion" style="display:none;">
                <div class="member-subheading">
                  <h2 class="subheading-title"><?php echo $lang === 'ja' ? '元メンバー' : 'Former Members'; ?></h2>
                  <div class="subheading-line"></div>
                </div>

                <!-- Former Faculty -->
                <?php if (!empty($faculty_alumni)) : ?>
                <div class="accordion-item">
                  <button class="accordion-header" type="button" data-target="faculty-panel">
                    <?php echo $lang === 'ja' ? '元 教員' : 'Former Faculty'; ?>
                    <span class="accordion-icon plus-icon">
                    <span class="line horizontal"></span>
                    <span class="line vertical"></span>
                  </span>
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
                    <?php echo $lang === 'ja' ? '元 学生（博士・修士）' : 'Former Students (PhD/Masters)'; ?>
                    <span class="accordion-icon plus-icon">
                    <span class="line horizontal"></span>
                    <span class="line vertical"></span>
                  </span>
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
                        if ($level && $level !== 'na') {
                            if ($level === 'doctoral' || $level === 'masters') {
                                if ($year) {
                                    $label = $level === 'doctoral' ? ($lang === 'ja' ? '博士' : 'PhD') : ($lang === 'ja' ? '修士' : 'M');
                                    echo '（' . esc_html($label . ($lang === 'ja' ? $year . '年' : ' ' . $year)) . '）';
                                }
                            } elseif ($level === 'research_student') {
                                echo $lang === 'ja' ? '（研究生）' : ' (Research Student)';
                            }
                        }
                        ?>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                <?php endif; ?>

                <!-- Former Staff -->
                <?php if (!empty($staff_alumni)) : ?>
                <div class="accordion-item">
                  <button class="accordion-header" type="button" data-target="staff-panel">
                    <?php echo $lang === 'ja' ? '元 スタッフ' : 'Former Staff'; ?>
                    <span class="accordion-icon plus-icon">
                      <span class="line horizontal"></span>
                      <span class="line vertical"></span>
                    </span>
                  </button>
                  <div class="accordion-panel" id="staff-panel">
                    <ul class="alumni-list with-icon">
                      <?php foreach ($staff_alumni as $post) : setup_postdata($post); ?>
                      <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/briefcase-business.svg" alt="" class="alumni-icon" />
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php
                        $title = get_field('employment_title');
                        if ($title) echo '（' . esc_html($title) . '）';
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



<?php get_footer(); ?>
