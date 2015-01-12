<?php

//namespace Util;

class PregException extends Exception {

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

function match($pattern, $str, $method) {

   $pattern = '/'.preg_replace('/\//', '\\/', $pattern).'/';
   $value = preg_match($pattern, $str);

   if ($value === false) {

      //throw new \Util\PregException();
      throw new PregException($method, $pattern);
   }

   return $value;
}
