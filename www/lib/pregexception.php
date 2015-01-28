<?php

namespace Lib;

class PregException extends \Exception {

   private static $pcre_constants;

   public function __construct($pattern) {

      if (empty(self::$pcre_constants)) {

         $defined_constants = get_defined_constants(true);
         self::$pcre_constants = array_flip($defined_constants['pcre']);
      }

      $preg_error = self::$pcre_constants[preg_last_error()];

      $msg = __CLASS__." $preg_error using pattern $pattern\n";
      $msg .= stack_trace();

      error_log($msg);
      parent::__construct($msg);
   }
}
