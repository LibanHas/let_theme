<?php
/**
 * ⚠️ ARCHIVED MAINTENANCE SCRIPT
 *
 * Purpose:
 *   Migrate legacy member meta fields (pre-ACF or old schema)
 *   into newer ACF-based JP field names.
 *
 * Context:
 *   During early LET site development, member profile fields existed
 *   as plain post_meta (e.g. 'birthplace', 'degree').
 *   Later, bilingual ACF fields were introduced (e.g. 'birthplace_jp').
 *
 * This script copies values forward ONLY IF:
 *   - the new ACF field is empty
 *   - the old meta field has a value
 *
 * Safety:
 *   - NOT included anywhere
 *   - Must be run manually by an admin
 *   - Safe to re-run (non-destructive)
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
 * Legacy → New ACF field mapping
 */
$field_map = [
    'birthplace'            => 'birthplace_jp',
    'degree'                => 'degree_jp',
    'university_department' => 'university_department_jp',
    'programming_languages' => 'programming_languages_jp',
    'research_theme'        => 'research_theme_jp',
    'hobby'                 => 'hobby_jp',
    'recommendation'        => 'recommendation_jp',
    'profile'               => 'profile_jp',
    'link'                  => 'link_jp',
];

// Fetch all Member posts
$members = get_posts([
    'post_type'      => 'member',
    'posts_per_page' => -1,
    'post_status'    => 'any',
    'fields'         => 'ids',
]);

$updated = 0;

foreach ($members as $post_id) {
    foreach ($field_map as $old_key => $new_key) {

        // Skip if new ACF field already has a value
        if (get_field($new_key, $post_id)) {
            continue;
        }

        // Fetch legacy meta
        $legacy_value = get_post_meta($post_id, $old_key, true);
        if ($legacy_value === '' || $legacy_value === null) {
            continue;
        }

        // Write via ACF so reference meta is set correctly
        update_field($new_key, $legacy_value, $post_id);
        $updated++;
    }
}

echo "✅ Migration complete. Updated {$updated} field values.";
