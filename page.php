<?php

use BoxyBird\App\PageResource;

BoxyBird\App\Twig::render('page.twig', [
    'page' => PageResource::item($wp_query)
]);
