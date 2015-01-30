<?php

// Even if no further ini_set directives are added here, it helps to set the
// error log file here instead of main.php in case there is a syntax error in
// main.php. (Otherwise you have to be confused for a minute before you
// remember to look at the default apache error log.)

// Set error log file.
ini_set('error_log', '/var/www/log/error.log');

require 'main.php';