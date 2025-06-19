<?php
/**
 * Template for displaying individual member profile.
 *
 * @package Understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<main id="member-profile-page">
  <!-- Cover Section with spacing -->
  <section class="member-cover section-spacing alignfull">
    <div class="cover-inner <?php echo esc_attr($container); ?>">
      <h2 class="page-title">Members</h2>
      <p class="page-subtitle">メンバー</p>
    </div>
  </section>

  <!-- Member Info Section -->
  <div class="container member-info">
    <div class="row">
      <?php if (has_post_thumbnail()) : ?>
        <div class="col-md-4">
          <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
        </div>
        <div class="col-md-8">
      <?php else : ?>
        <div class="col-md-12">
      <?php endif; ?>
          <h1 class="member-name"><?php the_title(); ?></h1>
          <?php
          $employment_title = get_field('employment_title');
          $student_level = get_field('student_level');
          $student_year = get_field('student_year');

          if ($employment_title) {
            echo '<p class="member-position">' . esc_html($employment_title) . '</p>';
          } elseif ($student_level && $student_year) {
            $label = [
              'doctoral' => '博士',
              'masters'  => '修士',
              'postdoc'  => '特定研究員'
            ][$student_level] ?? '';
            
            if ($label) {
              echo '<p class="member-position">' . esc_html($label . $student_year . '年') . '</p>';
            }
          }
          ?>
        </div>
    </div>
  </div>

  <!-- Profile and Research -->
  <div class="container member-details">
    <section class="member-section">
      <h2 class="member-section-title">プロフィール</h2>
      <ul class="member-profile-list">
        <?php
        $fields = [
          'birthplace' => '出身地',
          'university_department' => '出身大学・学部',
          'programming_languages' => '得意なプログラム言語',
          'hobby' => '趣味',
          'recommendation' => '緒方研のおすすめのポイント',
          'link' => 'リンク'
        ];

        foreach ($fields as $field => $label) {
          $value = get_field($field);
          if ($value) {
            echo '<li><strong>' . esc_html($label) . ':</strong> ';
            if ($field === 'link') {
              echo '<a href="' . esc_url($value) . '" target="_blank" rel="noopener">' . esc_html($value) . '</a>';
            } else {
              echo esc_html($value);
            }
            echo '</li>';
          }
        }
        ?>
      </ul>
    </section>
  </div>
</main>

<?php get_footer(); ?>
