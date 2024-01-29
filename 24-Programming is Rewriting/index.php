<?php 
require 'Response.php';
require 'functions.php';
require 'Database.php';
require 'router.php';
require ('config.php');


// $id =$_GET['id'];

// $posts = $db->query("select * from posts where id = ?", [$id]) -> fetchall();

//  dumpDie($posts);

// Display posts and body content
foreach($posts as $post){
  echo '<li>'.$post['title'].': '. $post['body'].'</li>';
}
