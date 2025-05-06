<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">



<footer class="custom-footer">
  <div class="container">
    <div class="custom-footer__top">
      <h2 class="custom-footer__heading">
	  学びの可視化から、教育の未来へ。
      </h2>
      <div class="custom-footer__contact">
  <p class="lead">研究室に関心がありますか？</p>
  <p>
    私たちの研究やツールにご興味のある方、<br>
    見学を希望される方、<br class="hide-on-mobile">
    または入学・共同研究をご検討中の方は、ぜひお気軽にご連絡ください。
  </p>
  <a href="/contact" class="btn btn--secondary-outline btn--secondary-outline-dark">
    <span>お問い合わせ</span>
  </a>
</div>

    </div>
    <hr class="custom-footer__divider">
    <div class="custom-footer__bottom">
      <div class="footer-column">
        <h4>研究室について</h4>
        <ul>
          <li><a href="/about">私たちについて</a></li>
          <li><a href="/members">メンバー紹介</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>プロジェクト</h4>
        <ul>
          <li><a href="/bookroll">BookRoll</a></li>
          <li><a href="/logpalette">LogPalette</a></li>
          <li><a href="/leaf">LEAFシステム</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>リンク</h4>
        <ul>
          <li><a href="/publications">業績一覧</a></li>
          <li><a href="/join">研究室に参加する</a></li>
          <li><a href="/contact">お問い合わせ</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>



</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/accordion.js"></script>

<?php wp_footer(); ?>

</body>
</html>
