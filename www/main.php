<?php

//
// Authors:
//
// David Winiecki
//
//
// Created January 2015
//

use App\Controllers;
use Lib\Regex;



// Global variables often cause issues and they're unnecessary. Delete them.

$server  = $_SERVER;
$url_path = $server['REQUEST_URI'] ? $server['REQUEST_URI'] : $server['REDIRECT_URL'];
$get     = $_GET;
$post    = $_POST;
$files   = $_FILES;
$cookie  = $_COOKIE;
// Don't use session, use a database.
$request = $_REQUEST;
$env     = $_ENV;

$GLOBALS  = null;
$_SERVER  = null;
$_GET     = null;
$_POST    = null;
$_FILES   = null;
$_COOKIE  = null;
$_SESSION = null;
$_REQUEST = null;
$_ENV     = null;

// If you're confused about what we just did, try using $server inside a
// function without passing it as a parameter. (See? It's not global.)



// Register autoloader.

spl_autoload_register();



try {

   // Remove trailing slash from url, except for homepage.

   if (!Regex::match('^/$', $url_path) && Regex::match('/$', $url_path)) {

      $new_path = rtrim($url_path, '/');

      if (!empty($new_path)) {

         Lib\Redirect::permanent_redirect($new_path);

      } else {

         // There is no page located at thissite.com///
         require_once 'public/404.html';
      }
   }



   // Route.

   if (Regex::match('^/$', $url_path)) {

      Controllers\HomePage::index($post);

   } else if (Regex::match('^/test(/|$)', $url_path)) {

      Controllers\Test::route($url_path);

   } else if (Regex::match('^/abc$', $url_path)) {

      echo 'You found the mystery page! :D <a href="/">Home</a>';

   } else {

      require_once 'public/404.html';
   }

} catch (Lib\PregException $e) {

   echo 'Sorry, there was an error. <a href="/">Home</a>';
   // PregException logs itself.
}

// A blank page should never be returned. Need to come up with a better
// templating and routing system to guarantee we always find a page or send
// a 404. On the other hand, preventing all errors always is not possible.
// Should probably extend the Exception class to log its own errors and
// always catch that here. Also need to print an error if there is a
// catchable fatal error. Should probably also send the correct header for
// server error.