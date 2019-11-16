<?php

namespace BoxyBird\App;

class Setup
{
    public static function init()
    {
        self::cleanUpHeader();

        add_action('init', [Setup::class, 'support']);
        add_action('init', [Setup::class, 'menus']);
        add_action('admin_init', [Setup::class, 'checkDependencies']);
        add_action('after_setup_theme', [Setup::class, 'images']);
        add_action('after_switch_theme', [Setup::class, 'activate']);
        add_action('after_setup_theme', [Setup::class, 'images']);
        add_action('wp_enqueue_scripts', [Setup::class, 'enqueue']);
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        add_filter('jpeg_quality', [Setup::class, 'imageQuality']);
        add_filter('intermediate_image_sizes_advanced', [Setup::class, 'unsetImages']);
    }

    public static function activate()
    {
        // anything need to fire upon activation of theme
    }

    public static function checkDependencies()
    {
        if (!is_plugin_active('advanced-custom-fields/acf.php')) {
            add_action('admin_notices', function () {
                ?>
                    <div class="notice notice-error">
                        <p>Advanced Custom Fields plugin must be active to use this theme.</p>
                    </div>
                <?php
            });
        }
    }

    public static function enqueue()
    {
        wp_enqueue_style('google_font', 'https://fonts.googleapis.com/css?family=Montserrat:400,800');
        wp_enqueue_style('app_css', get_template_directory_uri() . '/assets/app.css');
        wp_enqueue_script('app_js', get_template_directory_uri() . '/assets/app.js', ['jquery'], null, true);

        wp_localize_script('app_js', 'BB_AJAX', [
            'endpoint' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('bb_ajax_nonce')
        ]);
    }

    public static function support()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }

    public static function images()
    {
        add_image_size('my_custom_size', 500);
    }

    public static function unsetImages($sizes)
    {
        unset($sizes['small']);
        unset($sizes['medium']);
        unset($sizes['large']);
        unset($sizes['medium_large']);

        return $sizes;
    }

    public static function imageQuality()
    {
        return 100;
    }

    public static function menus()
    {
        register_nav_menus([
            'primary_menu' => 'Primary Menu',
            'footer_menu'  => 'Footer Menu',
        ]);
    }

    public static function cleanUpHeader()
    {
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_resource_hints', 2);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    }
}
