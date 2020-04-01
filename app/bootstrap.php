<?php

use Whoops\Run;
use BoxyBird\App\Setup;
use BoxyBird\App\Acf\Acf;
use Whoops\Handler\PrettyPageHandler;
use BoxyBird\App\Api\Example as ApiExample;
use BoxyBird\App\Ajax\Example as AjaxExample;
use BoxyBird\App\Customizer\SiteBackgroundColor;
use BoxyBird\App\Acf\Blocks\Example as BlockExample;

// Init filp/whoops
if (WP_DEBUG && WP_DEBUG_DISPLAY) {
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();
}

// Init setup
Setup::init();
Acf::init();
ApiExample::init();
AjaxExample::init();
BlockExample::init();
SiteBackgroundColor::init();
