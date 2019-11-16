<?php

namespace BoxyBird\App;

class Ajax
{
    public static function init()
    {
        add_action('wp_ajax_test', [Ajax::class, 'test']);
        add_action('wp_ajax_nopriv_test', [Ajax::class, 'test']);
    }

    public static function test()
    {
        check_ajax_referer('bb_ajax_nonce', 'nonce');

        return wp_send_json_success('Hello, Product ID! ' . $_POST['productId']);
    }
}
