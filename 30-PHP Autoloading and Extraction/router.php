<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes/index.php',
  '/note' => 'controllers/notes/show.php',
  '/notes/create' => 'controllers/notes/create.php',
  '/contact' => 'controllers/contact.php'
];

routeToControllers($uri,$routes);
