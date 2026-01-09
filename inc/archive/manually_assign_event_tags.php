<?php
/**
 * ⚠️ ARCHIVED MAINTENANCE SCRIPT
 *
 * Purpose:
 *   Automatically assign an ACF field value (`event_category`)
 *   to Event posts based on keywords found in the post title.
 *
 * Context:
 *   Before event categories were consistently assigned,
 *   many Event posts existed without `event_category`.
 *   This script was used once to backfill those values
 *   using simple Japanese keyword matching.
 *
 * Strategy:
 *   - Only runs on Events where `event_category` is empty
 *   - Matches known keywords in the post title
 *   - Writes a single category value
 *
 * Safety:
 *   - NOT included anywhere
 *   - Must be run manually
 *   - Non-destructive (skips posts that already have a category)
 *
 * Limitations:
 *   - Heuristic-based (title matching)
 *   - May misclassify edge cases
 *
 * Last used:
 *   2025
 *
 * Last reviewed:
 *   2026-01
 */

// 🔒 Hard stop unless explicitly enabled
if (!defined('LET_RUN_MIGRATION')) {
    return;
}

// Extra safety: admin-only
if (!is_admin() || !current_user_can('manage_options')) {
    return;
}

// Only target legacy Event CPT (adjust if needed)
$posts = get_posts([
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'post_status'    => 'any',
    'fields'         => 'ids',
]);

$tagged = 0;

/**
 * Keyword → category mapping
 */
$keyword_map = [
    'シンポジウム'   => 'symposiums',
    'ワークショップ' => 'workshops',
    '講演'           => 'lectures',
    'カンファレンス' => 'conferences',
    '出版'           => 'publications',
    'メディア'       => 'media',
    '受賞'           => 'awards',
    'プロジェクト'   => 'projects',
    'コンテスト'     => 'contests',
    'ニュース'       => 'news',
];

foreach ($posts as $post_id) {
    // Skip if already categorized
    if (get_field('event_category', $post_id)) {
        continue;
    }

    $title = get_the_title($post_id);
    $matched = null;

    foreach ($keyword_map as $keyword => $category) {
        if (mb_strpos($title, $keyword) !== false) {
            $matched = $category;
            break;
        }
    }

    if ($matched) {
        update_field('event_category', $matched, $post_id);
        $tagged++;
    }
}

echo "✅ Event category assignment complete. Tagged {$tagged} posts.";
