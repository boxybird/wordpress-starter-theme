<?php

namespace BoxyBird\App\Acf\Blocks;

class Example
{
    public static function init()
    {
        // ACF Pro features
        if (function_exists('acf_register_block_type')) {
            add_action('acf/init', [Example::class, 'register']);
        }
    }

    public static function register()
    {
        acf_register_block_type([
            'name'            => 'example',
            'title'           => __('Example'),
            'description'     => __('A custom example block from BoxyBird Theme.'),
            'render_template' => __DIR__ . '/templates/example.php',
            'category'        => 'common',
            'icon'            => 'admin-comments',
            'keywords'        => ['example'],
        ]);
    }
}
