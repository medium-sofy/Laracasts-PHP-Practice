<?php
$config = require('config.php');
$db = new Database($config['Database']);

$heading = 'Note';


$note = $db -> query('SELECT * FROM notes WHERE id= :id', ['id' => $_GET['id'],])->fetch();

  if(!$note){
    abort();
  }

  $currentUserId = 9;

  if($note['user_id'] !== $currentUserId){
    abort(Response::FORBIDDEN);
  }

require 'views/note.view.php';