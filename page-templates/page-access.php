<?php
/**
 * Template Name: Access Page
 *
 * Template for displaying the Access page.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="access-wrapper">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO BANNER -->
          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <h2 class="page-subtitle">アクセス</h2>
              </div>
            </div>
          </section>

          <!-- ACCESS CONTENT TWO-COLUMN -->
          <section class="">
            <div class="container">
              <div class="row align-items-start">

                <!-- Text Column -->
                <div class="col-lg-6 mb-4">
                  <div class="access-wrapper">
                    <div class="access-text">
                      <p><strong>所在地</strong><br>
                      〒606-8501<br>
                      京都市左京区吉田二本松町<br>
                      京都大学 学術情報メディアセンター 南館 4階 412号室</p>

                      <p><strong>Email</strong><br>
                      info [at] let.media.kyoto-u.ac.jp</p>

                      <p>緒方研究室は、<strong>吉田南キャンパスの93番の建物</strong>（<a href="https://www.kyoto-u.ac.jp/ja/access/campus/yoshida" target="_blank" rel="noopener noreferrer">こちら</a>）に位置しています。</p>

                      <p>京都駅からお越しの際は、<strong>八条口から「京大病院前」までのhoopバス</strong>のご利用が便利です。</p>

                      <p><a href="https://www.kyoto-u.ac.jp/ja/access" target="_blank" rel="noopener noreferrer">京都市営バス等によるアクセス方法はこちら</a> にも記載があります。</p>

                      <p><strong>ご訪問の際は、必ず事前にメールにてご連絡ください。</strong></p>
                    </div>
                  </div>
                </div>

                <!-- Map Column -->
                <div class="col-lg-6">
                  <div class="access-map">
                    <iframe 
                      style="border: 0; width: 100%; height: 450px; border-radius: 8px; box-shadow: 0 4px 16px rgba(0,0,0,0.05);" 
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.2468681735977!2d135.77964401586843!3d35.02555353035236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108f77670e589%3A0xf4196e4ad1a354bd!2z5Lqs6YO95aSn5a2mIOWtpuihk-aDheWgseODoeODh-OCo-OCouOCu-ODs-OCv-ODvA!5e0!3m2!1sja!2sjp!4v1539235098042" 
                      allowfullscreen>
                    </iframe>
                  </div>
                </div>

              </div> <!-- .row -->
            </div> <!-- .container -->
          </section>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
