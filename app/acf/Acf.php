<?php

namespace BoxyBird\App\Acf;

class Acf
{
    public static function init()
    {
        self::setupAcfFiles();

        // ACF Pro features
        if (function_exists('acf_add_options_page')) {
            self::themeOptions();
        }
    }

    public static function themeOptions()
    {
        acf_add_options_page([
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'	  => false
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'Theme Header Settings',
            'menu_title'  => 'Header',
            'parent_slug' => 'theme-general-settings',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'Theme Footer Settings',
            'menu_title'  => 'Footer',
            'parent_slug' => 'theme-general-settings',
        ]);
    }

    public static function setupAcfFiles()
    {
        // Define path and URL to the ACF plugin.
        $acf_path = get_stylesheet_directory() . '/app/acf/json';

        // Save custom fields as JSON
        add_filter('acf/settings/save_json', function ($path) use ($acf_path) {
            $path = $acf_path;

            return $path;
        });

        // Load custom fields from JSON
        add_filter('acf/settings/load_json', function ($paths) use ($acf_path) {
            // remove original path (optional)
            unset($paths[0]);

            $paths[] = $acf_path;

            return $paths;
        });
    }
}
