<?php
/**
 * Template for displaying individual member profile (JP + EN combined).
 *
 * @package Understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');

// Check ACF language field (fallback to 'ja')
$lang = get_field('language') ?: 'ja';
$suffix = ($lang === 'en') ? '_en' : '_jp';


// ------------------------------------------
// Determine heading: Members vs Former Members
// ------------------------------------------

// $lang already set above; fallback 'ja'
$field_name = ($lang === 'ja') ? 'member_type_jp' : 'member_type_en';

// Get the type from the language-specific ACF field
$type_raw = (string) get_field($field_name);
$type     = function_exists('mb_strtolower') ? mb_strtolower(trim($type_raw), 'UTF-8') : strtolower(trim($type_raw));

// Exact rule: if the value is "alumni" → Former Members, else Members
$is_alumni    = ($type === 'alumni');
$heading_text = $is_alumni ? 'Former Members' : 'Members';

// (Optional) quick debug for admins
if (current_user_can('manage_options')) {
  echo "\n<!-- lang='{$lang}' field='{$field_name}' value='{$type_raw}' alumni=" . ($is_alumni ? '1' : '0') . " -->\n";
}
?>


<main id="member-profile-page">
<!-- Cover Section -->
<section class="member-cover section-spacing alignfull">
    <div class="cover-inner <?php echo esc_attr($container); ?>">
        <h2 class="page-title"><?php echo esc_html($heading_text); ?></h2>
        <p class="page-subtitle"><?php echo ($lang === 'en') ? 'Member Profile' : 'プロフィール'; ?></p>
    </div>
</section>

  <!-- Member Info -->
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
          $employment_title = get_field("employment_title$suffix");
          $student_level    = get_field("student_level$suffix");
          $student_year     = get_field("student_year$suffix");

          if ($employment_title) {
              echo '<p class="member-position">' . esc_html($employment_title) . '</p>';
          } elseif ($student_level) {
              $level_labels = [
                  'ja' => [
                      'doctoral'         => '博士',
                      'masters'          => '修士',
                      'postdoc'          => '特定研究員',
                      'research_student' => '研究生',
                  ],
                  'en' => [
                      'doctoral'         => 'Doctoral Student',
                      'masters'          => 'Master’s Student',
                      'postdoc'          => 'Postdoctoral Fellow',
                      'research_student' => 'Research Student',
                  ]
              ];
              $level_label = $level_labels[$lang][$student_level] ?? '';

              if ($level_label && $student_year) {
                  $year_label = ($lang === 'en') ? "Year $student_year" : "{$student_year}年";
                  echo '<p class="member-position">' . esc_html("$level_label ($year_label)") . '</p>';
              } elseif ($level_label) {
                  echo '<p class="member-position">' . esc_html($level_label) . '</p>';
              }
          }
          ?>
        </div>
    </div>
  </div>

  <!-- Profile Details -->
  <div class="container member-details">
    <section class="member-section">
      <h2 class="member-section-title"><?php echo ($lang === 'en') ? 'Profile' : 'プロフィール'; ?></h2>
      <ul class="member-profile-list">
      <?php
$fields = [
  'birthplace'            => ['ja' => '出身地', 'en' => 'Birthplace'],
  'degree'                => ['ja' => '学位', 'en' => 'Degree'],
  'university_department' => ['ja' => '出身大学・学部', 'en' => 'Former school'],
  'programming_languages' => ['ja' => '得意なプログラム言語', 'en' => 'Programming Languages'],
  'research_theme'        => ['ja' => '研究テーマ', 'en' => 'Research Topic'],
  'hobby'                 => ['ja' => '趣味', 'en' => 'Hobbies'],
  'recommendation'        => ['ja' => '緒方研のおすすめのポイント', 'en' => 'Recommended points about Ogata Lab'],
  'link'                  => ['ja' => 'リンク', 'en' => 'Link'],
  'profile'               => ['ja' => 'プロフィール', 'en' => 'Profile']
];

// Helper: strict for EN, fallback to base only for JP
function get_lang_field($base, $lang) {
  if ($lang === 'en') {
      return get_field($base . '_en') ?: null;   // strict EN
  } else {
      return get_field($base . '_jp') ?: get_field($base); // JP fallback
  }
}

foreach ($fields as $field => $labels) {
    // Try language-specific field first, then fall back to base field
    $val = get_lang_field($field, $lang);

    if (!$val) {
        continue;
    }

    echo '<li><strong>' . esc_html($labels[$lang]) . ':</strong> ';

    if ($field === 'link') {
        // Handle both ACF Link (array) and plain URL (string)
        if (is_array($val)) {
            $url    = isset($val['url']) ? $val['url'] : '';
            $text   = isset($val['title']) && $val['title'] ? $val['title'] : $url;
            $target = isset($val['target']) && $val['target'] ? $val['target'] : '_blank';
            if ($url) {
                echo '<a href="' . esc_url($url) . '" target="' . esc_attr($target) . '" rel="noopener noreferrer">'
                   . esc_html($text) . '</a>';
            }
        } else {
            // Plain URL
            echo '<a href="' . esc_url($val) . '" target="_blank" rel="noopener noreferrer">'
               . esc_html($val) . '</a>';
        }
    } elseif ($field === 'profile') {
        // Allow basic formatting if this is WYSIWYG/textarea
        echo wp_kses_post($val);
    } else {
        echo esc_html($val);
    }

    echo '</li>';
}
?>

      </ul>
    </section>
  </div>
</main>

<?php get_footer(); ?>
