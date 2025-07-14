<?php
/**
 * The template for displaying the footer
 *
 * @package Understrap
 */

defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
$lang = function_exists('pll_current_language') ? pll_current_language() : 'ja'; // 'en' or 'ja'

// Define footer content
$footer_text = [
  'heading' => [
    'ja' => '学びの可視化から、教育の未来へ。',
    'en' => 'Making Learning Visible.<br>Shaping the Future of Education.'
  ],
  'contact_lead' => [
    'ja' => '研究室に関心がありますか？',
    'en' => 'Interested in our lab?'
  ],
  'contact_body' => [
    'ja' => '私たちの研究やツールにご興味のある方、<br>見学を希望される方、<br class="hide-on-mobile">または入学・共同研究をご検討中の方は、ぜひお気軽にご連絡ください。',
    'en' => 'If you’re interested in our research or tools,<br>would like to visit,<br class="hide-on-mobile">or are considering enrollment or collaboration,<br>please don’t hesitate to reach out.'
  ],
  'contact_button' => [
    'ja' => 'お問い合わせ',
    'en' => 'Contact Us'
  ],
  'about' => [
    'ja' => '私たちについて',
    'en' => 'About Us'
  ],
  'members' => [
    'ja' => 'メンバー紹介',
    'en' => 'Members'
  ],
  'projects' => [
    'ja' => 'プロジェクト',
    'en' => 'Projects'
  ],
  'publications' => [
    'ja' => '業績一覧',
    'en' => 'Publications'
  ],
  'join' => [
    'ja' => '研究室に参加する',
    'en' => 'Join Us'
  ],
  'address' => [
    'ja' => '京都大学 学術情報メディアセンター南館 4階 412号室<br>〒606-8501 京都市左京区吉田二本松町<br>',
    'en' => 'Academic Center for Computing and Media Studies, Kyoto University<br>Yoshida Nihonmatsu-cho, Sakyo-ku, Kyoto 606-8501 JAPAN<br>'
  ]
];
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

<footer class="custom-footer">
  <div class="container">
    <!-- Top section: logo, heading, address -->
    <div class="custom-footer__top">
  <div class="footer-left">
    <h2 class="custom-footer__heading">
      <?php echo $footer_text['heading'][$lang]; ?>
    </h2>
    <p><?php echo $footer_text['contact_body'][$lang]; ?></p>
    <a href="mailto:info@let.media.kyoto-u.ac.jp" class="btn btn--secondary-outline btn--secondary-outline-dark">
      <span><?php echo $footer_text['contact_button'][$lang]; ?></span>
    </a>
  </div>
  <div class="footer-right">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/let_logo.png" alt="LET Lab Logo" class="footer-logo">
    <div class="footer-address">
    <?php echo $footer_text['address'][$lang]; ?>
  </div>
  </div>
</div>

    <hr class="custom-footer__divider">

    <!-- Bottom section: links only, no headings -->
    <div class="custom-footer__links">
    <ul class="footer-links">
  <li><a href="/<?php echo ($lang === 'en') ? 'en/' : ''; ?>about"><?php echo $footer_text['about'][$lang]; ?></a></li>
  <li><a href="/<?php echo ($lang === 'en') ? 'en/' : ''; ?>members"><?php echo $footer_text['members'][$lang]; ?></a></li>
  <li><a href="/<?php echo ($lang === 'en') ? 'en/' : ''; ?>research"><?php echo ($lang === 'en') ? 'Research' : '研究'; ?></a></li>
  <li><a href="/<?php echo ($lang === 'en') ? 'en/' : ''; ?>leaf">LEAF</a></li>
  <li><a href="/<?php echo ($lang === 'en') ? 'en/' : ''; ?>publications"><?php echo $footer_text['publications'][$lang]; ?></a></li>
  <li><a href="/<?php echo ($lang === 'en') ? 'en/' : ''; ?>join"><?php echo $footer_text['join'][$lang]; ?></a></li>
  <li><a href="mailto:info@let.media.kyoto-u.ac.jp"><?php echo $footer_text['contact_button'][$lang]; ?></a></li>
</ul>
    </div>
  </div>
</footer>


</div><!-- #wrapper-footer -->

</div><!-- #page -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/accordion.js"></script>

<?php wp_footer(); ?>
</body>
</html>
