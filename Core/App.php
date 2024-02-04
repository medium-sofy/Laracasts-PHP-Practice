<?php

class App
{
    protected static $container;

    public static function setContainer($container)
    {
      App::$container = $container;
    }

    public static function container($container)
    {
     return App::$container = $container;
    }


}