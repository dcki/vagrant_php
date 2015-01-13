<?php

namespace Lib;

class PregException extends \Exception {

   private static $pcre_constants;

   public function __construct($method, $pattern) {

      if (empty(self::$pcre_constants)) {

         $defined_constants = get_defined_constants(true);
         self::$pcre_constants = array_flip($defined_constants['pcre']);
      }


      $preg_error = self::$pcre_constants[preg_last_error()];

      $msg = __CLASS__." in $method $preg_error $pattern";

      error_log($msg);
      parent::__construct($msg);
   }
}
