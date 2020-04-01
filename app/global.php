<?php

/**
 * Add global variables
 *
 * note: functions must not contain
 * echo as it will be rendered here
 *
 * Ex: use "get_bloginfo('name')" vs "bloginfo('name')"
 */

return [
    'example' => [
        'global_variable' => 'I can be found in app/global.php'
    ],

    'site' => [
        'name'                => get_bloginfo('name'),
        'charset'             => get_bloginfo('charset'),
        'description'         => get_bloginfo('description'),
        'language_attributes' => get_language_attributes(),
    ],

    'theme' => [
        'site_bg_color' => get_theme_mod('site_bg_color_setting', '#ffffff'),
    ],

    'menu' => [
        'primary' => get_menu_items_by_registered_slug('primary_menu')
    ]
];
