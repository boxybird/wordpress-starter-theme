<?php

use BoxyBird\App\Twig;
use BoxyBird\App\Resources\PageResource;

Twig::render('page.twig', [
    'page' => PageResource::item($wp_query)
]);
