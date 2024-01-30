<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes.php',    
  '/note' => 'controllers/note.php',
  '/notes/create' => 'controllers/note-create.php',
  '/contact' => 'controllers/contact.php'
];

routeToControllers($uri,$routes);
