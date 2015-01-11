<?php

namespace Controller;

class HomePage {

   public static function start($post) {

      if (!empty($post['name'])) {
         $name = $post['name'];
      }

      require_once 'app/views/index.php';
   }
}
