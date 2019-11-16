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
        'name'        => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
    ],

    'menu' => [
        'primary' => get_menu_items_by_registered_slug('primary_menu')
    ]
];
