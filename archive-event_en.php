<?php
defined('ABSPATH') || exit;

get_header();
?>

<div class="wrapper events-archive">
  <div class="container" id="content">
    <h1 class="page-title">Events</h1>
    <h2 class="page-subtitle">Latest updates</h2>

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="event-item">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
    <?php else : ?>
      <p>No events yet.</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
