<?php 
require 'functions.php';
//require 'router.php';

class Database {

  public $connection;

  public function __construct(){
    $dsn = 'mysql:host=localhost;port=3306;user=root;password=root;dbname=myapp;';
    $this->connection = new PDO($dsn);
  }

  public function query($query){   

    $statement = $this->connection->prepare($query);

    $statement-> execute();

    return $statement -> fetchall(PDO::FETCH_ASSOC);

  }
}

$db = new Database();
$posts = $db->query('select * from posts');

foreach($posts as $post){
  echo '<li>'.$post['title'].'</li>';
}
