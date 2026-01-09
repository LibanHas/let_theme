<?php
/**
 * ⚠️ ARCHIVED MAINTENANCE SCRIPT
 *
 * Purpose:
 *   Assign a default language to existing Member posts
 *   where the ACF field `language` was introduced later.
 *
 * Context:
 *   The Member CPT originally existed without a language field.
 *   When bilingual support was added, older Member posts
 *   needed an explicit language value.
 *
 * Strategy used:
 *   - Assign 'ja' (Japanese) by default
 *   - Only assign if the field is currently empty
 *
 * Safety:
 *   - NOT included anywhere
 *   - Must be run manually
 *   - Non-destructive (does not overwrite existing values)
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

// Fetch all Member posts
$members = get_posts([
    'post_type'      => 'member',
    'posts_per_page' => -1,
    'post_status'    => 'any',
    'fields'         => 'ids',
]);

$assigned = 0;

foreach ($members as $post_id) {
    // Only assign if language is not set
    if (get_field('language', $post_id)) {
        continue;
    }

    // Default assumption: Japanese
    update_field('language', 'ja', $post_id);
    $assigned++;
}

echo "✅ Language field assigned to {$assigned} member posts.";
