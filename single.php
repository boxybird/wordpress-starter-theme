<?php

use BoxyBird\App\PostResource;

BoxyBird\App\Twig::render('single.twig', [
    'post' => PostResource::item($wp_query) // global $wp_query
]);
