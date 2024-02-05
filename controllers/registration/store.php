<?php
use Core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];

// validate form input

if(!Validator::email($email)){
  $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password, 8, 255)){
  $errors['email'] = 'Please provide a password of at least 7 characters';
}

if(! empty($errors)){
  return view('registration/create.view.php',[
    'errors' => $errors,
    'email' => $email
  ]);
}

//check if the account already exists,
  //if yes, redirect to login page
  // else, save one to the database, Log the user in, then redirect.