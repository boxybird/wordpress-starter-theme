<?php

namespace BoxyBird\App;

use WP_Query;

class PostResource
{
    public static function collection(WP_Query $query): array
    {
        return self::toArray($query);
    }

    public static function item(WP_Query $query): array
    {
        return self::toArray($query)[0];
    }

    /**
     * Customize to desired array
     */
    protected static function toArray(WP_Query $query): array
    {
        return array_map(function ($post) {
            return [
                'id'             => $post->ID,
                'title'          => get_the_title($post->ID),
                'content'        => get_the_content(null, false, $post->ID),
                'link'           => get_the_permalink($post->ID),
                'excerpt'        => wp_trim_words(get_the_excerpt($post->ID), 25),
                'excerpt_long'   => wp_trim_words(get_the_excerpt($post->ID), 50),
                'favorite_color' => get_field('bb_favorite_color', $post->ID),
                'image'          => [
                    'sizes' => [
                        'full' => get_the_post_thumbnail_url($post->ID),
                    ],
                    'meta' => [
                        'alt' => self::imageAltText($post),
                    ]
                ],
            ];
        }, $query->posts ?? []);
    }

    protected static function imageAltText($post)
    {
        $thumb_id = get_post_thumbnail_id($post->ID);

        return get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
    }
}
