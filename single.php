<?php

use BoxyBird\App\Twig;
use BoxyBird\App\PostResource;

Twig::render('single.twig', [
    'post' => PostResource::item($wp_query) // global $wp_query
]);
