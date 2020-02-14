<?php

use BoxyBird\App\Twig;
use BoxyBird\App\PageResource;

Twig::render('page.twig', [
    'page' => PageResource::item($wp_query)
]);
