<?php
/**
 * Created by PhpStorm.
 * User: konrad
 * Date: 14.09.18
 * Time: 20:47
 */

namespace Core;

use Twig_Loader_Filesystem;
use Twig_Environment;

class Twig
{
    private static $loader;
    private static $environment;

    public function load()
    {
        self::$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
        self::$environment = new Twig_Environment(self::$loader);
    }

    public function render($template, $variables)
    {
        return self::$environment->render($template, $variables);
    }
}