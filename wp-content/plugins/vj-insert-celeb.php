<?php
/**
 * Plugin Name: VJ – Add Celebrities Choice Page Before Contact (one-time)
 * Description: Inserts the *page* “Celebrities’ Choice” before “Contact” in the “Primary Menu”, then deactivates itself.
 * Version: 1.0
 */

add_action('admin_init', function () {
    if ( ! current_user_can('manage_options')) { return; }

    // Run once unless forced with ?vj_force=1
    $force = isset($_GET['vj_force']) && $_GET['vj_force'] === '1';
    if (get_option('vj_added_celeb_choice_page') && ! $force) { return; }

    $TARGET_MENU_NAME = 'Primary Menu';        // exact menu name from your screenshot
    $CELEB_SLUG       = 'celebrities-choice';  // the page slug
    $CONTACT_SLUG     = 'contact';             // the Contact page slug

    // --- Find the Primary Menu term ---
    $menus = wp_get_nav_menus();
    if (!is_array($menus) || empty($menus)) {
        vj_notice('No menus found. Create a menu first.');
        return;
    }

    $menu_id = 0;
    foreach ($menus as $m) {
        if (strcasecmp($m->name, $TARGET_MENU_NAME) === 0) {
            $menu_id = (int) $m->term_id;
            break;
        }
    }
    if (!$menu_id) {
        vj_notice('Menu named "'.$TARGET_MENU_NAME.'" not found. Rename or change $TARGET_MENU_NAME in the plugin.');
        return;
    }

    // --- Find pages ---
    $celeb_page = get_page_by_path($CELEB_SLUG);
    if (!$celeb_page) { vj_notice('Page "Celebrities’ Choice" (slug '.$CELEB_SLUG.') not found. Create it first.'); return; }
    $contact_page = get_page_by_path($CONTACT_SLUG); // may be null if contact is a custom link

    // --- Read existing menu items ---
    $items = wp_get_nav_menu_items($menu_id, ['post_status' => 'any']) ?: [];

    // find Contact menu item (by URL ending or by object_id match)
    $contact_item = null;
    foreach ($items as $it) {
        $title = trim(wp_strip_all_tags($it->title ?? ''));
        $url   = trim((string)($it->url ?? ''));
        $is_contact_title = preg_match('/\bcontact\b/i', $title);
        $is_contact_url   = preg_match('#/contact/?$#i', $url);
        $is_contact_page  = $contact_page && ($it->object === 'page') && ((int)$it->object_id === (int)$contact_page->ID);
        if ($is_contact_title || $is_contact_url || $is_contact_page) { $contact_item = $it; break; }
    }

    // Avoid duplicates: if an item for Celebrities’ Choice page already exists, just move it
    $existing = null;
    foreach ($items as $it) {
        if ($it->object === 'page' && (int)$it->object_id === (int)$celeb_page->ID) { $existing = $it; break; }
    }

    // Determine parent/position (insert before Contact; else append top-level)
    $parent_id = 0;
    $position  = count(array_filter($items, fn($it)=> (int)$it->menu_item_parent===0)) + 1;
    if ($contact_item) {
        $parent_id = (int)$contact_item->menu_item_parent;
        $position  = max(1, (int)$contact_item->menu_order); // insert at Contact's position
    }

    // Create/update the *page* menu item
    $args = [
        'menu-item-title'     => get_the_title($celeb_page->ID),
        'menu-item-object'    => 'page',
        'menu-item-object-id' => (int)$celeb_page->ID,
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish',
        'menu-item-parent-id' => $parent_id,
        'menu-item-position'  => $position,
    ];

    if ($existing) {
        wp_update_nav_menu_item($menu_id, (int)$existing->ID, $args);
        vj_notice('Moved existing “Celebrities’ Choice” page item before “Contact”.');
    } else {
        wp_update_nav_menu_item($menu_id, 0, $args);
        vj_notice('Inserted “Celebrities’ Choice” page before “Contact”.');
    }

    update_option('vj_added_celeb_choice_page', time());

    // Deactivate self so it doesn’t run again
    if (function_exists('deactivate_plugins')) {
        deactivate_plugins(plugin_basename(__FILE__), true);
        add_action('admin_notices', function () {
            echo '<div class="notice notice-success"><p><b>VJ:</b> Done. Plugin deactivated itself. You can delete the file.</p></div>';
        });
    }
});

/** Small helper to show admin notice */
function vj_notice($msg) {
    add_action('admin_notices', function () use ($msg) {
        echo '<div class="notice notice-warning"><p><b>VJ:</b> '.esc_html($msg).'</p></div>';
    });
}
