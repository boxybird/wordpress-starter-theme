<?php

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

define('BB_THEME_PATH', __DIR__);
define('BB_PLUGIN_PATH', WP_CONTENT_DIR . '/plugins');

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/bootstrap.php';
