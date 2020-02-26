<?php

namespace BoxyBird\App;

use WP_Query;

class PostResource extends Resource
{
    /**
     * Customize to desired array
     */
    protected static function toArray(WP_Query $query): array
    {
        return array_map(function ($post) {
            return [
                'id'             => $post->ID,
                'title'          => get_the_title($post->ID),
                'content'        => apply_filters('the_content', get_the_content(null, false, $post->ID)),
                'link'           => get_the_permalink($post->ID),
                'excerpt'        => wp_trim_words(get_the_excerpt($post->ID), 25),
                'excerpt_long'   => wp_trim_words(get_the_excerpt($post->ID), 50),
                'favorite_color' => get_field('bb_favorite_color', $post->ID),
                'image'          => [
                    'sizes' => [
                        'full' => get_the_post_thumbnail_url($post->ID),
                    ],
                    'meta' => [
                        'alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true),
                    ]
                ],
            ];
        }, $query->posts ?? []);
    }
}
