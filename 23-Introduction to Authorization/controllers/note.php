<?php
$config = require('config.php');
$db = new Database($config['Database']);

$heading = 'Note';


$note = $db -> query('SELECT * FROM notes WHERE id= :id', ['id' => $_GET['id'],])->fetch();

  if(!$note){
    abort();
  }

  if($note['user_id'] !== 9){
    abort(403);
  }

require 'views/note.view.php';