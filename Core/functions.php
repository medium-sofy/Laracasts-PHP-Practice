<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function login($user)
{
    $_SESSION['user'] =
    [
      'email' => $user['email']
    ];
    // regenerate the session id for security purposes
    // every time the user logs in
    session_regenerate_id(true);
}

function logout()
{ // Need to figure out why the cookie isn't being deleted

  // empty the session
  $_SESSION = [];
  // delete the session file from the server
  session_destroy();
  // delete the cookie
  // create a cookie and set it's timer to a value in the past
  $params = session_get_cookie_params();
  setcookie('PHPSESSID','',time() - 100000 ,$params['path'], $params['domain'], $params['secure'], $params['httponly']);
}