<?php

namespace Core;

class Router{

    protected $routes=[];
    
    public function add($method, $uri, $controller)
    {
        $this->routes[]= [
          'uri' => $uri,
          'controller' => $controller,
          'method' => $method
        ];
    }
}