<?php
/**
 * ⚠️ ARCHIVED MAINTENANCE SCRIPT
 *
 * Purpose:
 *   Backfill / resynchronize the ACF field `update_date`
 *   based on existing date fields for News and Events.
 *
 * Context:
 *   At one point, `update_date` was introduced as a unified
 *   sorting/display field, but older posts only had:
 *     - news_date   (for News)
 *     - event_date  (for Events)
 *
 * This script copies those values into `update_date`
 * for existing content.
 *
 * Strategy:
 *   - News posts:   update_date ← news_date
 *   - Event posts:  update_date ← event_date
 *
 * Safety:
 *   - NOT included anywhere
 *   - Must be run manually
 *   - Non-destructive (only writes when source date exists)
 *   - Normalizes dates to Ymd format
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
 * Helper: normalize date to Ymd
 * Accepts:
 *   - Ymd
 *   - YYYY-MM-DD
 */
function let_normalize_date_ymd($date) {
    if (!$date) return null;

    // YYYY-MM-DD → Ymd
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        return str_replace('-', '', $date);
    }

    // Already Ymd
    if (preg_match('/^\d{8}$/', $date)) {
        return $date;
    }

    return null;
}

$post_types = [
    'news_jp',
    'news_en',
    'event_jp',
    'event_en',
];

$scanned  = 0;
$updated  = 0;
$skipped  = 0;

$query = new WP_Query([
    'post_type'      => $post_types,
    'posts_per_page' => -1,
    'fields'         => 'ids',
]);

foreach ($query->posts as $post_id) {
    $scanned++;
    $type = get_post_type($post_id);

    if (in_array($type, ['news_jp', 'news_en'], true)) {
        $source_date = get_field('news_date', $post_id);
    } elseif (in_array($type, ['event_jp', 'event_en'], true)) {
        $source_date = get_field('event_date', $post_id);
    } else {
        $skipped++;
        continue;
    }

    $normalized = let_normalize_date_ymd($source_date);
    if (!$normalized) {
        $skipped++;
        continue;
    }

    update_field('update_date', $normalized, $post_id);
    $updated++;
}

echo "✅ Update-date sync complete\n";
echo "Scanned:  {$scanned}\n";
echo "Updated:  {$updated}\n";
echo "Skipped:  {$skipped}\n";
