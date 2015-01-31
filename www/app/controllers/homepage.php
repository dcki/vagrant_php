<?php

namespace App\Controllers;

use StdClass;

class HomePage {

   public static function index($post) {

      if (!empty($post['name'])) {
         $name = $post['name'];
      }

      if (!empty($post['image_input_x']) && !empty($post['image_input_y'])) {
         $Image = new StdClass;
         $Image->x = $post['image_input_x'];
         $Image->y = $post['image_input_y'];
      }

      require_once 'app/views/index.php';
   }
}
