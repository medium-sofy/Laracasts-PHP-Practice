<?php
$config = require('config.php');
$db = new Database($config['Database']);
$heading = 'My Notes';

$notes = $db -> query('SELECT * FROM notes WHERE user_id = 9')->findall();

require 'views/notes.view.php';