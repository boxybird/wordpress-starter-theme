<?php

namespace BoxyBird\App;

use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

class Api
{
    public static function init()
    {
        add_action('rest_api_init', [Api::class, 'getQuote']);
    }

    public static function getQuote()
    {
        register_rest_route('boxybird/v1', '/quote', [
            'methods'  => 'GET',
            'callback' => [Api::class, 'getQuoteCallback'],
        ]);
    }

    public function getQuoteCallback(WP_REST_Request $request)
    {
        if ('dog' === 'cat') {
            return new WP_Error('not_equal', 'Dogs Are Not Cats', ['status' => 422]);
        }

        return new WP_REST_Response([
            'success' => true,
            'data'    => [
                'quote'  => 'When people tell me I can\'t do something, I have a visceral reflex to say, \'Yes, I can.\'',
                'quotee' => 'Angela Duckworth',
            ]
        ]);
    }
}
