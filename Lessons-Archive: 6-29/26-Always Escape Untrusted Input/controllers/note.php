<?php
$config = require('config.php');
$db = new Database($config['Database']);

$heading = 'Note';


$note = $db -> query('SELECT * FROM notes WHERE id= :id', 
['id' => $_GET['id'],])->findOrFail(); 

  $currentUserId = 9;

 authorize($note['user_id'] === $currentUserId);

require 'views/note.view.php';