<?php 
require 'functions.php';
//require 'router.php';

class Database {

  public function query($query){

    $dsn = 'mysql:host=localhost;port=3306;user=root;password=root;dbname=myapp;';
    $pdo = new PDO($dsn);

    $statement = $pdo->prepare($query);

    $statement-> execute();

    return $statement -> fetchall(PDO::FETCH_ASSOC);

  }
}

$db = new Database();
$posts = $db->query('select * from posts');

foreach($posts as $post){
  echo '<li>'.$post['title'].'</li>';
}
