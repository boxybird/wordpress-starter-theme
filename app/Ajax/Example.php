<?php

namespace BoxyBird\App\Ajax;

class Example
{
    public static function init()
    {
        add_action('wp_ajax_example', [Ajax::class, 'example']);
        add_action('wp_ajax_nopriv_example', [Ajax::class, 'example']);
    }

    public static function example()
    {
        check_ajax_referer('bb_ajax_nonce', 'nonce');

        return wp_send_json_success('Hello, Product ID! ' . $_POST['productId']);
    }
}
