<?php
/**
 * One-off cleanup:
 * Empty member_type_en for Japanese members.
 *
 * Rationale:
 * - member_type_en is authoritative only when language = en
 * - JP members should rely solely on member_type_jp
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
            'value' => 'ja',
        ],
    ],
]);

$count = 0;

foreach ($members as $post) {
    $post_id = $post->ID;

    $type_en = get_field('member_type_en', $post_id);

    if ($type_en) {
        // Empty the EN field
        update_field('member_type_en', '', $post_id);
        $count++;
    }
}

error_log("Cleanup complete: cleared member_type_en for {$count} Japanese members.");
