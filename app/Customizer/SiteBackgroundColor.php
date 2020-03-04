<?php

namespace BoxyBird\App\Customizer;

use WP_Customize_Manager;
use WP_Customize_Color_Control;

class SiteBackgroundColor
{
    public static function init()
    {
        add_action('customize_register', [SiteBackgroundColor::class, 'register']);
    }

    public static function register(WP_Customize_Manager $wp_customize)
    {
        $wp_customize->add_panel('bb_example_panel', [
            'title'       => __('BoxyBird Theme', BB_TEXT_DOMAIN),
            'description' => __('An example panel', BB_TEXT_DOMAIN),
            'priority'    => 10,
        ]);

        $wp_customize->add_section('site_bg_color_section', [
            'title'       => __('Site Background Color', BB_TEXT_DOMAIN),
            'description' => __('A option to change the background color of the body.', BB_TEXT_DOMAIN),
            'panel'       => 'bb_example_panel',
            'priority'    => 10
        ]);

        $wp_customize->add_setting('site_bg_color_setting', [
            'default'           => '#ffffff',
            'sanitize_callback' => [SiteBackgroundColor::class, 'siteBgColorSettingCallback']
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_bg_color_control', [
            'label'    => __('Color', BB_TEXT_DOMAIN),
            'section'  => 'site_bg_color_section',
            'settings' => 'site_bg_color_setting',
        ]));
    }

    public static function siteBgColorSettingCallback($value)
    {
        return esc_html($value);
    }
}
