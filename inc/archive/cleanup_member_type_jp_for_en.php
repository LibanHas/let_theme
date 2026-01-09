<?php
/**
 * One-off cleanup:
 * Empty member_type_jp for English members.
 *
 * Rationale:
 * - member_type_jp is authoritative only when language = ja
 * - EN members must rely solely on member_type_en
 *
 * SAFE TO RUN ONCE.
 */

if (!defined('ABSPATH')) {
    exit;
}

$members = get_posts([
    'post_type'      => 'member',
    'posts_per_page' => -1,
    'meta_query'     => [
        [
            'key'   => 'language',
            'value' => 'en',
        ],
    ],
]);

$count = 0;

foreach ($members as $post) {
    $post_id = $post->ID;

    $type_jp = get_field('member_type_jp', $post_id);

    if ($type_jp) {
        update_field('member_type_jp', '', $post_id);
        $count++;
    }
}

error_log("Cleanup complete: cleared member_type_jp for {$count} English members.");
