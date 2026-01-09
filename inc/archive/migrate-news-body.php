<?php
/**
 * ⚠️ ARCHIVED MAINTENANCE SCRIPT
 *
 * Purpose:
 *   Migrate legacy ACF field `news_body` into the native WordPress
 *   editor (`post_content`) for News posts.
 *
 * Context:
 *   Early versions of the LET site stored News content in a custom
 *   ACF textarea field (`news_body`). Later, the site standardized
 *   on the block editor for content.
 *
 * This script migrates content ONLY WHEN:
 *   - post_content is effectively empty
 *   - news_body contains meaningful text
 *
 * Supported post types:
 *   - news_jp
 *   - news_en
 *
 * Safety:
 *   - NOT included anywhere
 *   - Must be run manually
 *   - Dry-run capable
 *   - Non-destructive (never overwrites editor content)
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

/**
 * Configuration
 */
$POST_TYPES = ['news_jp', 'news_en'];
$DRY_RUN    = true; // ← set to false to actually write data

$scanned   = 0;
$migrated  = 0;
$skipped   = 0;
$log_lines = [];

/**
 * Helper: check if editor content is effectively empty
 */
function let_editor_is_empty($content) {
    $content = trim(strip_tags($content));
    return $content === '';
}

/**
 * Fetch all relevant News posts
 */
$posts = get_posts([
    'post_type'      => $POST_TYPES,
    'posts_per_page' => -1,
    'post_status'    => 'any',
]);

foreach ($posts as $post) {
    $scanned++;

    $acf_body     = get_field('news_body', $post->ID);
    $editor_body  = $post->post_content;

    // Skip if no legacy content
    if (!$acf_body || trim($acf_body) === '') {
        $skipped++;
        continue;
    }

    // Skip if editor already has content
    if (!let_editor_is_empty($editor_body)) {
        $skipped++;
        continue;
    }

    $log_lines[] = "→ {$post->post_type} #{$post->ID} ({$post->post_title})";

    if (!$DRY_RUN) {
        wp_update_post([
            'ID'           => $post->ID,
            'post_content' => $acf_body,
        ]);
    }

    $migrated++;
}

/**
 * Output summary
 */
echo "🧪 DRY RUN: " . ($DRY_RUN ? 'yes' : 'no') . PHP_EOL;
echo "Scanned:   {$scanned}" . PHP_EOL;
echo "Migrated: {$migrated}" . PHP_EOL;
echo "Skipped:  {$skipped}" . PHP_EOL . PHP_EOL;

if ($log_lines) {
    echo "Affected posts:" . PHP_EOL;
    foreach ($log_lines as $line) {
        echo "  {$line}" . PHP_EOL;
    }
}
