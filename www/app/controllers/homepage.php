<?php

namespace Controller;

class HomePage {

   public static function index($post) {

      if (!empty($post['name'])) {
         $name = $post['name'];
      }

      require_once 'app/views/index.php';
   }
}
