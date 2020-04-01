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

        $debug = defined('WP_DEBUG') && WP_DEBUG === true ? true : false;

        $twig = new Environment($loader, [
            'cache' => $debug ? false : get_template_directory() . '/resources/cache',
            'debug' => $debug,
        ]);

        $twig->addExtension(new DebugExtension());

        // Add users global variables
        $globals = require_once __DIR__ . '/global.php';
        foreach ($globals ?? [] as $key => $value) {
            $twig->addGlobal($key, $value);
        }

        // Register functions for use in .twig files
        $function_whitelist = require_once __DIR__ . '/functions-whitelist.php';
        $twig->registerUndefinedFunctionCallback(function ($name) use ($function_whitelist) {
            if (!function_exists($name)) {
                return false;
            }

            // User functions whitelist to use in Twig
            if (!in_array($name, $function_whitelist)) {
                throw new Exception("Function: '{$name}()' not found in functions-whitelist.php");
            }

            return new Twig_SimpleFunction($name, $name);
        });

        return $twig;
    }
}
