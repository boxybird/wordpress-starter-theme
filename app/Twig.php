<?php

namespace BoxyBird\App;

use Exception;
use Twig\Environment;
use Twig_SimpleFunction;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

class Twig
{
    public static function render(string $twig_file, $data = [])
    {
        echo self::init()->render($twig_file, $data);
    }

    public static function init()
    {
        $loader = new FilesystemLoader(get_template_directory() . '/resources/views');

        $twig = new Environment($loader, [
            'cache' => defined('WP_DEBUG') && WP_DEBUG === true
                ? false
                : get_template_directory() . '/resources/cache',
            'debug' => defined('WP_DEBUG') && WP_DEBUG === true ? true : false
        ]);

        $twig->addExtension(new DebugExtension());

        // Add users global variables
        $globals = require_once __DIR__ . '/global.php';
        foreach ($globals ?? [] as $key => $value) {
            $twig->addGlobal($key, $value);
        }

        $twig->registerUndefinedFunctionCallback(function ($name) {
            if (strpos($name, 'the_') === 0) {
                throw new Exception('Cannot use ' . $name . '(), use get_the' . substr($name, 3) . '() (if exists) instead.', 1);
            }

            if (function_exists($name)) {
                return new Twig_SimpleFunction($name, $name);
            }

            return false;
        });

        return $twig;
    }
}
