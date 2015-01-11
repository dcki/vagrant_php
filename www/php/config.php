<?php

// Get all needed info from request.

$url = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : $_SERVER['REDIRECT_URL'];





// Global variables often cause issues and they're unnecessary. Delete them.

// Display all globals.
//var_export(array_keys($GLOBALS));

$GLOBALS  = null;
$_SERVER  = null;
$_GET     = null;
$_POST    = null;
$_FILES   = null;
$_COOKIE  = null;
$_SESSION = null;
$_REQUEST = null;
$_ENV     = null;





// Register autoloader.





// Require utility functions.

//require_once '';





// Route.

if (preg_match('/^(\/)?$/', $url)) {
   
   require_once 'index.php';

} else if (preg_match('/abc/', $url)) {


} else {
   
   require_once '../404.html';
}

?>
