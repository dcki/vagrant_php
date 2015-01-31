<?php

// I want 3 pages:
// 1. A page of links to all tests.
// 2. A page for each test.
// 3. A page of all tests on the same page.
//
// I and 3 are actually very similar. It would be easy to take those same links and put them in iframes. That might be the fastest and cleanest way to run all the tests as well.
//
// iframes it is!!!
//
// Can we store the links in an array?
//
// Can the links be based on directory structure?
//
// Can we use this same structure to route from the tests controller to the individual test controllers?
//
// Yes, yes, and yes!

namespace App\Controllers;

use PDO;
use PDOException;
use Lib\Regex;

class Test {

   public static function route($url_path) {

      if (Regex::match('^/test$', $url_path)) {

         echo '<a href="/test/database">database</a>';

      } else if (Regex::match('^/test/database', $url_path)) {

         $user = 'root';
         $pass = 'test1234';
         try {
            $dbh = new PDO('mysql:host=localhost', $user, $pass);
            $dbh->query('CREATE DATABASE Test');
            $dbh->query('CREATE TABLE Test.Test (id int, name text)');
            $dbh->query("INSERT INTO Test.Test VALUES (1, 'Bob')");
            $dbh->query("INSERT INTO Test.Test VALUES (2, 'Marley')");
            $dbh->query("INSERT INTO Test.Test VALUES (3, NULL)");
            foreach($dbh->query('SELECT * from Test.Test') as $row) {
               echo var_export($row['id'], true).' '.var_export($row['name'], true).'<br>';
            }
            $dbh->query('DROP DATABASE Test');
            $dbh = null;
         } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
         }
         echo '<br>';

      } else if (Regex::match('^/test/blah', $url_path)) {

         require_once 'app/views/index.php';

      } else {

         require_once 'public/404.html';
      }
   }
}