<?php 
require 'functions.php';
require 'Database.php';
//require 'router.php';
$config = require('config.php');

$db = new Database($config['Database']);

$posts = $db->query('select * from posts') -> fetchall();

// Display posts and body content
foreach($posts as $post){
  echo '<li>'.$post['title'].': '. $post['body'].'</li>';
}
