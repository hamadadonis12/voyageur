<?php
add_filter('wp_nav_menu_items', function ($items, $args) {
    if (empty($args->theme_location) || $args->theme_location !== 'primary') {
        return $items;
    }

    $new_url  = 'https://voyageurjewelry.com/celebrities-choice/';
    $new_text = "Celebrities' Choice";
    $li = '<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="' . esc_url($new_url) . '">' . esc_html($new_text) . '</a></li>';

    if (preg_match('#(<li[^>]*>\s*<a[^>]*>\s*Contact(?:\s+Us)?\s*</a>\s*</li>)#i', $items, $m)) {
        $items = str_replace($m[0], $li . $m[0], $items);
    } else {
        $items .= $li;
    }
    return $items;
}, 10, 2);
