<?php
/**
 * Template Name: Single Member
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/no-title.php' ) ) {
    $wrapper_id = 'no-title-page-wrapper';
}
?>

<div class="wrapper" id="<?php echo $wrapper_id; ?>">

    <div class="<?php echo esc_attr( $container ); ?>" id="content">

        <div class="row">

            <div class="col-md-12 content-area" id="primary">

                <main id="primary" class="site-main">
                    <div class="container single-member">

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                            <?php
                            $position = get_field('position');
                            $link     = get_field('link');
                            $profile  = get_field('profile');
                            $research = get_field('research');
                            $hobby    = get_field('hobby');
                            $message  = get_field('message');
                            ?>

                            <div class="member-header row mb-5">
                                <div class="col-md-4">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'style' => 'width:100%; border-radius:0; object-fit:cover; aspect-ratio:1/1;']); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8">
                                    <h1 class="member-name"><?php the_title(); ?></h1>
                                    <?php if ( $position ) : ?>
                                        <p class="member-position"><?php echo esc_html( $position ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( $link ) : ?>
                                        <p class="member-links"><a href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener">Website</a></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="member-content">

                                <?php if ( $profile ) : ?>
                                    <section class="member-section mb-5">
                                        <h2 class="section-title">プロフィール</h2>
                                        <p><?php echo nl2br( esc_html( $profile ) ); ?></p>
                                    </section>
                                <?php endif; ?>

                                <?php if ( $research ) : ?>
                                    <section class="member-section mb-5">
                                        <h2 class="section-title">研究内容</h2>
                                        <p><?php echo nl2br( esc_html( $research ) ); ?></p>
                                    </section>
                                <?php endif; ?>

                                <?php if ( $hobby ) : ?>
                                    <section class="member-section mb-5">
                                        <h2 class="section-title">趣味</h2>
                                        <p><?php echo nl2br( esc_html( $hobby ) ); ?></p>
                                    </section>
                                <?php endif; ?>

                                <?php if ( $message ) : ?>
                                    <section class="member-section mb-5">
                                        <h2 class="section-title">緒方研のおすすめポイント</h2>
                                        <p><?php echo nl2br( esc_html( $message ) ); ?></p>
                                    </section>
                                <?php endif; ?>

                            </div>

                        <?php endwhile; endif; ?>

                    </div>
                </main>

            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- .wrapper -->

<?php get_footer(); ?>
