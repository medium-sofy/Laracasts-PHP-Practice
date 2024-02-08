<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// validate form input
$form = new LoginForm;

if($form->validate($email,$password)){
  
  if((new Authenticator)->attempt($email,$password))
  {
      redirect('/');

  } else {

      $form-> error('email',"No match was found for {$email} and the provided password");
  }
}

return view('sessions/create.view.php',[
  'errors' => $form->errors(),
  'email' => $email
]);