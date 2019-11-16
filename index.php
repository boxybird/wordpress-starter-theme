<?php

use BoxyBird\App\PostResource;

$custom_query = new WP_Query([
    'post_type'      => 'page',
    'posts_per_page' => 5,
]);

BoxyBird\App\Twig::render('index.twig', [
    'posts'        => PostResource::collection($wp_query), // global $wp_query
    'custom_posts' => PostResource::collection($custom_query),
]);
