<?php
/**
 * Template Name: Sync Update Dates
 *
 * This template updates the 'update_date' field in all news and event posts.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Only allow administrators to run this
if (!current_user_can('manage_options')) {
    wp_die('❌ Unauthorized access.');
}

function sync_update_dates_for_all() {
    $query = new WP_Query([
        'post_type' => ['news', 'event'],
        'posts_per_page' => -1,
        'fields' => 'ids',
    ]);

    $updated = 0;

    if ($query->have_posts()) {
        foreach ($query->posts as $post_id) {
            $post_type = get_post_type($post_id);

            if ($post_type === 'news') {
                $news_date = get_field('news_date', $post_id);
                if ($news_date) {
                    update_field('update_date', $news_date, $post_id);
                    $updated++;
                }
            } elseif ($post_type === 'event') {
                $event_date = get_field('event_date', $post_id);
                if ($event_date) {
                    update_field('update_date', $event_date, $post_id);
                    $updated++;
                }
            }
        }
    }

    echo "<p style='padding:1rem;background:#f0f0f0;border:1px solid #ccc;'>✅ Sync complete: <strong>{$updated}</strong> posts updated.</p>";
}

get_header();
?>

<div class="container" style="padding: 2rem;">
    <h2>🔄 Syncing update_date Fields</h2>
    <?php sync_update_dates_for_all(); ?>
</div>

<?php get_footer(); ?>
