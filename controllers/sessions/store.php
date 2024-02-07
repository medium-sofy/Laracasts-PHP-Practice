<?php

// log in the user if the credentials match

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// validate form input
$errors = [];
if(!Validator::email($email)){
  $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password)){
  $errors['password'] = 'Please provide a valid password';
}

if(! empty($errors)){
  return view('sessions/create.view.php',[
    'errors' => $errors,
    'email' => $email
  ]);
}

// match the credentials

$user = $db->query('SELECT * FROM users WHERE email = :email',
      [
        'email' => $email
      ])->find();

if($user){
  // if the user exist in the database, and the password provided matches the one associated with that email,
  // only on that case we log the user in
  if(password_verify($password, $user['password'])){

    // associate the user email to the session which identifies him as logged in
    login($user);

    header('Location: /');
  }
}
// Display an error if the user doesn't exist, or he exists but the password is incorrect

return view('sessions/create.view.php',[
  'errors' => 
      [
        'email' => "No matching email was found for {$email} and provided password"
      ],
  'email' => $email
]);