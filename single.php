<?php

use BoxyBird\App\Twig;
use BoxyBird\App\Resources\PostResource;

Twig::render('single.twig', [
    'post' => PostResource::item($wp_query) // global $wp_query
]);
