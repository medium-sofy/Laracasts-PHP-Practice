<?php
$config = require('config.php');
$db = new Database($config['Database']);

$notes = $db -> query('SELECT * FROM notes WHERE user_id = 9');

$heading = 'My Notes';
require 'views/notes.view.php';