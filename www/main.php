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



// Set error log file.
ini_set('error_log', '/var/www/log/error.log');



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



// Require utility functions.

require_once 'lib/util.php';



// Route.

try {

   if (match('^(/)?$', $url_path, __FILE__, __LINE__)) {

      Controllers\HomePage::index($post);

   } else if (match('abc', $url_path, __FILE__, __LINE__)) {



   } else {

      require_once 'public/404.html';
   }
} catch (Lib\PregException $e) {

   require_once 'public/404.html';
}
