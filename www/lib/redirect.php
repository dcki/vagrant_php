<?php

namespace Lib;

class Redirect {

   public static function permanent_redirect($url) {

      header("HTTP/1.1 301 Moved Permanently");
      header('Location: '.$url);
      echo '<h1>301 Moved Permanently</h1><p>That page is actually located here: <a href="'.$url.'">'.$url.'</a></p>';
      exit();
   }
}