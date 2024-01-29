<?php
$config = require('config.php');
$db = new Database($config['Database']);

$heading = 'Note';


$note = $db -> query('SELECT * FROM notes WHERE id= :id', 
['id' => $_GET['id'],])->findOrFail(); 

  $currentUserId = 9;

  if($note['user_id'] !== $currentUserId){
    abort(Response::FORBIDDEN);
  }

require 'views/note.view.php';