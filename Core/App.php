<?php
namespace Core;

use Core\Container;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
      App::$container = $container;
    }

    public static function container()
    {
     return App::$container;
    }
    
    public static function bind($key, $resolver)
    {
      return static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
      return static::container()->resolve($key);
    }

}