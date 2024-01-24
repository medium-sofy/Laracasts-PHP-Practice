<?php 
require 'functions.php';
//require 'router.php';

$dsn = 'mysql:host=localhost;port=3306;user=root;password=root;dbname=myapp;';
$pdo = new PDO($dsn);

$statement = $pdo->prepare('select * from posts');

$statement-> execute();

$posts = $statement -> fetchall(PDO::FETCH_ASSOC);

foreach($posts as $post){
  echo '<li>'.$post['title'].'</li>';
}
