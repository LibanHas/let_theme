/**
 * Archived experiment:
 * Attempted dynamic menu language switching via ACF-linked pages.
 * Ultimately not used due to complexity and predictability concerns.
 */


 add_filter('wp_nav_menu_objects', function ($items, $args) {
   global $page_lang;

   foreach ($items as &$item) {
  
     $linked_page_id = url_to_postid($item->url);

       if ($linked_page_id) {
             if ($page_lang === 'en') {
              On an English page → try to find English translation
                $translated_page = get_field('translation_en', $linked_page_id);
                if ($translated_page) {
                   $item->url = get_permalink($translated_page);
                }
            } elseif ($page_lang === 'ja') {
               // On a Japanese page → try to find Japanese translation
                $translated_page = get_field('translation_jp', $linked_page_id);
                if ($translated_page) {
                    $item->url = get_permalink($translated_page);
                }
             }
         }
   }
    return $items;
 }, 10, 2); // 👈 add ", 2" so WP passes both $items and $args 