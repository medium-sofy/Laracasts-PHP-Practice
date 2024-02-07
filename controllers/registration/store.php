<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// validate form input

if(!Validator::email($email)){
  $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password, 8, 255)){
  $errors['password'] = 'Please provide a password of at least 7 characters';
}

if(! empty($errors)){
  return view('registration/create.view.php',[
    'errors' => $errors,
    'email' => $email
  ]);
}

//check if the account already exists,
$user = $db->query('select * from users where email = :email',[
  'email' => $email
])->find();

  //if yes, redirect to login page
if($user){
  //someone with that emaiil already exists and has an account
  header('Location: /');
  exit();
}
else
  { // else, save one to the database, Log the user in, then redirect.
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)',
    [
      'email'=> $email,
      'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    // work that the user has logged in
    login($user);
    // redirect to dashboard or homeoage,
    header('Location: /');
    exit();
  }
 