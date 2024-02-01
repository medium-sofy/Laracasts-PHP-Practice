<?php
$heading = 'Create a New Note';

if($_SERVER['REQUEST_METHOD']==='POST'){
  dumpDie('You submitted the form!');
}

require 'views/note-create.view.php';