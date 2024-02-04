<?php
namespace Core;

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
    
    public static function resolve($key)
    {
      return static::container()->resolve($key);
    }

}