<?php

namespace Core;
use Core\Database;

class Authenticator
{

  public function attempt($email, $password)
  {
    $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
      'email' => $email
    ])->find();

    if ($user) {
      // if the user exist in the database, and the password provided matches the one associated with that email,
      // only on that case we log the user in
      if (password_verify($password, $user['password'])) {
        // associate the user email to the session which identifies him as logged in
        $this->login($user);
        return true;
      }
    }
    return false;
  }

  public function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email']
    ];
    // regenerate the session id for security purposes
    // every time the user logs in
    session_regenerate_id(true);
  }

  public function logout()
  { // Need to figure out why the cookie isn't being deleted

    // empty the session
    $_SESSION = [];
    // delete the session file from the server
    session_destroy();
    // delete the cookie
    // create a cookie and set it's timer to a value in the past
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 100000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
  }
}
